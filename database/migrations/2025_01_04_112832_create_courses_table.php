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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->string('welcome_message')->nullable();
            $table->string('goodbye_message')->nullable();
            $table->string('observation')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('level_id')->constrained();
            $table->foreignId('price_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
