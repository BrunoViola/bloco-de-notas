# Bloco de Notas

A web-based notes application built with Laravel 12, allowing users to create, manage, and organize their personal notes.

## Project Status

🚧 **In Development** - This project is currently in early development stage.

### Completed Features
- ✅ Project setup with Laravel 12
- ✅ Database schema design (Users and Notes tables)
- ✅ User authentication system (login page)
- ✅ Bootstrap 5 integration
- ✅ Tailwind CSS 4 integration

### Planned Features
- 🔲 Complete authentication flow (logout, registration)
- 🔲 Notes CRUD operations (Create, Read, Update, Delete)
- 🔲 User dashboard
- 🔲 Note organization and filtering
- 🔲 Rich text editor for notes
- 🔲 Search functionality

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Bootstrap 5.3, Tailwind CSS 4.0
- **Build Tools**: Vite 7, Laravel Mix
- **Database**: MySQL/PostgreSQL (configurable)
- **Testing**: PHPUnit 11.5

## Database Schema

### Users Table
- `id` - Primary key
- `user_email` - User email (max 50 characters)
- `password` - Encrypted password
- `last_login` - Last login timestamp
- Soft deletes enabled

### Notes Table
- `id` - Primary key
- `user_id` - Foreign key to users table
- `title` - Note title (max 200 characters)
- `text` - Note content (max 3000 characters)
- Soft deletes enabled

## Installation

1. Clone the repository:
```bash
git clone https://github.com/BrunoViola/bloco-de-notas.git
cd bloco-de-notas
```

2. Install dependencies and setup the project:
```bash
composer setup
```

This command will:
- Install PHP dependencies
- Create `.env` file from `.env.example`
- Generate application key
- Run database migrations
- Install and build frontend assets

3. Configure your database in the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bloco_de_notas
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. Run migrations:
```bash
php artisan migrate
```

## Development

Run the development environment with concurrent services:
```bash
composer dev
```

This starts:
- Laravel development server
- Queue worker
- Log viewer (Laravel Pail)
- Vite dev server for hot module replacement

Alternatively, run services individually:
```bash
# Backend server
php artisan serve

# Frontend dev server
npm run dev
```

## Testing

Run the test suite:
```bash
composer test
```

Or directly with PHPUnit:
```bash
php artisan test
```

## Code Quality

This project uses Laravel Pint for code formatting:
```bash
./vendor/bin/pint
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
