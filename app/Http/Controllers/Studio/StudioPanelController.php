<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\Video;

class StudioPanelController extends Controller
{
    public function panel()
    {
        $latestVideo = Video::select('id', 'views_count', 'likes_count', 'created_at')->latest()->first();

        return Inertia::render('studio/studio-panel', [
        'latestVideo' => $latestVideo ? [
                'id' => $latestVideo->id,
                'views_count' => $latestVideo->views_count,
                'likes_count' => $latestVideo->likes_count,
                'created_at' => $latestVideo->created_at->toISOString(),
            ] : null,
    ]);
    }
}
