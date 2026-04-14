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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->string('video_url_id', 11)->unique();

            $table->string('title', 255);
            $table->text('description');

            $table->boolean('allow_comments')->default(true);
            $table->boolean('for_kids');

            $table->boolean('is_blocked')->default(false);
            $table->string('blocked_reason', 512)->nullable();
            $table->unsignedSmallInteger('blocked_by_admin_id')->nullable();

            $table->unsignedInteger('duration');

            $table->unsignedBigInteger('views_count')->default(0);
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->unsignedBigInteger('dislikes_count')->default(0);
            $table->unsignedBigInteger('comments_count')->default(0);

            $table->string('visibility', 50)->default('public');
            
            $table->dateTime('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
