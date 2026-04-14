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
        Schema::create('video_renditions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('video_id');

            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->cascadeOnDelete();

            $table->string('codec', 20);
            $table->unsignedBigInteger('bitrate');
            $table->unsignedSmallInteger('width');
            $table->unsignedSmallInteger('height');
            $table->decimal('fps', 6, 3);
            $table->string('path', 1024)->nullable();
            $table->string('path_manifest', 1024)->nullable();
            $table->string('folder_of_chunks', 1024)->nullable();
            $table->string('mime', 100);
            $table->unsignedBigInteger('size');
            $table->boolean('is_segmented');

            $table->timestamps();

            $table->unique([
                'video_id', 
                'codec', 
                'bitrate', 
                'width', 
                'height', 
                'fps', 
                'is_segmented'
                ],
                'video_renditions_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_renditions');
    }
};
