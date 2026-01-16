# Deployment Guide

This guide covers deploying the Agency Website to a production server.

## Pre-Deployment Checklist

- [ ] Update `.env` with production values
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Configure database credentials
- [ ] Set secure `APP_KEY`
- [ ] Configure mail settings
- [ ] Set up SSL certificate
- [ ] Configure web server (Apache/Nginx)

## Server Requirements

- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Composer
- Node.js and npm
- Web server (Apache/Nginx)

## Deployment Steps

### 1. Clone Repository

```bash
git clone <repository-url>
cd agency-website
```

### 2. Install Dependencies

```bash
composer install --optimize-autoloader --no-dev
npm install
npm run build
```

### 3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with production values:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Database Setup

```bash
php artisan migrate --force
php artisan db:seed --force
```

### 5. Storage Link

```bash
php artisan storage:link
```

### 6. Optimize Application

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Set Permissions

```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## Nginx Configuration

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/agency-website/public;

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
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## Apache Configuration

Ensure `.htaccess` is in the `public` directory:

```apache
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

## SSL Certificate

Use Let's Encrypt for free SSL:

```bash
sudo certbot --nginx -d yourdomain.com
```

## Post-Deployment

1. Test all pages and functionality
2. Verify admin login works
3. Check image uploads
4. Test contact form
5. Verify multi-language switching
6. Check mobile responsiveness

## Maintenance Mode

To enable maintenance mode:

```bash
php artisan down
```

To disable:

```bash
php artisan up
```

## Updates

When updating the application:

```bash
git pull origin main
composer install --optimize-autoloader --no-dev
npm install
npm run build
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Backup

Regular backups are essential:

```bash
# Database backup
mysqldump -u username -p database_name > backup.sql

# Files backup
tar -czf backup.tar.gz /path/to/agency-website
```

## Monitoring

Consider setting up:
- Error logging (Laravel logs)
- Server monitoring
- Uptime monitoring
- Performance monitoring

## Security

- Keep Laravel and dependencies updated
- Use strong passwords
- Enable firewall
- Regular security audits
- Keep server OS updated
