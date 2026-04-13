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
        Schema::table('transactions', function (Blueprint $table) {
            // Add new columns
            $table->enum('type', ['credit', 'debit'])->after('description');
            $table->decimal('amount', 12, 2)->after('type');

            // Drop old columns
            $table->dropColumn(['credit', 'debit']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Add old columns back
            $table->decimal('credit', 12, 2)->nullable();
            $table->decimal('debit', 12, 2)->nullable();

            // Restore values based on type
            // NOTE: cannot do data migration here easily without DB queries

            // Drop new columns
            $table->dropColumn(['type', 'amount']);
        });
    }
};