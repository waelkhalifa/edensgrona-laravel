# Quick Installation Guide

Follow these steps to get the application running quickly.

## Prerequisites

- PHP 8.2+
- PostgreSQL 14+
- Composer

## Installation Steps

### 1. Install Dependencies

```bash
cd laravel_garden_service
composer install
```

### 2. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` file:
```env
DB_CONNECTION=pgsql
DB_DATABASE=laravel_garden
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 3. Database Setup

```bash
# Create database
creatdb laravel_garden

# Run migrations and seeders
php artisan migrate
php artisan db:seed
```

### 4. Storage Link

```bash
php artisan storage:link
```

### 5. Run Application

```bash
php artisan serve
```

Visit: http://localhost:8000

## Admin Access

**URL:** http://localhost:8000/admin

**Credentials:**
- Email: admin@edensgrona.se
- Password: password

⚠️ **Change password after first login!**

## Next Steps

1. Update contact information in admin panel
2. Add/edit services
3. Upload images
4. Customize content
5. Test contact form

For detailed instructions, see [README.md](README.md)
