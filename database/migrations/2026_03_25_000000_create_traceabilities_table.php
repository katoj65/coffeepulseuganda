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
        Schema::create('traceabilities', function (Blueprint $table) {
            $table->id();
            $table->string('batch')->unique();
            $table->string('issuer');
            $table->text('image')->nullable();
            $table->string('variety');
            $table->string('origin');
            $table->string('score');
            $table->string('grade');
            $table->json('badges');
            $table->json('impact_cards');
            $table->json('journey_steps');
            $table->string('estate_eyebrow');
            $table->string('estate_title');
            $table->text('estate_description');
            $table->text('farmer_image')->nullable();
            $table->string('farmer_name');
            $table->string('farmer_role');
            $table->json('estate_details');
            $table->string('process_eyebrow');
            $table->string('process_title');
            $table->json('process_details');
            $table->json('sensory_profile');
            $table->text('process_note')->nullable();
            $table->string('blockchain_hash');
            $table->text('blockchain_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traceabilities');
    }
};
