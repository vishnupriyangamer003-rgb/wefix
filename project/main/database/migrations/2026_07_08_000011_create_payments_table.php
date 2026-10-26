<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('screenshot_path')->nullable();
            $table->string('txn_number')->nullable();
            $table->date('txn_date')->nullable();
            $table->text('remarks')->nullable();
            // pending -> verified / rejected
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('verified_by')->references('id')->on('admins')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
