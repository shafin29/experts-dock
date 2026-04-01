<?php
// BASE_PATH is already defined by header.php; this guard handles edge cases.
if (!defined('BASE_PATH')) {
    $script_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    define('BASE_PATH', rtrim($script_dir, '/'));
}
$b = BASE_PATH;
?>
<!-- ===== FOOTER ===== -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-brand">
                <a href="<?= $b ?>/index.php" class="logo logo--light">
                    <svg class="logo-icon" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <rect width="36" height="36" rx="8" fill="#3B82F6"/>
                        <path d="M10 18C10 13.5817 13.5817 10 18 10C22.4183 10 26 13.5817 26 18C26 22.4183 22.4183 26 18 26" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                        <circle cx="18" cy="18" r="3" fill="white"/>
                        <path d="M18 26V22" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                    <span class="logo-text">Experts<strong>Dock</strong></span>
                </a>
                <p class="footer-tagline">Where expertise meets opportunity. Connect, consult, and grow with the world's top professionals.</p>
                <p class="footer-contact-email">
                    <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                    <a href="mailto:contact@experts-dock.com">contact@experts-dock.com</a>
                </p>
            </div>

            <!-- Quick Links -->
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?= $b ?>/index.php">Home</a></li>
                    <li><a href="<?= $b ?>/about.php">About Us</a></li>
                    <li><a href="<?= $b ?>/contact.php">Contact Us</a></li>
                    <li><a href="<?= $b ?>/expert.php">Become an Expert</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="<?= $b ?>/about.php#mission">Our Mission</a></li>
                    <li><a href="<?= $b ?>/about.php#what-we-do">What We Do</a></li>
                    <li><a href="<?= $b ?>/contact.php">Get in Touch</a></li>
                    <li><a href="<?= $b ?>/unsubscribe.php">Unsubscribe</a></li>
                </ul>
            </div>

            <!-- Industries -->
            <div class="footer-col">
                <h4>Industries</h4>
                <ul>
                    <li><span>Technology &amp; IT</span></li>
                    <li><span>Finance &amp; Banking</span></li>
                    <li><span>Healthcare &amp; Life Sciences</span></li>
                    <li><span>Legal &amp; Compliance</span></li>
                    <li><span>Marketing &amp; Strategy</span></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> ExpertsDock. All rights reserved.</p>
            <p class="footer-legal">
                <a href="<?= $b ?>/unsubscribe.php">Unsubscribe</a>
            </p>
        </div>
    </div>
</footer>

<script src="<?= $b ?>/assets/js/main.js"></script>
</body>
</html>
