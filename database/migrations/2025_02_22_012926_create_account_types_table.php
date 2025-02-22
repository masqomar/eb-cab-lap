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
        Schema::create('account_types', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->unique();
			$table->string('name', 255);
			$table->string('type', 255)->nullable();
			$table->string('income_statement', 255)->nullable();
			$table->string('income', 255)->nullable();
			$table->string('cashout', 255)->nullable();
			$table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_types');
    }
};
