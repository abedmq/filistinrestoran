<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettings extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value');

            //

            $table->timestamps();
        });

        \App\Models\Setting::addORUpdate([
            'name' => 'filistinrestoran',
            'title' => 'مطعم فلسطين للكرشات والمندي',
            'logo' => 'logo.png',
            'icon' => 'logo.png',
            'share_photo' => 'share.png',
            'description' => 'للطعم حكاية .. وإحنا اصل الحكاية  😋<br> #للكرشات تاريخ و_الطعم_حكاية <br>مطعم  فلسطين  للاكل الطيب عنوان<br>اسياد المندي والكرشات في انطاليا💪💪💪 ',
            'keyword' => 'مطعم,فلسطين,للكرشات,والمندي',
            'email' => 'abedmq2@gmail.com',
            'address' => 'أنطاليا',
            'mobile' => '05537456311',
            'copyright' => 'جميع الحقوق محفوظة',
        ]);
        \Illuminate\Support\Facades\Cache::forget('settings');
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
