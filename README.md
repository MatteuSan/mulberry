# MapuaBoard

An improved web dashboard for Mapuans. Aims to centralize all features previously found in fragmented portions.

## Features
- [ ] Student and Faculty authentication using their mymapua account.
- [ ] Enrollment management without the use of online SFA via request queueing.

## Pre-requisites
- Node.js
- Composer
- PHP 8.1 or higher
- SQLite3

## Development Setup
1. Clone the repository.
2. Install the required packages using `npm install` and `composer install`.
3. Create a `.env` file in the root directory of the project and copy the contents of `.env.example` to it.
4. Generate a new application key using `php artisan key:generate`.
5. Migrate the database info using the `shell/migrate.sh` file in your terminal.
6. Run the development server using the `shell/dev.sh` file in your terminal.