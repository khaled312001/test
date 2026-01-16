# Quick Start Guide

## Step-by-Step Instructions to Run the Project

### Prerequisites Check

First, make sure you have installed:
- ✅ PHP 8.1 or higher
- ✅ Composer
- ✅ Node.js and npm
- ✅ MySQL (or XAMPP/WAMP with MySQL)

### Step 1: Install PHP Dependencies

```bash
composer install
```

If Composer is not installed, download it from: https://getcomposer.org/download/

### Step 2: Install Node Dependencies

```bash
npm install
```

### Step 3: Create Environment File

```bash
copy .env.example .env
```

Or manually create `.env` file and copy content from `.env.example`

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Configure Database

Edit `.env` file and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agency_website
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Important:** Create the database first:
```sql
CREATE DATABASE agency_website;
```

### Step 6: Run Migrations and Seeders

```bash
php artisan migrate --seed
```

This will:
- Create all database tables
- Insert sample data (admin user, services, portfolio, etc.)

### Step 7: Create Storage Link

```bash
php artisan storage:link
```

This creates a symbolic link for file uploads.

### Step 8: Build Frontend Assets

For development:
```bash
npm run dev
```

For production:
```bash
npm run build
```

### Step 9: Start the Server

Open a new terminal and run:

```bash
php artisan serve
```

The application will be available at: **http://localhost:8000**

### Step 10: Access the Website

- **Frontend:** http://localhost:8000
- **Admin Login:** http://localhost:8000/login
  - Email: `admin@example.com`
  - Password: `password`

---

## Troubleshooting

### "Composer not found"
- Install Composer: https://getcomposer.org/download/
- Or use: `php composer.phar install`

### "npm not found"
- Install Node.js: https://nodejs.org/
- Restart terminal after installation

### Database Connection Error
- Make sure MySQL is running
- Check database credentials in `.env`
- Verify database exists

### "Class not found" errors
- Run: `composer dump-autoload`

### Assets not loading
- Make sure to run `npm run dev` or `npm run build`
- Check that Vite is running (if using `npm run dev`)

---

## Development Mode

For development with hot-reload:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

This enables automatic asset recompilation when you change CSS/JS files.

---

## Production Build

For production:

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
