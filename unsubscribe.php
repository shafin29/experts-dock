<?php
$page_title       = 'Unsubscribe — Experts Dock';
$meta_description = 'Unsubscribe from Experts Dock emails. Enter your email address below to opt out of all communications.';
require_once 'includes/header.php';
?>

<main>
<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="container">
        <span class="section-label">Email Preferences</span>
        <h1>Unsubscribe</h1>
        <p>We're sorry to see you go. Enter your email address below and we'll remove you from all our mailing lists immediately.</p>
    </div>
</section>

<!-- ===== UNSUBSCRIBE FORM ===== -->
<section class="form-section">
    <div class="container">
        <div class="simple-form-wrap">
            <div class="form-card">
                <div style="text-align:center;margin-bottom:32px;">
                    <div style="width:64px;height:64px;background:var(--blue-50);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;color:var(--blue-600);">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <h3 style="margin-bottom:8px;">Remove My Email</h3>
                    <p style="font-size:.9375rem;">You'll stop receiving all emails from Experts Dock. This action cannot be undone from this page — to re-subscribe, please contact us.</p>
                </div>

                <form id="unsubscribe-form" novalidate>

                    <div class="form-group">
                        <label for="u-email">Email Address <span class="req">*</span></label>
                        <input type="email" id="u-email" name="email" placeholder="you@example.com" autocomplete="email">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-submit-wrap">
                        <button type="submit" class="btn btn-primary btn-lg btn-submit">
                            <span class="btn-text">Unsubscribe Me</span>
                            <span class="btn-spinner" aria-hidden="true"></span>
                        </button>
                    </div>

                    <div class="alert alert-success" role="alert"></div>
                    <div class="alert alert-error"   role="alert"></div>

                </form>
            </div>

            <!-- Reconsider block -->
            <div style="text-align:center;margin-top:32px;">
                <p style="font-size:.9rem;color:var(--gray-500);">Changed your mind? <a href="/expert.php">Become an Expert</a> or <a href="/contact.php">contact our team</a> — we'd love to keep you in the loop.</p>
            </div>
        </div>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>
