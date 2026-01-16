<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create sample services
        Service::create([
            'title_en' => 'Web Development',
            'title_ar' => 'تطوير المواقع',
            'slug' => 'web-development',
            'description_en' => 'Custom web applications built with modern technologies',
            'description_ar' => 'تطبيقات ويب مخصصة مبنية بتقنيات حديثة',
            'content_en' => 'We create stunning, responsive web applications that deliver exceptional user experiences.',
            'content_ar' => 'نقوم بإنشاء تطبيقات ويب رائعة ومتجاوبة توفر تجارب مستخدم استثنائية.',
            'icon' => '🌐',
            'featured' => true,
            'order' => 1,
            'status' => true,
        ]);

        Service::create([
            'title_en' => 'Mobile App Development',
            'title_ar' => 'تطوير التطبيقات',
            'slug' => 'mobile-app-development',
            'description_en' => 'Native and cross-platform mobile applications',
            'description_ar' => 'تطبيقات الهاتف المحمول الأصلية ومتعددة المنصات',
            'content_en' => 'Build powerful mobile apps for iOS and Android platforms.',
            'content_ar' => 'بناء تطبيقات الهاتف المحمول القوية لمنصات iOS و Android.',
            'icon' => '📱',
            'featured' => true,
            'order' => 2,
            'status' => true,
        ]);

        // Create sample portfolio
        Portfolio::create([
            'title_en' => 'E-Commerce Platform',
            'title_ar' => 'منصة التجارة الإلكترونية',
            'slug' => 'ecommerce-platform',
            'description_en' => 'A modern e-commerce solution with advanced features',
            'description_ar' => 'حل تجارة إلكترونية حديث مع ميزات متقدمة',
            'content_en' => 'Complete e-commerce platform with payment integration and inventory management.',
            'content_ar' => 'منصة تجارة إلكترونية كاملة مع تكامل الدفع وإدارة المخزون.',
            'category_en' => 'Web Development',
            'category_ar' => 'تطوير المواقع',
            'featured' => true,
            'order' => 1,
            'client_name' => 'ABC Company',
            'project_date' => now()->subMonths(2),
            'status' => true,
        ]);

        // Create sample testimonials
        Testimonial::create([
            'name' => 'John Doe',
            'position_en' => 'CEO',
            'position_ar' => 'الرئيس التنفيذي',
            'company' => 'Tech Corp',
            'content_en' => 'Excellent service and outstanding results!',
            'content_ar' => 'خدمة ممتازة ونتائج استثنائية!',
            'rating' => 5,
            'featured' => true,
            'order' => 1,
            'status' => true,
        ]);

        // Create default settings
        Setting::set('site_name_en', 'Agency Website');
        Setting::set('site_name_ar', 'موقع الوكالة');
        Setting::set('email', 'info@example.com');
        Setting::set('phone', '+1234567890');
        Setting::set('address_en', '123 Main Street, City, Country');
        Setting::set('address_ar', '123 الشارع الرئيسي، المدينة، البلد');
    }
}
