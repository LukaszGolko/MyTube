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
        Schema::create('playlist_items', function (Blueprint $table) {

            $table->unsignedBigInteger('playlist_id');
            $table->unsignedBigInteger('video_id');

            $table->foreign('playlist_id')
                ->references('id')
                ->on('playlists')
                ->cascadeOnDelete();

            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->cascadeOnDelete();

            $table->unique(['playlist_id', 'video_id']);

            // $table->timestamps('created_at')->useCurrent();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_items');
    }
};
