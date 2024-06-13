<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Navigation;
use App\Models\News;
use Illuminate\Http\Request;

class TrainingCenterController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		return view('front.training_centers', compact('tree'));
	}
}
