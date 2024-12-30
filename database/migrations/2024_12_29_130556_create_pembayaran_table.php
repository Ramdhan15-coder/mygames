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
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade'); // Foreign key ke transaksi
        $table->string('metode'); // Metode pembayaran
        $table->string('status_pembayaran'); // Status pembayaran
        $table->decimal('total_dibayar', 10, 2); // Total yang dibayar
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
