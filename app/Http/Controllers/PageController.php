<?php

namespace App\Http\Controllers;

use App\Services\ContentService;
use App\Models\Insight;
use App\Models\Story;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    public function index()
    {
        // Get insights for homepage (limit to latest 3 or so)
        $insights = Insight::getPublished()->take(3);
        
        return view('pages.index', compact('insights'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
