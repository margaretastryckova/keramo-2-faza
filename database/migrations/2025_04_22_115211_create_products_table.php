<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nazov');
            $table->text('popis');
            $table->decimal('cena', 8, 2);
            $table->string('obrazok');
            $table->string('detail')->nullable();
            $table->string('objem')->nullable();
            $table->string('rozmer')->nullable();
            $table->string('slug')->unique();
            $table->string('kategoria')->nullable(); // napr. poháre, taniere
            $table->string('farba')->nullable(); // pre filtrovanie
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};