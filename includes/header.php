<?php
// Determine active page for nav highlighting
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($meta_description ?? 'Experts Dock — Connect with industry experts instantly. Join our professional network and monetize your expertise.') ?>">
    <title><?= htmlspecialchars($page_title ?? 'Experts Dock — Connect with Industry Experts') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
</head>
<body>

<!-- ===== NAVIGATION ===== -->
<header class="site-header" id="site-header">
    <div class="container">
        <nav class="navbar">
            <a href="/index.php" class="logo">
                <svg class="logo-icon" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <rect width="36" height="36" rx="8" fill="#2563EB"/>
                    <path d="M10 18C10 13.5817 13.5817 10 18 10C22.4183 10 26 13.5817 26 18C26 22.4183 22.4183 26 18 26" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                    <circle cx="18" cy="18" r="3" fill="white"/>
                    <path d="M18 26V22" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                </svg>
                <span class="logo-text">Experts<strong>Dock</strong></span>
            </a>

            <button class="nav-toggle" id="nav-toggle" aria-label="Toggle navigation" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>

            <ul class="nav-links" id="nav-links">
                <li><a href="/index.php"       class="<?= $current_page === 'index'       ? 'active' : '' ?>">Home</a></li>
                <li><a href="/about.php"       class="<?= $current_page === 'about'       ? 'active' : '' ?>">About Us</a></li>
                <li><a href="/contact.php"     class="<?= $current_page === 'contact'     ? 'active' : '' ?>">Contact</a></li>
                <li><a href="/expert.php" class="nav-cta <?= $current_page === 'expert' ? 'active' : '' ?>">Become an Expert</a></li>
            </ul>
        </nav>
    </div>
</header>
