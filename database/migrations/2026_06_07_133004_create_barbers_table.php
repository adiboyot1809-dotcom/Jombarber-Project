<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('barbers', function (Blueprint $table) {
            $table->id('barber_id'); // Matching PK from ERD
            $table->string('name');
            $table->string('specialization');
            $table->string('availability_status')->default('Available');
            $table->string('image_path')->nullable(); // Media integration
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('barbers');
    }
};