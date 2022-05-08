<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Relation between Setting & SettingTranslation is one to many
        // setMany function found in Setting Model

        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            // السماح بالتعليقات
            'reviews_enabled' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','LE','SAR'],
            // العمله الافتراضية
            'default_currency' => 'USD',
            'store_email' => 'admin@ecommerce.test',
            'search_engine' => 'mysql',
            // التوصيل الداخلى
            'local_shipping_cost' => 0,
            // التوصيل الخارجى
            'outer_shipping_cost' => 0,
            // التوصيل المجانى
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'Noran Shop',
                'free_shipping_label' => 'Free shipping',
                'local_label' => 'local shipping',
                'outer_label' => 'outer shipping',
            ],
        ]);


    }


}
