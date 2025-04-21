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
        Schema::create('v_amps', function (Blueprint $table) {
            $table->id();
            $table->decimal('voltage', 8, 2); // 8 digit total, 2 digit di belakang koma
            $table->decimal('current', 8, 2); // 8 digit total, 2 digit di belakang koma            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_amps');
    }
};
