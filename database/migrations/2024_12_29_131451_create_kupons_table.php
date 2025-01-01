<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('kupons', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique();
        $table->integer('diskon');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('kupons');
    }
};
