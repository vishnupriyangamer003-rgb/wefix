<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('name_en');
            $table->string('name_ta')->nullable();
            $table->string('name_hi')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_ta')->nullable();
            $table->text('short_description_hi')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
