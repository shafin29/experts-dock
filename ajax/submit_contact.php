<?php
/**
 * AJAX — Contact form submission
 * Expected POST: name, email, message
 * Returns JSON: { success: bool, message: string }
 */

@ini_set('display_errors', '0');
error_reporting(0);

header('Content-Type: application/json; charset=utf-8');

// Only accept AJAX POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden.']);
    exit;
}

require_once dirname(__DIR__) . '/config/db.php';

// ── Sanitize & validate ──────────────────────────────────────────────────────
$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

$errors = [];

if ($name === '' || mb_strlen($name) > 150) {
    $errors[] = 'Please provide a valid name.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
    $errors[] = 'Please provide a valid email address.';
}
if ($message === '' || mb_strlen($message) > 5000) {
    $errors[] = 'Please provide a message (max 5000 characters).';
}

if ($errors) {
    echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
    exit;
}

// ── Insert ───────────────────────────────────────────────────────────────────
try {
    $stmt = db()->prepare(
        'INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)'
    );
    $stmt->execute([
        ':name'    => $name,
        ':email'   => $email,
        ':message' => $message,
    ]);

    echo json_encode([
        'success' => true,
        'message' => "Thank you, {$name}! Your message has been received. We'll get back to you within one business day.",
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'A server error occurred. Please try again later.',
    ]);
}
