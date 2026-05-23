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
        Schema::create('audio_renditions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('video_id');

            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->cascadeOnDelete();

            $table->string('language')->nullable();
            $table->string('codec', 20);
            $table->unsignedBigInteger('bitrate');
            $table->unsignedTinyInteger('channel');
            $table->unsignedBigInteger('sample_rate');
            $table->string('path', 1024);
            $table->string('mime', 100);
            $table->unsignedBigInteger('size');

            $table->timestamps();

            $table->unique([
                'video_id',
                'language',
                'codec',
                'bitrate',
                'channel',
                'sample_rate',
            ], 'audio_renditions_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio_renditions');
    }
};
