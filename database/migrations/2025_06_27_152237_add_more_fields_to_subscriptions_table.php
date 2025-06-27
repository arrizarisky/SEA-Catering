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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('phone_number');
            $table->json('meal_types');
            $table->json('delivery_days');
            $table->text('allergies')->nullable();
            $table->decimal('total_price', 10, 2);

            // Kolom tambahan
            $table->string('address')->nullable();
            $table->enum('payment_method', ['cash', 'transfer', 'ewallet'])->default('transfer');
            $table->text('notes')->nullable();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn([
                'full_name',
                'phone_number',
                'meal_types',
                'delivery_days',
                'allergies',
                'total_price',
                'address',
                'payment_method',
                'notes',
            ]);
        });
    }
};
