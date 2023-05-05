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
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone', 15);
            $table->string('email', 50)->nullable();
            $table->string('website', 60)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->smallInteger('age')->nullable();
            $table->string('nationality', 20)->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_books');
    }
};
