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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('item_id')->nullable(); // ?? for what item? is it subscription?
            $table->decimal('amount');
            $table->string('status')->default('NEW');
            $table->decimal('tax');
            $table->string('discount_type')->nullable();
            $table->unsignedInteger('discount_value')->nullable();
            $table->dateTime('due_date')->default(now());
            $table->dateTime('exp_date')->nullable();
            $table->boolean('paid')->default(0);
            $table->boolean('allow_partial_paid')->default(0);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
