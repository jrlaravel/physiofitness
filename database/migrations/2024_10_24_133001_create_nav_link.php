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
        Schema::create('nav_link', function (Blueprint $table) {
            $table->id();
            $table->string('instagram_url');
            $table->string('facebook_url');
            $table->string('youtube_url');
            $table->string('address');
            $table->bigInteger('phone');
            $table->string('email'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_link');
    }
};
