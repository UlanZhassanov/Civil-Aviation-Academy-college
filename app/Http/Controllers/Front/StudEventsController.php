<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\Studevents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StudEventsController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$data = Studevents::orderBy('publish_at', 'desc')->get();
		return view('front.studevents.index', compact('tree', 'data'));
	}
	public function show($slug)
	{
		$tree = Navigation::tree();
		$data = Studevents::where('slug', $slug)->first();
		if(isset($data->more_images)){
			$more_images = unserialize($data->more_images);
		}
		return view('front.studevents.show', compact('tree', 'data', 'more_images'));
	}
}
