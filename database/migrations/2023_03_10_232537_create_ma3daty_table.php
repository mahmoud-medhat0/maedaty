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
        Schema::create('ma3daty', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('address');
            $table->string('for');
            $table->string("maedaType");
            $table->integer('government_id');
            $table->integer('city_id');
            $table->boolean('status',1)->default(0);
            $table->double('lat')->default(0);
            $table->double('lng')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma3daty');
    }
};
