<?php
/**
 * AJAX — Unsubscribe form submission
 * Expected POST: email
 * Stores email in unsubscribers table (UNIQUE) and notifies admin.
 * Returns JSON: { success: bool, message: string }
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Forbidden.']);
    exit;
}

require_once dirname(__DIR__) . '/config/db.php';
require_once dirname(__DIR__) . '/config/mail.php';

// ── Sanitize & validate ──────────────────────────────────────────────────────
$email = trim(strip_tags($_POST['email'] ?? ''));

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid email address.']);
    exit;
}

// ── Insert (ignore duplicate) ─────────────────────────────────────────────────
try {
    $stmt = db()->prepare(
        'INSERT IGNORE INTO unsubscribers (email) VALUES (:email)'
    );
    $stmt->execute([':email' => $email]);

    // ── Notify admin ──────────────────────────────────────────────────────────
    $subject = 'Unsubscribe Request — Experts Dock';
    $body    = "A user has requested to unsubscribe from Experts Dock emails.\n\n"
             . "Email: {$email}\n"
             . "Date:  " . date('Y-m-d H:i:s') . " UTC\n\n"
             . "Please ensure this email is removed from all mailing lists.\n";

    send_mail(MAIL_NOTIFY_TO, $subject, $body);

    echo json_encode([
        'success' => true,
        'message' => "You've been successfully unsubscribed. You will no longer receive emails from Experts Dock.",
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'A server error occurred. Please try again later.',
    ]);
}
