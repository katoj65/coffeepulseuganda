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
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('traceability_id')
                ->constrained('traceabilities')
                ->cascadeOnDelete();
            $table->string('label')->default('Primary QR');
            $table->text('payload');
            $table->string('format')->default('svg');
            $table->unsignedInteger('size')->default(192);
            $table->boolean('is_primary')->default(true);
            $table->timestamps();

            $table->index('traceability_id');
            $table->unique(['traceability_id', 'label']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
