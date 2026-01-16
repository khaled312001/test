# Modern Agency Website

A modern, multi-language agency website built with Laravel 11, featuring a complete CMS admin panel.

## Features

- ✅ Multi-language support (English LTR + Arabic RTL)
- ✅ Responsive design with Tailwind CSS
- ✅ Complete CMS admin panel
- ✅ Services management
- ✅ Portfolio with categories
- ✅ Testimonials
- ✅ Contact form with spam protection
- ✅ SEO-ready pages
- ✅ Image optimization and lazy loading
- ✅ Modern UI/UX

## Tech Stack

- **Backend:** Laravel 11 + PHP 8.1+
- **Frontend:** Blade + Tailwind CSS
- **Database:** MySQL
- **Build Tool:** Vite

## Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and npm
- MySQL

### Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd agency-website
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database in `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=agency_website
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Create storage link**
   ```bash
   php artisan storage:link
   ```

8. **Build assets**
   ```bash
   npm run build
   ```

9. **Start development server**
   ```bash
   php artisan serve
   ```

10. **Start Vite dev server (in another terminal)**
    ```bash
    npm run dev
    ```

## Default Admin Credentials

- **Email:** admin@example.com
- **Password:** password

**⚠️ Change these credentials immediately after first login!**

## Admin Panel

Access the admin panel at: `http://localhost:8000/admin/dashboard`

Login at: `http://localhost:8000/login`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   └── Frontend/       # Frontend controllers
│   └── Middleware/         # Custom middleware
├── Models/                 # Eloquent models
database/
├── migrations/             # Database migrations
└── seeders/               # Database seeders
resources/
├── views/
│   ├── admin/             # Admin views
│   ├── frontend/          # Frontend views
│   ├── layouts/           # Layout templates
│   └── partials/          # Reusable components
├── css/                   # Styles
└── js/                    # JavaScript
routes/
└── web.php                # Web routes
```

## Features Overview

### Frontend

- **Home Page:** Hero section, services overview, why choose us, portfolio highlights, testimonials
- **Services:** Listing and detail pages
- **Portfolio:** Listing with category filters and detail pages
- **About:** Customizable about page
- **Contact:** Contact form with validation

### Admin Panel

- **Dashboard:** Statistics and recent submissions
- **Services:** Full CRUD operations
- **Portfolio:** Full CRUD with image gallery
- **Testimonials:** Manage client testimonials
- **Contact Submissions:** View and export contact form submissions
- **Pages:** Manage page content
- **Settings:** Site configuration (logo, colors, social links, etc.)

## Multi-language Support

The website supports English (LTR) and Arabic (RTL). Language switching is available in the navigation bar.

Language files are located in:
- `lang/en/messages.php`
- `lang/ar/messages.php`

## Deployment

### Production Setup

1. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
2. Run `php artisan config:cache`
3. Run `php artisan route:cache`
4. Run `php artisan view:cache`
5. Build assets: `npm run build`
6. Set proper file permissions for `storage/` and `bootstrap/cache/`

### Server Requirements

- PHP 8.1+
- MySQL 5.7+ or MariaDB 10.3+
- Web server (Apache/Nginx)
- mod_rewrite enabled

## Security

- CSRF protection enabled
- SQL injection protection (Eloquent ORM)
- XSS protection (Blade escaping)
- Password hashing
- Input validation
- Spam protection for contact form

## Performance

- Image lazy loading
- Database query optimization
- Caching support (configure in `.env`)
- Optimized assets with Vite

## Support

For issues or questions, please contact the development team.

## License

This project is proprietary software. All rights reserved.
