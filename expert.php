<?php
$page_title       = 'Become an Expert — Experts Dock';
$meta_description = 'Apply to join the Experts Dock network. Share your professional expertise, consult on your schedule, and earn premium compensation.';
require_once 'includes/header.php';
?>

<main>
<!-- ===== PAGE HERO ===== -->
<section class="page-hero">
    <div class="container">
        <span class="section-label">Expert Application</span>
        <h1>Turn Your Expertise into Income</h1>
        <p>Join thousands of professionals already consulting through Experts Dock. Apply in minutes — our team reviews every application personally.</p>
    </div>
</section>

<!-- ===== FORM SECTION ===== -->
<section class="form-section">
    <div class="container">
        <div class="form-layout">

            <div class="form-info">
                <h2>Why Experts Choose Us</h2>
                <p>We've built a platform that respects your time, protects your reputation, and pays you fairly.</p>
                <div class="form-info-items">
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Earn $200–$800/hr</h4>
                            <p>Premium hourly rates based on your domain expertise and seniority level.</p>
                        </div>
                    </div>
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Flexible Schedule</h4>
                            <p>You control your availability. Consult when it fits your life — mornings, evenings, weekends.</p>
                        </div>
                    </div>
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Full Compliance Cover</h4>
                            <p>Our legal team handles NDAs and compliance checks — protecting you in every engagement.</p>
                        </div>
                    </div>
                    <div class="form-info-item">
                        <div class="fi-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                        </div>
                        <div class="fi-text">
                            <h4>Paid Within 72 Hours</h4>
                            <p>Fast, reliable payment after every completed consultation. No chasing invoices.</p>
                        </div>
                    </div>
                </div>

                <!-- Trust indicators -->
                <div style="margin-top:32px;padding:20px 24px;background:var(--blue-50);border:1px solid var(--blue-100);border-radius:var(--radius-sm);">
                    <p style="font-size:.875rem;font-weight:600;color:var(--blue-700);margin-bottom:8px;">What happens after you apply?</p>
                    <ol style="padding-left:18px;display:flex;flex-direction:column;gap:6px;">
                        <li style="font-size:.875rem;color:var(--gray-600);">Our team reviews your application (48–72 hrs)</li>
                        <li style="font-size:.875rem;color:var(--gray-600);">You receive a profile verification interview</li>
                        <li style="font-size:.875rem;color:var(--gray-600);">Your profile goes live and matching begins</li>
                    </ol>
                </div>
            </div>

            <div class="form-card">
                <h3 style="margin-bottom:6px;">Expert Application Form</h3>
                <p style="font-size:.9rem;margin-bottom:28px;">All fields are required. Your information is kept strictly confidential.</p>

                <form id="expert-form" novalidate>

                    <div class="form-group">
                        <label for="e-name">Full Name <span class="req">*</span></label>
                        <input type="text" id="e-name" name="name" placeholder="Dr. Jane Cooper" autocomplete="name">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="e-linkedin">LinkedIn Profile URL <span class="req">*</span></label>
                        <input type="url" id="e-linkedin" name="linkedin" placeholder="https://linkedin.com/in/yourprofile" autocomplete="off">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="e-email">Email Address <span class="req">*</span></label>
                        <input type="email" id="e-email" name="email" placeholder="jane@example.com" autocomplete="email">
                        <span class="field-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="e-experience">Professional Experience <span class="req">*</span></label>
                        <textarea id="e-experience" name="experience" class="tall"
                            placeholder="Describe your professional background, current or most recent role, key areas of expertise, industries you've worked in, and any specific topics you can advise on. The more detail you provide, the better we can match you with relevant clients."></textarea>
                        <span class="field-error"></span>
                    </div>

                    <div class="form-submit-wrap">
                        <button type="submit" class="btn btn-primary btn-lg btn-submit">
                            <span class="btn-text">Submit Application</span>
                            <span class="btn-spinner" aria-hidden="true"></span>
                        </button>
                    </div>

                    <p style="font-size:.8rem;color:var(--gray-400);margin-top:14px;text-align:center;">By submitting you agree to our terms. We never share your data with third parties.</p>

                    <div class="alert alert-success" role="alert"></div>
                    <div class="alert alert-error"   role="alert"></div>

                </form>
            </div>

        </div>
    </div>
</section>
</main>

<?php require_once 'includes/footer.php'; ?>
