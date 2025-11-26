# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

**MorIntern** is a Laravel 12 internship management system with a custom admin panel. The application manages two distinct user types: HRD (HR Department staff) and Peserta (intern participants), each with separate authentication systems.

## Development Commands

### Initial Setup
```powershell
composer setup
```
This runs the full setup: installs dependencies, copies `.env.example`, generates app key, runs migrations, and builds frontend assets.

### Development Server
```powershell
composer dev
```
Starts concurrent processes for Laravel server, queue worker, logs (Pail), and Vite dev server. Uses the `concurrently` npm package.

**Alternative (Manual):**
```powershell
# In separate terminals:
php artisan serve
php artisan queue:listen --tries=1
php artisan pail --timeout=0
npm run dev
```

### Testing
```powershell
composer test
# Or directly:
php artisan test

# Run specific test file:
php artisan test --filter=ExampleTest

# Run specific test method:
php artisan test --filter=test_example
```

### Code Quality
```powershell
# Laravel Pint (code formatter)
./vendor/bin/pint

# Run Pint on specific files:
./vendor/bin/pint app/Models
```

### Database Operations
```powershell
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migration with seeding
php artisan migrate:fresh --seed

# Run specific seeder
php artisan db:seed --class=SpesialisasiSeeder
php artisan db:seed --class=PesertaCalonSeeder
```

### Frontend Assets
```powershell
npm run dev    # Development with hot reload
npm run build  # Production build
```

### Admin Panel
This project includes an admin panel (mounted at `/admin`) used by HRD users. Use the project's artisan generators or custom scaffolding to manage admin resources and pages.
### Admin Panel

This project includes an admin panel (mounted at `/admin`) used by HRD users. Use the project's artisan generators or custom scaffolding to manage admin resources and pages.

## Architecture

### Authentication System

The application uses **dual authentication guards**:

1. **`web` guard**: For HRD/admin users (Model: `User`)
2. **`peserta` guard**: For intern participants (Model: `PesertaCalon`)

Both guards support:
- Traditional email/password login
- Google OAuth via Laravel Socialite

**Custom middleware:** `AuthAny` allows access if either guard is authenticated (used for shared routes like profile management).

### Directory Structure

**Admin Resources Organization:**
- Resources are organized into subdirectories under `app/Resources/` or similar (e.g., `app/Resources/CalonPesertas/`)
- Each resource typically contains:
  - `CalonPesertaResource.php` - Main resource class or controller
  - `Pages/` or `Controllers/` - CRUD pages (List, Create, Edit)
  - `Schemas/` or `Requests/` - Form schemas or request validation
  - `Tables/` or `Views/` - Table configurations or Blade views

This structure separates concerns and keeps form/table definitions modular and reusable.

**Models:**
- `User` - HRD/admin staff with Google OAuth support
- `PesertaCalon` - Intern accounts (used by `peserta` guard)
- `CalonPeserta` - Intern application/registration data
- `PostinganMagang` - Internship position postings
- `PenilaianMagang` - Intern performance evaluations
- `Spesialisasi` - Internship specializations/tracks

### Routing

Routes are split across multiple files:
- `routes/web.php` - Main application routes (landing, dashboard, HRD routes)
- `routes/auth.php` - HRD authentication routes
- `routes/peserta.php` - Peserta authentication routes (login, register, password reset, Google OAuth)

**Key route patterns:**
-- `/admin/*` - Admin panel routes (HRD only, via `auth:web`)
- `/hrd/*` - HRD-specific routes (approval/rejection of interns)
- `/peserta/*` - Peserta authentication routes
- `/dashboard` - Shared dashboard (both guards)
- `/profile` - Shared profile management (uses `AuthAny` middleware)

### Admin Panel

Admin panel is accessed at `/admin` and uses:
- Role-based permissions for access control
- Custom branding ("MorIntern") and colors (primary: `#6F8FF9`)
- Custom font: Plus Jakarta Sans
- Custom CSS (if present) in `resources/css/` (e.g., `resources/css/admin-custom.css`)

**Note:** Admin panel only authenticates via the `web` guard (HRD users).

### Database

Default configuration uses **SQLite** for development (see `.env.example`).

Available seeders:
- `SpesialisasiSeeder` - Seeds internship specializations
- `PesertaCalonSeeder` - Seeds sample intern accounts

## Key Dependencies

- **Laravel 12** - Application framework (requires PHP 8.2+)
 - Admin panel builder (project-specific)
 - Role & permission management (plugin or custom implementation)
- **Laravel Socialite** - Google OAuth integration
- **Laravel Breeze** - Authentication scaffolding (dev)
- **Laravel Pint** - Code style fixer
- **Tailwind CSS v4** - Styling framework
- **Alpine.js** - Frontend interactivity
- **Vite** - Frontend build tool

## Environment Configuration

Copy `.env.example` to `.env` and configure:
- Database connection (SQLite by default)
- Google OAuth credentials (for both user types)
- Queue connection (database by default)
- Mail settings

## Testing

Tests are organized into:
- `tests/Feature/` - Feature tests (authentication, profile, etc.)
- `tests/Unit/` - Unit tests

PHPUnit is configured to use in-memory SQLite for testing (see `phpunit.xml`).
