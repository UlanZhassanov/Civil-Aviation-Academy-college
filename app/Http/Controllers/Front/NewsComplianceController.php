<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NewsComplianceController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$data = News::where('compliance', 1)->orderBy('publish_at', 'desc')->get();
		return view('front.newsCompliance.index', compact('tree', 'data'));
	}
	public function show($slug)
	{
		$tree = Navigation::tree();
		$data = News::where('compliance', 1)->where('slug', $slug)->first();
		if(isset($data->more_images)){
			$more_images = unserialize($data->more_images);
		}
		return view('front.newsCompliance.show', compact('tree', 'data', 'more_images'));
	}
}
