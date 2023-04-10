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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('bank_branch_id')->nullable()->references('id')->on('bank_branches');
            $table->foreignId('bonus_rate_id')->nullable()->references('id')->on('bonus_rates');
            $table->foreignId('role_id')->nullable()->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bank_branch_id');
            $table->dropColumn('bonus_rate_id');
            $table->dropColumn('role_id');
        });
    }
};
