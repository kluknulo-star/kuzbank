<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('users');
            $table->foreignId('worker_id')->references('id')->on('users');
            $table->foreignId('type_deposit_id')->references('id')->on('type_deposits');
            $table->boolean('is_approved')->nullable();
            $table->bigInteger('amount');
            $table->float('percent');
            $table->timestamps();
            $table->timestamp('closed_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_deposits');
    }
};
