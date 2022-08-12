<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();

                $table->integer('sort')->default(5);
                $table->boolean('status')->default(1);
                $table->integer('parent_id')->nullable();
                $table->integer('language_id')->default(1);
                $table->timestamps();
            });

        \App\Models\Category::create([
            'title'=>'الساندوتشات والوحبات',
        ]);
        \App\Models\Category::create([
            'title'=>'الوحبات'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
