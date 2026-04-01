<?php
/**
 * AJAX — Expert application form submission
 * Expected POST: name, linkedin, email, experience
 * Returns JSON: { success: bool, message: string }
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden.']);
    exit;
}

require_once dirname(__DIR__) . '/config/db.php';

// ── Sanitize & validate ──────────────────────────────────────────────────────
$name       = trim(strip_tags($_POST['name']       ?? ''));
$linkedin   = trim(strip_tags($_POST['linkedin']   ?? ''));
$email      = trim(strip_tags($_POST['email']      ?? ''));
$experience = trim(strip_tags($_POST['experience'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) > 150) {
    $errors[] = 'Please provide a valid full name.';
}

if ($linkedin === '') {
    $errors[] = 'Please provide your LinkedIn profile URL.';
} elseif (!filter_var($linkedin, FILTER_VALIDATE_URL) || mb_strlen($linkedin) > 300) {
    $errors[] = 'Please provide a valid LinkedIn URL.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
    $errors[] = 'Please provide a valid email address.';
}

if (mb_strlen($experience) < 30) {
    $errors[] = 'Please describe your experience in at least 30 characters.';
} elseif (mb_strlen($experience) > 10000) {
    $errors[] = 'Experience description is too long (max 10,000 characters).';
}

if ($errors) {
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// ── Check for duplicate email ─────────────────────────────────────────────────
try {
    $check = db()->prepare('SELECT id FROM experts WHERE email = :email LIMIT 1');
    $check->execute([':email' => $email]);
    if ($check->fetch()) {
        echo json_encode([
            'success' => false,
            'message' => 'An application with this email address already exists. Please contact us if you need to update your profile.',
        ]);
        exit;
    }

    // ── Insert ────────────────────────────────────────────────────────────────
    $stmt = db()->prepare(
        'INSERT INTO experts (name, linkedin, email, experience)
         VALUES (:name, :linkedin, :email, :experience)'
    );
    $stmt->execute([
        ':name'       => $name,
        ':linkedin'   => $linkedin,
        ':email'      => $email,
        ':experience' => $experience,
    ]);

    echo json_encode([
        'success' => true,
        'message' => "Thank you, {$name}! Your application has been submitted successfully. Our team will review it and reach out within 48–72 hours.",
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'A server error occurred. Please try again later.',
    ]);
}
