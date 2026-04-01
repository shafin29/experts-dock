<?php
/**
 * Mail Configuration
 * Used for unsubscribe notifications.
 */

define('MAIL_NOTIFY_TO',   'moienabbas14@gmail.com');
define('MAIL_FROM',        'noreply@experts-dock.com');
define('MAIL_FROM_NAME',   'Experts Dock');

/**
 * Sends a simple text email via PHP mail().
 */
function send_mail(string $to, string $subject, string $body): bool {
    $headers  = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n";
    $headers .= "Reply-To: " . MAIL_FROM . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    return mail($to, $subject, $body, $headers);
}
