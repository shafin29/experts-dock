# Experts Dock — Setup & Deployment Guide

## Local Development

### Requirements
- PHP 7.4+
- MySQL 5.7+ / MariaDB 10.3+
- Apache with `mod_rewrite` enabled (or Nginx)

### Step 1 — Create the Database

```bash
mysql -u root -p < database.sql
```

Or manually in phpMyAdmin:
1. Create database `experts_dock` (utf8mb4_unicode_ci)
2. Import `database.sql`

### Step 2 — Configure Database Credentials

Edit `config/db.php`:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'experts_dock');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');
```

### Step 3 — Configure Mail (Unsubscribe Notifications)

Edit `config/mail.php`:

```php
define('MAIL_NOTIFY_TO', 'moienabbas14@gmail.com');
define('MAIL_FROM',      'noreply@experts-dock.com');
```

> On Hostinger, PHP `mail()` works out of the box. For better deliverability
> consider using PHPMailer + SMTP (Gmail or Hostinger SMTP).

### Step 4 — Set Document Root

Point your web server's document root to `/experts-dock/` (the project root).

### Step 5 — Permissions

```bash
chmod 644 .htaccess
chmod -R 644 assets/
chmod -R 755 ajax/
```

---

## Deploying on Hostinger

### Option A — File Manager (GUI)

1. Log in to Hostinger hPanel
2. Go to **Hosting → Manage → File Manager**
3. Navigate to `public_html/`
4. Upload all project files (zip and extract)
5. Go to **Databases → MySQL Databases**
6. Create a new database + user, note the credentials
7. Click **phpMyAdmin**, select your DB, import `database.sql`
8. Edit `config/db.php` with the new credentials

### Option B — FTP

1. Use FileZilla or any FTP client
2. Connect using your Hostinger FTP credentials
3. Upload all files to `public_html/`
4. Follow steps 5–8 above

### Option C — Git Deployment (Hostinger Git)

1. In hPanel go to **Advanced → Git**
2. Add your repository URL
3. Set deployment path to `public_html/`
4. Pull the branch `claude/expert-network-platform-6rM2f`
5. Import `database.sql` via phpMyAdmin

---

## Project Structure

```
experts-dock/
├── .htaccess               # Apache security + rewrites
├── database.sql            # DB schema
├── index.php               # Home page
├── about.php               # About Us
├── contact.php             # Contact Us
├── expert.php              # Become an Expert
├── unsubscribe.php         # Unsubscribe
├── config/
│   ├── db.php              # PDO database connection
│   └── mail.php            # Mail helper + config
├── includes/
│   ├── header.php          # Shared HTML head + nav
│   └── footer.php          # Shared footer + scripts
├── assets/
│   ├── css/style.css       # Full stylesheet
│   ├── js/main.js          # AJAX + UI interactions
│   └── images/favicon.svg
└── ajax/
    ├── submit_contact.php      # Contact form handler
    ├── submit_expert.php       # Expert application handler
    └── submit_unsubscribe.php  # Unsubscribe handler
```

---

## Database Tables

| Table           | Columns                                              |
|----------------|------------------------------------------------------|
| `experts`       | id, name, linkedin, email, experience, created_at   |
| `contacts`      | id, name, email, message, created_at                |
| `unsubscribers` | id, email (UNIQUE), created_at                      |

---

## Security Checklist

- [x] PDO prepared statements (SQL injection prevention)
- [x] `strip_tags()` + `trim()` on all inputs
- [x] `filter_var()` email & URL validation
- [x] AJAX-only endpoints (X-Requested-With header check)
- [x] `.htaccess` blocks access to `config/` and `includes/`
- [x] `Options -Indexes` prevents directory listing
- [x] Security headers (X-Frame-Options, X-Content-Type-Options, etc.)
- [x] Duplicate email check on expert applications
- [x] `INSERT IGNORE` on unsubscribers (handles duplicates gracefully)
