<?php
/**
 * Database Configuration
 * Update DB_HOST, DB_NAME, DB_USER, DB_PASS before deploying.
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'experts_dock');
define('DB_USER', 'root');       // change on production
define('DB_PASS', '');           // change on production
define('DB_CHARSET', 'utf8mb4');

/**
 * Returns a PDO connection (singleton).
 */
function db(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            DB_HOST, DB_NAME, DB_CHARSET
        );
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    }

    return $pdo;
}
