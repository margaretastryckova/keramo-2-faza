<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Ak je používateľ prihlásený
            $table->string('email');
            $table->string('meno');
            $table->string('priezvisko');
            $table->string('firma')->nullable();
            $table->string('ulica');
            $table->string('mesto');
            $table->string('psc');
            $table->string('krajina');
            $table->string('predvolba')->nullable();
            $table->string('telefon');
            $table->string('delivery');
            $table->string('payment');
            $table->json('items'); // pole produktov z košíka
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
