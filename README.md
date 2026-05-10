# ⚡ QuickPOS Landing Page

![CI Status](https://github.com/MuhammadHamzaIsmail/QuickPOS-SPM/actions/workflows/ci.yml/badge.svg)

A modern responsive landing page for the QuickPOS Point-of-Sale system.
Built with PHP, HTML5, CSS3 and tested with PHPUnit.

## Tech Stack
- PHP 8.2
- HTML5 / CSS3 / JavaScript
- PHPUnit
- GitHub Actions CI/CD
- Jira

## Run Locally
php -S localhost:8000

Open: http://localhost:8000

## Run Tests
composer install
./vendor/bin/phpunit tests/ --testdox

## Branching Strategy
- main — protected, production ready
- feature/POS-XXX-name — new features
- bugfix/POS-XXX-name — bug fixes
- All changes go through Pull Requests only

## Commit Message Format
Every commit must have Jira ticket ID:
[POS-13] Add header HTML