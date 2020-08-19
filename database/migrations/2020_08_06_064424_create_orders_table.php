<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_province');
            $table->string('billing_country');
            $table->string('billing_postalcode');
            $table->string('billing_phone');
            $table->string('billing_name_on_card');
            $table->float('billing_subtotal');
            $table->float('billing_total');
            $table->float('billing_discount')->default(0);
            $table->float('billing_tax');
            $table->text('billing_order_notes')->nullable();
            $table->text('billing_discount_details')->nullable();
            $table->string('payment_gateway')->default('stripe');
            $table->enum('status', ['pending', 'cancelled', 'processing', 'completed', 'declined', 'refunded', 'disputed', 'partially-refunded', 'awaiting-shipment', 'partially-shipped'])->default('processing');
            $table->boolean('shipped')->default(false);
            $table->text('error')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
