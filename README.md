# Edens Gröna Trädgårdsservice - Laravel 11 + Filament 3

A complete Laravel 11 application with Filament 3 admin panel for managing the Edens Gröna garden service website.

## 📋 Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Admin Panel Access](#admin-panel-access)
- [Deployment](#deployment)
- [Project Structure](#project-structure)
- [Troubleshooting](#troubleshooting)

## ✨ Features

- **Laravel 11** - Latest Laravel framework
- **Filament 3** - Modern admin panel for content management
- **PostgreSQL** - Robust database system
- **Dynamic Content Management**:
  - Services
  - Process Steps
  - Hero Sections
  - About Content
  - Contact Information
  - Social Media Links
  - Contact Form Submissions
  - Site Settings
- **Responsive Design** - Mobile-first approach
- **Swedish Language Support**
- **Image Upload & Management**
- **SEO Friendly**

## 📦 Requirements

- PHP >= 8.2
- Composer >= 2.0
- PostgreSQL >= 14
- Node.js >= 18 (for asset compilation)
- NPM or Yarn
- Apache/Nginx web server

### PHP Extensions Required

```bash
php-cli
php-common
php-curl
php-json
php-mbstring
php-pgsql
php-xml
php-zip
php-gd
php-bcmath
php-intl
```

## 🚀 Installation

### Step 1: Clone or Copy the Project

```bash
cd /path/to/your/projects
# If using git
git clone <repository-url> laravel_garden_service
# Or simply copy the project folder
```

### Step 2: Install PHP Dependencies

```bash
cd laravel_garden_service
composer install
```

This will install:
- Laravel Framework 11.x
- Filament 3.x
- All required dependencies

### Step 3: Environment Configuration

```bash
# Copy the example environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Configure Environment Variables

Edit the `.env` file with your database credentials:

```env
APP_NAME="Edens Grona Garden Service"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel_garden
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

FILAMENT_FILESYSTEM_DISK=public
```

## 🗄️ Database Setup

### Step 1: Create PostgreSQL Database

```bash
# Login to PostgreSQL
psql -U postgres

# Create database
CREATE DATABASE laravel_garden;

# Exit PostgreSQL
\q
```

### Step 2: Run Migrations

```bash
php artisan migrate
```

This will create all necessary tables:
- users
- services
- process_steps
- settings
- contact_infos
- social_links
- hero_sections
- about_contents
- contact_submissions
- sessions
- password_reset_tokens

### Step 3: Seed Database with Sample Data

```bash
php artisan db:seed
```

This will populate the database with:
- Admin user (email: admin@edensgrona.se, password: password)
- Contact information
- Services list
- Process steps
- Social media links
- Hero section
- About content
- Settings

## 📁 Storage Configuration

### Create Storage Link

```bash
php artisan storage:link
```

This creates a symbolic link from `public/storage` to `storage/app/public` for public file access.

### Set Permissions

```bash
# On Linux/Mac
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Or if using your user
sudo chown -R $USER:www-data storage bootstrap/cache
```

## 🎨 Asset Compilation (Optional)

If you need to modify CSS/JS:

```bash
# Install Node dependencies
npm install

# For development
npm run dev

# For production
npm run build
```

## 🖥️ Running the Application

### Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

### Production Server

Configure your web server (Apache/Nginx) to point to the `public` directory.

#### Apache Configuration Example

```apache
<VirtualHost *:80>
    ServerName edensgrona.local
    DocumentRoot /path/to/laravel_garden_service/public

    <Directory /path/to/laravel_garden_service/public>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/edensgrona-error.log
    CustomLog ${APACHE_LOG_DIR}/edensgrona-access.log combined
</VirtualHost>
```

#### Nginx Configuration Example

```nginx
server {
    listen 80;
    server_name edensgrona.local;
    root /path/to/laravel_garden_service/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 🔐 Admin Panel Access

### URL

```
http://your-domain.com/admin
```

### Default Credentials

```
Email: admin@edensgrona.se
Password: password
```

**⚠️ IMPORTANT:** Change the default password immediately after first login!

### Change Admin Password

```bash
php artisan tinker

>>> $user = App\Models\User::where('email', 'admin@edensgrona.se')->first();
>>> $user->password = Hash::make('new_secure_password');
>>> $user->save();
>>> exit
```

## 📱 Admin Panel Features

### Content Management

1. **Services** - Manage garden services
   - Add/Edit/Delete services
   - Upload service images
   - Set display order
   - Enable/Disable services

2. **Process Steps** - Manage workflow steps
   - Define step-by-step process
   - Add descriptions
   - Set icons
   - Order steps

3. **Hero Sections** - Manage homepage hero
   - Upload logo
   - Background images/videos
   - Title and subtitle

4. **About Content** - Manage about page
   - Rich text editor
   - Upload images
   - Company values

5. **Contact Info** - Manage contact details
   - Company information
   - Addresses
   - Phone and email
   - Google Maps integration

6. **Social Links** - Manage social media
   - Add/Edit social platforms
   - Set icons
   - Display order

7. **Contact Submissions** - View form submissions
   - Track status (New, Read, In Progress, Resolved)
   - Add notes
   - Filter and search

8. **Settings** - Site-wide settings
   - Google Reviews URL
   - Footer text
   - Site title

## 🚢 Deployment

### Production Checklist

1. **Environment Configuration**
```bash
# Set to production
APP_ENV=production
APP_DEBUG=false

# Use secure app key
php artisan key:generate
```

2. **Optimize Application**
```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache

# Optimize autoloader
composer install --optimize-autoloader --no-dev
```

3. **Database**
```bash
# Run migrations on production
php artisan migrate --force

# Seed data if needed
php artisan db:seed --force
```

4. **Permissions**
```bash
chmod -R 755 /path/to/laravel_garden_service
chmod -R 775 storage bootstrap/cache
```

5. **Security**
- Use HTTPS (SSL/TLS certificate)
- Configure firewall
- Set up regular backups
- Use strong database passwords
- Keep dependencies updated

### Deployment Services

#### Using Laravel Forge
- Push code to Git repository
- Connect Forge to your server
- Deploy automatically

#### Using Deployer
```bash
composer require deployer/deployer --dev
dep init
dep deploy production
```

#### Manual Deployment
1. Upload files via FTP/SFTP
2. Run migrations
3. Clear and cache
4. Set permissions

## 📂 Project Structure

```
laravel_garden_service/
├── app/
│   ├── Filament/
│   │   └── Resources/          # Filament admin resources
│   ├── Http/
│   │   └── Controllers/        # Application controllers
│   ├── Models/                 # Eloquent models
│   └── Providers/              # Service providers
├── bootstrap/                  # Bootstrap files
├── config/                     # Configuration files
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── public/                    # Public web files
│   ├── assets/               # Static assets (CSS, JS, images)
│   └── index.php            # Entry point
├── resources/
│   └── views/               # Blade templates
├── routes/
│   ├── web.php             # Web routes
│   └── console.php         # Console routes
├── storage/                # Storage files
├── tests/                  # Tests
├── .env.example           # Environment template
├── composer.json          # PHP dependencies
└── README.md             # This file
```

## 🔧 Troubleshooting

### Common Issues

#### 1. Database Connection Error
```
SQLSTATE[08006] [7] connection to server failed
```
**Solution:**
- Check PostgreSQL is running: `sudo service postgresql status`
- Verify database credentials in `.env`
- Ensure database exists: `psql -U postgres -l`

#### 2. Permission Denied
```
The stream or file "storage/logs/laravel.log" could not be opened
```
**Solution:**
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

#### 3. Class Not Found
```
Target class [HomeController] does not exist
```
**Solution:**
```bash
composer dump-autoload
php artisan clear-compiled
php artisan config:clear
```

#### 4. Filament Not Loading
```
Page not found when accessing /admin
```
**Solution:**
```bash
php artisan filament:install --panels
php artisan route:clear
```

#### 5. Images Not Displaying
**Solution:**
```bash
php artisan storage:link
chmod -R 775 storage/app/public
```

### Clear All Caches

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
composer dump-autoload
```

## 📝 Development Commands

```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migration with seed
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_table_name

# Create new model
php artisan make:model ModelName -m

# Create new controller
php artisan make:controller ControllerName

# Create new Filament resource
php artisan make:filament-resource ResourceName

# Run tests
php artisan test

# Generate IDE helper (optional)
composer require --dev barryvdh/laravel-ide-helper
php artisan ide-helper:generate
```

## 📚 Documentation Links

- [Laravel Documentation](https://laravel.com/docs/11.x)
- [Filament Documentation](https://filamentphp.com/docs/3.x)
- [PostgreSQL Documentation](https://www.postgresql.org/docs/)

## 🤝 Support

For issues or questions:
- Email: info@edensgrona.se
- Phone: 076-049 28 28

## 📄 License

This project is proprietary and confidential.

---

**Developed by:** Multicaret Inc.  
**Year:** 2025  
**Version:** 1.0.0
