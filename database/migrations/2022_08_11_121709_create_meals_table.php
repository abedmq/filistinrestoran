<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->integer('price')->default(0);
            $table->string('title')->nullable();
            $table->foreignId('category_id');
            $table->text('description')->nullable();
            $table->integer('sort')->default(5);
            $table->boolean('status')->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('language_id')->default(1);
            $table->timestamps();
        });

        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'شاورما',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'كريسبي',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'فاهيتا',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'برجر',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'شرحات مطفاية',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'مكسيكانو',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);

        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'زنجر',
            'category_id' => 1,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);

        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'فروج مشوي',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'مندي منسف',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);

        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'راس خروف',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'تشكيلة مشاوي',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'cheken.png',
            'price' => 25,
            'title' => 'فتة رأس',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);
        \App\Models\Meal::create([
            'image' => 'share.png',
            'price' => 25,
            'title' => 'كرشات',
            'category_id' => 2,
            'description' => ' شاورما شاورما شاورما شاورما شاورما'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
