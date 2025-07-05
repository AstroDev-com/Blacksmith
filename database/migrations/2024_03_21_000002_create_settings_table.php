<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->string('type')->default('text');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // إضافة الإعدادات الأساسية
        $settings = [
            [
                'key' => 'site_name',
                'value' => 'مدونتي',
                'group' => 'general',
                'type' => 'text',
                'description' => 'اسم الموقع'
            ],
            [
                'key' => 'site_description',
                'value' => 'مدونة شخصية',
                'group' => 'general',
                'type' => 'textarea',
                'description' => 'وصف الموقع'
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'group' => 'general',
                'type' => 'image',
                'description' => 'شعار الموقع'
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@example.com',
                'group' => 'contact',
                'type' => 'email',
                'description' => 'البريد الإلكتروني للتواصل'
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1234567890',
                'group' => 'contact',
                'type' => 'text',
                'description' => 'رقم الهاتف للتواصل'
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://facebook.com',
                'group' => 'social',
                'type' => 'url',
                'description' => 'رابط صفحة الفيسبوك'
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com',
                'group' => 'social',
                'type' => 'url',
                'description' => 'رابط حساب تويتر'
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://instagram.com',
                'group' => 'social',
                'type' => 'url',
                'description' => 'رابط حساب انستغرام'
            ],
            [
                'key' => 'meta_description',
                'value' => 'مدونة شخصية',
                'group' => 'seo',
                'type' => 'textarea',
                'description' => 'وصف الموقع للمحركات البحثية'
            ],
            [
                'key' => 'meta_keywords',
                'value' => 'مدونة, مقالات, أخبار',
                'group' => 'seo',
                'type' => 'text',
                'description' => 'الكلمات المفتاحية للموقع'
            ]
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::create($setting);
        }
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
