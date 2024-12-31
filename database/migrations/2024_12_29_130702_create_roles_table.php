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
    Schema::create('roles', function (Blueprint $table) {
        $table->id(); // Primary key
        $table->string('nama_role'); // Nama role
        $table->text('deskripsi')->nullable(); // Deskripsi role
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};