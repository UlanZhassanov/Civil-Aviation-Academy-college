<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Navigation;
use App\Models\News;
use Illuminate\Http\Request;

class VirtualAdmissionController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$news = News::orderBy('publish_at', 'desc')->take(6)->get();
		$events = Event::orderBy('publish_at', 'desc')->take(4)->get();
		return view('front.virtual_admission', compact('tree', 'news', 'events'));
	}
}
