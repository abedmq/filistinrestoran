<?php

namespace App\Models;

use App\Traits\ActivityTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{

    //

    public $timestamps = false;
    protected $fillable = ['key', 'value'];

    protected $primaryKey = 'key';
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';

    const CHECKBOX_INPUT = [];

    static function addORUpdate($data)
    {
        foreach ($data as $key => $value) {
            if ($value != null)
                self::updateOrCreate([
                    'key' => $key,
                ], [
                    'key' => $key,
                    'value' => $value,
                ]);
        }
        Cache::forget('settings');
    }

    static function getMenu()
    {
        return [
            'general' => [__('اعدادات عامة'), 'index'],
        ];
    }

    static function getTabs($key = 'general')
    {
        $pages = [
            'general' => [
                'general_tb' => __('اعدادات عامة'),
                'social_tb' => __('الحسابات الاجتماعية'),
                'email_tb' => __('رسائل البريد الإلكتروني'),
                'header_footer' => __('اضافات'),
                'marketing_campaigns' => __('الحملات التسويقية'),
            ],

        ];

        return $pages[$key] ?? [];
    }


    static function getParam($tab)
    {
        switch ($tab) {
            case 'general_tb':
                return [
                    ['logo', 'image', settings('logo'), __('شعار الموقع'), '', '', 'col-md-3'],
                    ['icon', 'image', settings('icon'), __('ايقونة الموقع'), '', '', 'col-md-3'],
                    ['share_photo', 'image', settings('share_photo'), __('صورة المشاركة على السوشيال'), '', '', 'sharePhoto col-md-6'],
                    ['title', 'text', settings('title'), __('عنوان الموقع'), ''],
                    ['name', 'text', settings('name'), __('اسم الموقع'), ''],
                    ['description', 'textarea', settings('description'), __('نبذه عن الموقع'), ''],
                    ['keyword', 'tags', settings('keyword'), __('كلمات مفتاحية'), 'keyword'],

                    ['email', 'text', settings('email'), __('البريد الالكتروني'), ''],
                    ['address', 'text', settings('address'), __('العنوان'), ''],
                    ['mobile', 'text', settings('mobile'), __('رقم جوال'), ''],
                    ['copyright', 'text', settings('copyright'), __('نص الحقوق'), ''],
                ];

            case  'social_tb' :
                return [
                    ['facebook', 'text', settings('facebook'), __('فيس بوك'), ''],
                    ['twitter', 'text', settings('twitter'), __('تويتر'), ''],
                    ['telegram', 'text', settings('telegram'), __('تيلغرام'), ''],
                    ['instagram', 'text', settings('instagram'), __('انستقرام'), ''],
                    ['youtube', 'text', settings('youtube'), __('يوتيوب'), ''],
                    ['whatsapp', 'text', settings('whatsapp'), __('واتس اب'), ''],
                    ['contact_email', 'text', settings('contact_email'), __('البريد الإلكتروني'), ''],
                ];

            case "email_tb":
                return [
                    ['email_activate_text', 'textarea', settings('email_activate_text'), __('نص ترحيبي للبريد الإلكتروني'), ''],
                ];

            case "header_footer":
                return [
                    ['header', 'textarea', settings('header'), 'كود الهيدر', ''],
                    ['footer', 'textarea', settings('footer'), 'كود الفوتر', ''],
                ];
            default:
                return [];
        }
    }
}
