<?php

declare(strict_types=1);

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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('mt_order_id')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->string('payment_url')->nullable();
            $table->boolean('is_paid')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('mt_order_id');
            $table->dropColumn('valid_until');
            $table->dropColumn('payment_url');
            $table->dropColumn('is_paid');
        });
    }
};
