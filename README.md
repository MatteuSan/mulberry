# Mulberry

An improved web dashboard for Mapuans. Aims to centralize all features previously found in fragmented portions.

## Features
- [x] Sample Student and Faculty authentication.
- [x] User management.
- [x] Enrollment and load management without the use of online SFA via request queueing.
- [x] Schedule management.
- [x] Announcements for institution-wide and department-wide concerns.
- [x] Support for mobile devices and low internet speeds.
- [x] Course ~~and curriculum~~ viewing.
- [x] Grades viewing.
- [x] Section management.
- [x] Profile management.

## Pre-requisites
- Node.js (20.x or higher)
- Composer
- PHP 8.4 or higher
- SQLite3

## Development Setup
1. Clone the repository.
2. Install the required packages using `npm install` and `composer install`.
3. Create a `.env` file in the root directory of the project and copy the contents of `.env.example` to it.
4. Generate a new application key using `php artisan key:generate`.
5. Migrate the database info using the `php artisan migrate` command in your terminal.
6. Run the development server using the `/dev.sh` file in your terminal.