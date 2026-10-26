---
name: laravel-secure-project
description: >-
  Builds, configures, and secures Laravel projects with modern security standards, security patches, hardened headers, authentication, CSRF, and data protection.
---

# Secure Laravel Project Architecture & Patching

Use this skill when initializing, developing, maintaining, or applying security patches to a Laravel application in the `project/` directory.

## Core Security Foundations

### 1. Environment & Secrets Management
* Store sensitive credentials strictly in `.env`.
* Keep `.env.example` sanitized and updated.
* Ensure `.env` is listed in `.gitignore` and never committed.
* In production: Ensure `APP_DEBUG=false` and `APP_ENV=production`.
* Generate unique application keys: `php artisan key:generate`.

### 2. Security Headers Middleware
Configure security headers middleware to enforce browser protections:
```php
$response->headers->set('X-Frame-Options', 'SAMEORIGIN');
$response->headers->set('X-Content-Type-Options', 'nosniff');
$response->headers->set('X-XSS-Protection', '1; mode=block');
$response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
$response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com;");
$response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
```

### 3. Session & Cookie Hardening
In `config/session.php`:
* `secure` => env('SESSION_SECURE_COOKIE', true) (HTTPS)
* `http_only` => true (Prevent JavaScript access to session cookie)
* `same_site` => 'lax' (or 'strict' to prevent CSRF)

### 4. Input Sanitization & Attack Prevention
* **CSRF**: Always verify CSRF tokens on state-changing requests using `@csrf` in Blade forms.
* **SQL Injection**: Use Eloquent models or PDO parameterized bindings. Avoid raw query concatenation (`DB::raw` with variable interpolation).
* **XSS**: Always use default Blade `{{ $variable }}` output escaping. Avoid `{!! $variable !!}` unless HTML is purified via HTMLPurifier or strict sanitizer.
* **Mass Assignment**: Explicitly define `$fillable` or `$guarded` on all Eloquent models.
* **File Uploads**: Validate file extensions and MIME types (`image|mimes:jpeg,png,webp|max:2048`). Store files using Laravel's Storage facade (`storage/app`) rather than directly inside public web root.

### 5. Rate Limiting & Brute Force Defense
* Protect sensitive endpoints (login, password reset, contact forms, API endpoints) with rate limiters in `RouteServiceProvider` or `bootstrap/app.php`:
```php
RateLimiter::for('contact-form', function (Request $request) {
    return Limit::perMinute(5)->by($request->ip());
});
```

### 6. Security Patching & Vulnerability Auditing
To check for known vulnerabilities and apply new patches:
```bash
# Audit dependencies for known vulnerabilities (CVEs)
composer audit

# Update packages to patch security issues
composer update --with-dependencies

# Clear and optimize caches after patching
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
```

### 7. Git Backup Rule in `project/`
* Before running major package updates (`composer update`), database migrations, or refactoring code in `project/`, create a Git commit or stash checkpoint first.
