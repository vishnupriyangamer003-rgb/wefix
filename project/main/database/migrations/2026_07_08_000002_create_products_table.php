<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name_en');
            $table->string('name_ta')->nullable();
            $table->string('name_hi')->nullable();
            $table->string('slug')->unique();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_ta')->nullable();
            $table->text('short_description_hi')->nullable();
            $table->longText('full_description_en')->nullable();
            $table->longText('full_description_ta')->nullable();
            $table->longText('full_description_hi')->nullable();
            $table->text('features_en')->nullable();
            $table->text('features_ta')->nullable();
            $table->text('features_hi')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('moq')->default(100);
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('search_keywords')->nullable();
            $table->boolean('status')->default(1);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
