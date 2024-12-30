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
    Schema::create('produk', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->string('nama'); // Nama produk
        $table->text('deskripsi'); // Deskripsi produk
        $table->decimal('harga', 10, 2); // Harga produk
        $table->integer('stok'); // Stok produk
        $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade'); // Foreign key ke kategori
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
