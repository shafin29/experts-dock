/**
 * Experts Dock — Main JavaScript
 * Handles: navigation, scroll effects, AJAX form submissions
 */

(function () {
    'use strict';

    // ─── Sticky header shadow ────────────────────────────────────────────────
    const header = document.getElementById('site-header');
    if (header) {
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });
    }

    // ─── Mobile nav toggle ───────────────────────────────────────────────────
    const navToggle = document.getElementById('nav-toggle');
    const navLinks  = document.getElementById('nav-links');

    if (navToggle && navLinks) {
        navToggle.addEventListener('click', () => {
            const open = navLinks.classList.toggle('open');
            navToggle.classList.toggle('open', open);
            navToggle.setAttribute('aria-expanded', open);
        });

        // Close on outside click
        document.addEventListener('click', (e) => {
            if (!navToggle.contains(e.target) && !navLinks.contains(e.target)) {
                navLinks.classList.remove('open');
                navToggle.classList.remove('open');
                navToggle.setAttribute('aria-expanded', false);
            }
        });
    }

    // ─── Utility helpers ─────────────────────────────────────────────────────
    function sanitizeText(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    function setAlert(formEl, type, message) {
        // Hide all alerts first
        formEl.querySelectorAll('.alert').forEach(a => a.classList.remove('visible'));

        const iconSuccess = `<svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>`;
        const iconError   = `<svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>`;

        let alertEl = formEl.querySelector(`.alert-${type}`);
        if (!alertEl) {
            alertEl = document.createElement('div');
            alertEl.className = `alert alert-${type}`;
            formEl.appendChild(alertEl);
        }

        alertEl.innerHTML = (type === 'success' ? iconSuccess : iconError) +
            `<span>${sanitizeText(message)}</span>`;
        alertEl.classList.add('visible');
        alertEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function setSubmitLoading(btn, loading) {
        btn.classList.toggle('loading', loading);
        btn.disabled = loading;
    }

    function clearErrors(formEl) {
        formEl.querySelectorAll('.field-error').forEach(e => e.classList.remove('visible'));
        formEl.querySelectorAll('.error').forEach(e => e.classList.remove('error'));
    }

    function showFieldError(inputEl, message) {
        inputEl.classList.add('error');
        let errEl = inputEl.parentElement.querySelector('.field-error');
        if (!errEl) {
            errEl = document.createElement('span');
            errEl.className = 'field-error';
            inputEl.after(errEl);
        }
        errEl.textContent = message;
        errEl.classList.add('visible');
    }

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.trim());
    }

    function isValidUrl(url) {
        try { new URL(url.trim()); return true; } catch { return false; }
    }

    // ─── AJAX POST helper ────────────────────────────────────────────────────
    function ajaxPost(url, data, onSuccess, onError) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onreadystatechange = function () {
            if (xhr.readyState !== 4) return;
            try {
                const resp = JSON.parse(xhr.responseText);
                if (xhr.status === 200 && resp.success) {
                    onSuccess(resp);
                } else {
                    onError(resp.message || 'Something went wrong. Please try again.');
                }
            } catch {
                onError('Unexpected server response. Please try again.');
            }
        };

        const params = Object.entries(data)
            .map(([k, v]) => encodeURIComponent(k) + '=' + encodeURIComponent(v))
            .join('&');
        xhr.send(params);
    }

    // ─── Contact Form ────────────────────────────────────────────────────────
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors(this);

            const nameEl  = this.querySelector('[name="name"]');
            const emailEl = this.querySelector('[name="email"]');
            const msgEl   = this.querySelector('[name="message"]');
            const btn     = this.querySelector('.btn-submit');
            let valid = true;

            if (!nameEl.value.trim()) {
                showFieldError(nameEl, 'Please enter your name.');
                valid = false;
            }
            if (!isValidEmail(emailEl.value)) {
                showFieldError(emailEl, 'Please enter a valid email address.');
                valid = false;
            }
            if (!msgEl.value.trim()) {
                showFieldError(msgEl, 'Please enter a message.');
                valid = false;
            }
            if (!valid) return;

            setSubmitLoading(btn, true);

            ajaxPost((window.BASE_PATH || '') + '/ajax/submit_contact.php', {
                name:    nameEl.value.trim(),
                email:   emailEl.value.trim(),
                message: msgEl.value.trim()
            }, (resp) => {
                setSubmitLoading(btn, false);
                setAlert(contactForm, 'success', resp.message);
                contactForm.reset();
            }, (errMsg) => {
                setSubmitLoading(btn, false);
                setAlert(contactForm, 'error', errMsg);
            });
        });
    }

    // ─── Expert Form ─────────────────────────────────────────────────────────
    const expertForm = document.getElementById('expert-form');
    if (expertForm) {
        expertForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors(this);

            const nameEl  = this.querySelector('[name="name"]');
            const liEl    = this.querySelector('[name="linkedin"]');
            const emailEl = this.querySelector('[name="email"]');
            const expEl   = this.querySelector('[name="experience"]');
            const btn     = this.querySelector('.btn-submit');
            let valid = true;

            if (!nameEl.value.trim()) {
                showFieldError(nameEl, 'Please enter your full name.');
                valid = false;
            }
            if (!liEl.value.trim() || !isValidUrl(liEl.value.trim())) {
                showFieldError(liEl, 'Please enter a valid LinkedIn profile URL.');
                valid = false;
            }
            if (!isValidEmail(emailEl.value)) {
                showFieldError(emailEl, 'Please enter a valid email address.');
                valid = false;
            }
            if (!expEl.value.trim() || expEl.value.trim().length < 30) {
                showFieldError(expEl, 'Please describe your experience (at least 30 characters).');
                valid = false;
            }
            if (!valid) return;

            setSubmitLoading(btn, true);

            ajaxPost((window.BASE_PATH || '') + '/ajax/submit_expert.php', {
                name:       nameEl.value.trim(),
                linkedin:   liEl.value.trim(),
                email:      emailEl.value.trim(),
                experience: expEl.value.trim()
            }, (resp) => {
                setSubmitLoading(btn, false);
                setAlert(expertForm, 'success', resp.message);
                expertForm.reset();
            }, (errMsg) => {
                setSubmitLoading(btn, false);
                setAlert(expertForm, 'error', errMsg);
            });
        });
    }

    // ─── Unsubscribe Form ────────────────────────────────────────────────────
    const unsubForm = document.getElementById('unsubscribe-form');
    if (unsubForm) {
        unsubForm.addEventListener('submit', function (e) {
            e.preventDefault();
            clearErrors(this);

            const emailEl = this.querySelector('[name="email"]');
            const btn     = this.querySelector('.btn-submit');

            if (!isValidEmail(emailEl.value)) {
                showFieldError(emailEl, 'Please enter a valid email address.');
                return;
            }

            setSubmitLoading(btn, true);

            ajaxPost((window.BASE_PATH || '') + '/ajax/submit_unsubscribe.php', {
                email: emailEl.value.trim()
            }, (resp) => {
                setSubmitLoading(btn, false);
                setAlert(unsubForm, 'success', resp.message);
                unsubForm.reset();
            }, (errMsg) => {
                setSubmitLoading(btn, false);
                setAlert(unsubForm, 'error', errMsg);
            });
        });
    }

    // ─── Smooth scroll for anchor links ──────────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

})();
