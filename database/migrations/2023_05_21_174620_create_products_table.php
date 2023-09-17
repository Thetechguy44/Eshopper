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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('Product_Id');
            $table->string('Name');
            $table->unSignedInteger('Subsubcat_Id');
            $table->string('Image');
            $table->string('Description');
            $table->string('Color');
            $table->string('Price');
            $table->string('Qyt');
            $table->timestamps();
            $table->foreign('Subsubcat_Id')
            ->references('Subsubcategory_Id')
            ->on('subsubcategories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
