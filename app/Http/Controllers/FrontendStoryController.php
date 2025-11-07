<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class FrontendStoryController extends Controller
{
    public function index()
{
        // Get all published stories
        $stories = Story::getPublished();
        
        return view('pages.success-stories', compact('stories'));
    }

    public function show($slug)
    {
        $story = Story::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
        
        return view('pages.story-description', compact('story'));
    }
}
