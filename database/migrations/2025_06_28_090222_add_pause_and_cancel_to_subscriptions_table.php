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
            $table->boolean('is_paused')->default(false)->after('end_date');
            $table->date('pause_start')->nullable()->after('is_paused');
            $table->date('pause_end')->nullable()->after('pause_start');
            $table->boolean('is_cancelled')->default(false)->after('pause_end');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropColumn(['is_paused', 'pause_start', 'pause_end', 'is_cancelled']);
        });
    }
};
