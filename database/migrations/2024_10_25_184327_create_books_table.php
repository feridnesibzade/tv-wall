<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->integer('zip_code');
            $table->foreignId('tv_size_id');
            $table->foreignId('city_id');
            $table->foreignId('wall_mount_id');
            $table->foreignId('wall_type_id');
            // $table->foreignId('extra_service_id');
            $table->integer('lift_assistance');
            $table->string('lift_assistance_title');
            $table->string('date');
            $table->text('time');
            $table->string('address');
            $table->string('address_detail')->nullable();
            $table->string('fullname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
