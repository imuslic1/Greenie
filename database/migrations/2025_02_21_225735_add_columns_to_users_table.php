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
            $table->foreignId('company_id')->nullable()->constrained();
            $table->date('last_streak_update')->nullable();
            $table->integer('longest_streak')->default(0);
            $table->integer('current_streak')->default(0);
            $table->integer('balance')->default(0);
            $table->string('slug')->unique();
            $table->boolean('is_company')->default(false);
            $table->integer('age')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->dropColumn('last_streak_update');
            $table->dropColumn('longest_streak');
            $table->dropColumn('current_streak');
            $table->dropColumn('balance');
            $table->dropColumn('slug');
            $table->dropColumn('is_company');
            $table->dropColumn('age');
        });
    }
};
