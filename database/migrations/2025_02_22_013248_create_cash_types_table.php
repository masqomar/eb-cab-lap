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
        Schema::create('cash_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
			$table->boolean('status');
			$table->string('income', 255)->nullable();
			$table->string('cashout', 255)->nullable();
			$table->string('transfer', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_types');
    }
};
