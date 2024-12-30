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
    Schema::create('history_transaksi', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade'); // Foreign key ke transaksi
        $table->string('status'); // Status riwayat transaksi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_transaksi');
    }
};
