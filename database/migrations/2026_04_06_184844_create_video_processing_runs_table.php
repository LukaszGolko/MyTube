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
        Schema::create('video_processing_runs', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('video_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('status', 50);

            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();

            $table->string('error_code', 50)->nullable();
            $table->text('error_message')->nullable();

            $table->unsignedTinyInteger('attempt')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_processing_runs');
    }
};
