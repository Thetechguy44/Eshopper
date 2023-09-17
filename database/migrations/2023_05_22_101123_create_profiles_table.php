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
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Profile-Image');
            $table->string('Firstname');
            $table->string('Lastname');
            $table->string('Othername');
            $table->text('About');
            $table->string('Email');
            $table->string('Phone');
            $table->string('DoB');
            $table->string('Job');
            $table->string('Country');
            $table->string('Address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
