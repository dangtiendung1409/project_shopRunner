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
        Schema::create('favorite_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger("user_id")->nullable();
            $table->decimal('price', 8, 2);
            $table->string('thumbnail');
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorite_orders');
    }
};
