<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('user_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('trf')->unique(); // Bank transaction reference number
            $table->string('status')->default('pending'); // pending, approved, cancel
            $table->string('cancel_by')->nullable(); // customer, receptionist
            $table->string('bank_book'); // customer, receptionist
            $table->decimal('total_price')->nullable(); // (start_date - end_date) * price/day
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booked_rooms');
    }
}
