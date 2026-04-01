<?php
$page_title       = 'Contact Us — Experts Dock';
$meta_description = 'Get in touch with the Experts Dock team. We\'re here to help clients find the right experts and professionals join our network.';
require_once 'includes/header.php';
?>

<main>
<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="container">
        <span class="section-label">Get in Touch</span>
        <h1>We'd Love to Hear From You</h1>
        <p>Have a question, a project in mind, or need help navigating our platform? Our team typically replies within one business day.</p>
    </div>
</section>

<!-- ===== CONTACT SECTION ===== -->
<section class="form-section">
    <div class="container">

        <!-- Info cards -->
        <div class="contact-strip">
            <div class="cs-card">
                <div class="icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <h4>Email Us</h4>
                <p><a href="mailto:contact@experts-dock.com">contact@experts-dock.com</a></p>
            </div>
            <div class="cs-card">
                <div class="icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                </div>
                <h4>Response Time</h4>
                <p>Within 1 business day</p>
            </div>
            <div class="cs-card">
                <div class="icon-wrap">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                </div>
                <h4>Global Support</h4>
                <p>Serving 120+ countries</p>
            </div>
        </div>

        <!-- Form + info layout -->
        <div class="form-layout">
            <div class="form-info">
                <h2>Send Us a Message</h2>
                <p>Whether you're a potential expert, a client looking for research support, or simply curious about our platform — we'd love to connect.</p>
                <div class="form-info-items">
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Expert Inquiries</h4>
                            <p>Questions about joining our expert network or the application process.</p>
                        </div>
                    </div>
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Client &amp; Business</h4>
                            <p>Looking to access experts for research, due diligence, or strategic insight.</p>
                        </div>
                    </div>
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 015.83 1c0 2-3 3-3 3M12 17h.01"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>General Support</h4>
                            <p>Any other questions, feedback, or partnership opportunities.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <form id="contact-form" novalidate>

                    <div class="form-group">
                        <label for="c-name">Full Name <span class="req">*</span></label>
                        <input type="text" id="c-name" name="name" placeholder="John Smith" autocomplete="name">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="c-email">Email Address <span class="req">*</span></label>
                        <input type="email" id="c-email" name="email" placeholder="john@company.com" autocomplete="email">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="c-message">Message <span class="req">*</span></label>
                        <textarea id="c-message" name="message" placeholder="Tell us how we can help you…"></textarea>
                        <span class="field-error"></span>
                    </div>

                    <div class="form-submit-wrap">
                        <button type="submit" class="btn btn-primary btn-lg btn-submit">
                            <span class="btn-text">Send Message</span>
                            <span class="btn-spinner" aria-hidden="true"></span>
                        </button>
                    </div>

                    <div class="alert alert-success" role="alert"></div>
                    <div class="alert alert-error"   role="alert"></div>

                </form>
            </div>
        </div>

    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>
