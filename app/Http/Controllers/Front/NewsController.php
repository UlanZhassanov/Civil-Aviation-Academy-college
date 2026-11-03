<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$data = News::orderBy('publish_at', 'desc')->where('compliance', 0)->paginate(24);
		return view('front.news.index', compact('tree', 'data'));
	}
	public function show($slug)
	{
		$tree = Navigation::tree();
		$data = News::where('compliance', 0)->where('slug', $slug)->first();
		$titles = $data ? $data->decodeSerialized($data->titles, 'titles') : null;
		$descriptions = $data ? $data->decodeSerialized($data->descriptions, 'descriptions') : null;
		$bg_images = $data ? $data->decodeSerialized($data->bg_images, 'bg_images') : null;
		$more_images = $data ? ($data->decodeSerialized($data->more_images, 'more_images') ?: []) : [];

		return view('front.news.show', compact(
			'tree',
			'data',
			'titles',
			'descriptions',
			'bg_images',
			'more_images'
		));
	}
}
