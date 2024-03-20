<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('sale');
            $table->string('invoice_id');
            $table->decimal('amount')->default('0.00');

            //$table->string('cart_id')->nullable();
            $table->string('status')->default('new');
            //$table->boolean('approved')->default(0);
            //$table->bigInteger('order_ref')->nullable();

            $table->string('trx_reference')->nullable();
            $table->string('trx_id')->nullable();
            $table->text('response')->nullable();
            $table->string('code')->nullable();
            $table->string('code_text')->nullable();
            $table->string('ndc')->nullable();

            $table->unsignedInteger('refund_for_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            //$table->string('payment_type_acc')->nullable();
            //$table->boolean('is_checked_failure')->default(0);
            //$table->string('attachment')->nullable();
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
        Schema::dropIfExists('invoice_transactions');
    }
};
