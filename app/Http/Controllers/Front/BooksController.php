<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\LibraryNavigation;
use App\Models\NewBooks;
use App\Models\LibraryNews;
use App\Models\BookCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class BooksController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		$libtree = LibraryNavigation::tree();
		$newbooks = NewBooks::orderBy('id', 'desc')->take(10)->get();
		$bookcollection = BookCollection::where('active', 1)->get();
		$library_news = LibraryNews::orderBy('publish_at', 'desc')->take(6)->get();
		return view('front.library', compact('tree', 'libtree', 'newbooks', 'bookcollection', 'library_news'));
	}
}
