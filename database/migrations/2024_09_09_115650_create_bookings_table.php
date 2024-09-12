<?php

use App\Models\Car;
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
            $table->foreignIdFor(Car::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->integer('numOfDays');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
