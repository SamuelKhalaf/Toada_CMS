<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Models\Story;
use App\Models\Project;
use App\Models\Flipbook;
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
        
        // Get all published projects
        $projects = Project::getPublished();
        
        // Get published flipbooks (ordered by id desc - database order)
        $flipbooks = Flipbook::getPublished();
        
        return view('pages.insights', compact('insights', 'stories', 'projects', 'flipbooks'));
    }

    public function show($slug)
    {
        $insight = Insight::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        
        return view('pages.insights-description', compact('insight'));
    }
}
