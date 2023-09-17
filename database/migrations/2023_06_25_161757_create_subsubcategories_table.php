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
        Schema::create('subsubcategories', function (Blueprint $table) {
            $table->increments('Subsubcategory_Id');
            $table->string('Name');
            $table->Integer('Subcategory_Id');
            $table->foreign('Subcategory_Id')
            ->references('Subcategory_Id')
            ->on('subcategories')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsubcategories');
    }
};
