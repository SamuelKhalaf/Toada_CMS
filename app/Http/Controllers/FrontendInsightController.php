<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\Story;
use Illuminate\Http\Request;

class FrontendInsightController extends Controller
{
    public function index()
    {
        // Get all published insights
        $insights = Insight::getPublished();
        
        // Get the 2 stories that should appear on insights page (ksa-china-culture-forum and learn-program)
        $stories = Story::where('status', 'published')
            ->whereIn('slug', ['ksa-china-culture-forum', 'learn-program'])
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->orderBy('order')
            ->orderByDesc('published_at')
            ->get();
        
        return view('pages.insights', compact('insights', 'stories'));
    }

    public function show($slug)
    {
        $insight = Insight::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        
        return view('pages.insights-description', compact('insight'));
    }
}
