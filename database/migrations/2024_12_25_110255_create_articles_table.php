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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('image_path')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('slug')->unique();  // Added slug column
            $table->text('excerpt')->nullable();  // Added excerpt column
            $table->unsignedBigInteger('views')->default(0);  // Added views column
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
