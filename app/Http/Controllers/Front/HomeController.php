<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Navigation;
use App\Models\LibraryNavigation;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$libtree = LibraryNavigation::tree();
		$news = News::where('compliance', 0)->orderBy('publish_at', 'desc')->take(4)->get();
		$events = Event::orderBy('publish_at', 'desc')->take(5)->get();
		//return view('front.index', compact('tree', 'news', 'events'));
		$myvar = "<script> localStorage.getItem('welcomInfo')</script>";

        //return view('front.index', compact('tree', 'news', 'events'));
		// if(isset($_COOKIE['welcomeAGA'])){
		 	return view('front.index', compact('tree', 'libtree', 'news', 'events'));
		//  }else{
		//  	setcookie('welcomeAGA', 'yes', time() + (86400 * 15), "/");
		//  	return view('welcome', compact('tree', 'news', 'events'));
        //     return view('front.index', compact('tree', 'news', 'events'));
		//  }
	}
}
