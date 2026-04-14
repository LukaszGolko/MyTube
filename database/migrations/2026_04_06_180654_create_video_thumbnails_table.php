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
        Schema::create('video_thumbnails', function (Blueprint $table) {
            $table->id();

            $table->foreignId('video_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('path', 1024);
            $table->unsignedSmallInteger('width');
            $table->unsignedSmallInteger('height');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_thumbnails');
    }
};
