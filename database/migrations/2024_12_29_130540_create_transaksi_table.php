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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key ke users
        $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade'); // Foreign key ke produk
        $table->integer('jumlah'); // Jumlah produk
        $table->decimal('total_harga', 10, 2); // Total harga
        $table->string('status'); // Status transaksi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
