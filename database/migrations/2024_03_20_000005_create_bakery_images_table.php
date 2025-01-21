<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bakery_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bakery_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bakery_images');
    }
}; 