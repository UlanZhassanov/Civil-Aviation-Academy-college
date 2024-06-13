<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Navigation;
use Illuminate\Http\Request;

class EventController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$events = Event::orderBy('publish_at', 'desc')->get();
		return view('front.events.index', compact('tree', 'events'));
	}
	public function show($slug)
	{
		$tree = Navigation::tree();
		$event = Event::where('slug', $slug)->first();
		return view('front.events.show', compact('tree', 'event'));
	}
}
