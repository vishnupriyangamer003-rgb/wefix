<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('customer_id');

            // pending -> payment_waiting -> payment_verification -> confirmed
            // -> packed -> shipped -> delivered (or cancelled at any point before shipped)
            $table->string('status')->default('pending');
            $table->string('payment_method'); // "online" or "whatsapp"

            $table->decimal('subtotal', 10, 2);
            $table->decimal('shipping_charge', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2);

            // Shipping details snapshot (captured at checkout time, independent of
            // later profile edits)
            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->string('shipping_email')->nullable();
            $table->text('shipping_address');
            $table->string('shipping_taluk')->nullable();
            $table->string('shipping_district')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_pincode')->nullable();

            // Billing snapshot — nullable, only populated when billing differs
            // from shipping
            $table->string('billing_name')->nullable();
            $table->string('billing_phone')->nullable();
            $table->text('billing_address')->nullable();

            $table->timestamp('terms_accepted_at')->nullable();
            $table->text('cancelled_reason')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
