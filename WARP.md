# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

This is a Laravel 11 application with Vue.js 3 frontend using Inertia.js, designed as a language learning study tool. The application manages vocabulary words, books, lines (definitions), and usage examples with test generation capabilities.

## Core Architecture

### Data Model Relationships
- **Books**: Study materials with titles, publishers, and versions
- **Words**: English vocabulary with parts of speech
- **Lines**: Definitions that belong to both books and words (many-to-many relationship through lines)
- **Usages**: Example sentences for lines with word order scrambling functionality

### Key Features
- Multi-book vocabulary management system
- Test generation with three modes: standard tests, reorder tests, and usage tests
- Word order scrambling for language practice (see `Usage::getOrderedWordsAttribute()`)
- Filtering system by book, word, and index ranges
- CSV seeding capabilities for bulk data import

## Development Commands

### Backend (Laravel)
```bash
# Start development server with full stack (recommended)
composer dev  # Runs server, queue, logs, and Vite concurrently

# Individual services
php artisan serve                    # Laravel server
php artisan queue:listen --tries=1  # Queue worker
php artisan pail --timeout=0        # Real-time logs

# Database
php artisan migrate                  # Run migrations
php artisan db:seed                  # Seed database
php artisan migrate:fresh --seed    # Reset and seed

# Testing
php artisan test                     # Run Pest tests
./vendor/bin/pest                    # Direct Pest execution
php artisan test --filter=<name>    # Run specific test

# Code Quality
./vendor/bin/pint                    # Laravel Pint formatter
./vendor/bin/phpstan analyse         # Static analysis with Larastan
```

### Frontend (Vue.js/Vite)
```bash
npm run dev    # Vite development server
npm run build  # Production build
npm run lint   # ESLint with auto-fix
```

## Key Application Components

### Controllers
- `LineController`: Core functionality for vocabulary lines, test generation, and filtering
- `WordController`: Word management with part-of-speech handling
- `BookController`: Book/study material management
- `UsageController`: Example sentences with word order tests

### Models with Special Logic
- `Usage` model contains complex word scrambling logic in `getOrderedWordsAttribute()` for generating word order exercises
- `Line` model has filtering scopes for book and index range queries
- All models use factories for testing and seeding

### Frontend Structure
- Inertia.js for SPA-like experience without API complexity
- Vue 3 with TypeScript
- TailwindCSS for styling with custom UI components in `resources/js/Components/ui/`
- Reka UI component library integration

### Test System Architecture
The application generates three types of language learning tests:
1. **Standard Test**: Basic vocabulary testing
2. **Reorder Test**: Word order practice
3. **Usage Test**: Example sentence completion

Each test type filters content by book, index range, and word patterns, then randomly selects items for practice sessions.

## Database Structure

The application uses a relational structure optimized for language learning:
- Books contain indexed vocabulary entries
- Words are reusable across multiple books
- Lines connect words to specific book contexts
- Usages provide practical examples with scrambled word order generation

## Configuration Notes

- Default pagination: 15 lines per page (configurable via `app.line_per_page`)
- Uses SQLite for development (see `.env.example`)
- Queue system enabled for background processing
- Real-time logging via Laravel Pail

## Technology Stack

- **Backend**: Laravel 11, PHP 8.2+
- **Frontend**: Vue 3, TypeScript, Inertia.js
- **Styling**: TailwindCSS, Preline UI components
- **Build**: Vite
- **Testing**: Pest (PHP), ESLint (JavaScript)
- **Database**: SQLite (development)
- **Code Quality**: Laravel Pint, Larastan (PHPStan)
