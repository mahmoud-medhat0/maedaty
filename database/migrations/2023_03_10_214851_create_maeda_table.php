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
        Schema::create('maeda', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->boolean('status',1)->default(0);
            $table->float('lat')->default();
            $table->float('lng')->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maeda');
    }
};
