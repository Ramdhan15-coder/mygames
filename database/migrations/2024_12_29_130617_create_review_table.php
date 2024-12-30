<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('review', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key ke users
        $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade'); // Foreign key ke produk
        $table->integer('rating'); // Rating produk
        $table->text('komentar'); // Komentar review
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
