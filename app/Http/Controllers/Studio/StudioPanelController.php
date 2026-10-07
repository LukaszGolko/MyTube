<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Inertia\Inertia;

use App\Models\Video;

class StudioPanelController extends Controller
{
    public function panel()
    {
        $latestVideo = Video::query()
            ->select('id', 'views_count', 'likes_count', 'comments_count', 'created_at', 'apv_per_video')
            ->with('thumbnail:id,video_id,path')
            ->latest('created_at')
            ->first();

        return Inertia::render('studio/studio-panel', [
            'latestVideo' => $latestVideo ? [
                'id' => $latestVideo->id,
                'views_count' => $latestVideo->views_count,
                'likes_count' => $latestVideo->likes_count,
                'comments_count' => $latestVideo->comments_count,
                'created_at' => $latestVideo->created_at->toISOString(),
                'apv_per_video' => $latestVideo->apv_per_video,
                'thumbnail' => $latestVideo->thumbnail ? [
                    'id' => $latestVideo->thumbnail->id,
                    'path' => Storage::disk('public')->url($latestVideo->thumbnail->path),
                ] : null,
            ] : null,
        ]);
    }
}
