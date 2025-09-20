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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained(
                table: 'users',
                indexName: 'bookings_customer_id'
            );
            $table->foreignId('vehicle_id')->constrained(
                table: 'vehicles',
                indexName: 'bookings_vehicle_id'
            );
            $table->foreignId('service_id')->constrained(
                table: 'services',
                indexName: 'bookings_service_id'
            );
            $table->foreignId('staff_id')->constrained(
                table: 'users',
                indexName: 'bookings_staff_id'
            );
            $table->date('booking_date');
            $table->time('booking_time');
            $table->integer('total_price');
            $table->integer('total_duration');
            $table->string('status')->default('Wait for Payment');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
