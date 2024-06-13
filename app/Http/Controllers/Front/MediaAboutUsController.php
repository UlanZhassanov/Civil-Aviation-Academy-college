<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\MediaAboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MediaAboutUsController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$data = MediaAboutUs::orderBy('publish_at', 'desc')->get();
		return view('front.media_about_us.index', compact('tree', 'data'));
	}
}
