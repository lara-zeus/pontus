<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(config('rinvex.subscriptions.tables.plan_subscriptions'), function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('subscriber');
            $table->integer('plan_id')->unsigned();
            $table->string('slug');
            $table->json('name');
            $table->json('description')->nullable();
            $table->string('subscription_type')->default('FIXED');
            $table->dateTime('trial_ends_at')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('cancels_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->foreign('plan_id')->references('id')->on(config('rinvex.subscriptions.tables.plans'))
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('rinvex.subscriptions.tables.plan_subscriptions'));
    }
};
