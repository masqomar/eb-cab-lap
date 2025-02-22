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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->unique();
			$table->foreignId('branch_id')->constrained('branches')->cascadeOnUpdate()->cascadeOnDelete();
			$table->date('date');
			$table->integer('amount');
			$table->text('description', 255)->nullable();
			$table->string('transaction_type', 255);
			$table->foreignId('from_cash_type_id')->nullable()->constrained('cash_types')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('to_cash_type_id')->nullable()->constrained('cash_types')->cascadeOnUpdate()->cascadeOnDelete();
			$table->foreignId('account_type_id')->nullable()->constrained('account_types')->cascadeOnUpdate()->cascadeOnDelete();
			$table->enum('dk', ['D', 'K'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
