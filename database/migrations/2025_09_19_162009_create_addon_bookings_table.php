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
        Schema::create('addon_bookings', function (Blueprint $table) {
            $table->foreignId('booking_id')->constrained(
                table: 'bookings',
                indexName: 'addon_bookings_booking_id'
            );
            $table->foreignId('addon_id')->constrained(
                table: 'addons',
                indexName: 'addon_bookings_addon_id'
            );
            $table->primary(['addon_id', 'booking_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addon_bookings');
    }
};
