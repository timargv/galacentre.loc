<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('galaId')->nullable();                      // ID товара на ГалаЦентре

            $table->string('title')->index()->nullable();               // Свое название товара
            $table->string('name_original')->index();                   // Оригинальное название товара
            $table->string('name_h1')->index()->nullable();             // Название для тега <h1>

            $table->string('article');                                  // Артикул товара

            $table->integer('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->integer('category_id')->references('id')->on('product_categories');
            $table->integer('brand_id')->nullable()->references('id')->on('brands');

            $table->float('price')->nullable()->default('0');     // Цена Своя
            $table->float('price_base')->nullable();                    // Цена Базовая
            $table->float('price_old')->nullable();                     // Цена Старая
            $table->float('price_sp')->nullable();                      // Цена Специальная

            $table->text('sh_description')->nullable();                 // Краткое Описание
            $table->text('full_description')->nullable();               // Полное Описание

            $table->integer('min')->nullable();
            $table->integer('box')->nullable();
            $table->integer('fix')->nullable();
            $table->integer('new')->nullable();
            $table->integer('hit')->nullable();

            $table->integer('stk')->nullable();                         // Наличие
            $table->integer('store_ekb')->nullable();                   // Наличие Екатеринбург
            $table->integer('store_msk')->nullable();                   // Наличие Москва
            $table->integer('store_nsk')->nullable();                   // Наличие Новосибирск

            $table->string('image')->nullable();
            $table->json('images')->nullable();

            $table->string('way')->nullable();
            $table->json('sert')->nullable();
            $table->string('barcode')->nullable();
            $table->json('props')->nullable();
            $table->json('specifications')->nullable();
            $table->json('includes')->nullable();

            $table->string('status', 16);

            $table->string('date_update')->nullable();
            $table->string('slug')->nullable();

            $table->timestamps();
        });

        Schema::create('product_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->string('file');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_photos');
    }
}
