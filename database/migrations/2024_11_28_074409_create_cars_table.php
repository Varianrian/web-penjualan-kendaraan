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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('plate_number');
            $table->enum('transmission', ['manual', 'automatic']);
            $table->string('tax');
            $table->date('exp_date');
            $table->year('year');
            $table->string('color');
            $table->integer('kilometers');
            $table->string('registration_area');
            $table->integer('cc_engine');
            $table->string('image');
            $table->string('price');
            $table->boolean('is_sold')->default(false);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
