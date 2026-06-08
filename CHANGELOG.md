# Changelog

All notable changes to `laravel-unsplash` will be documented in this file

## 3.0.0 - 2026-06-08

### Added
- Support for Laravel 13 (#17)
- GitHub Actions test matrix (PHP 8.2–8.4 × Laravel 12–13)

### Changed
- Dropped support for Laravel 8, 9, 10 and 11 (EOL); minimum is now Laravel 12 / PHP 8.2
- Modernized the published migration stubs (anonymous migration classes, `$table->id()`)
- Migrated the PHPUnit configuration to the PHPUnit 10+ schema and test methods to `#[Test]` attributes

### Removed
- Travis CI configuration (replaced by GitHub Actions)

## 1.0.0 - 201X-XX-XX

- initial release
