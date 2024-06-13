<?php

namespace App\Http\Controllers\Front\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use Illuminate\Http\Request;

class EnrolleeController extends Controller
{
	public function index()
	{
		$tree = Navigation::tree();
		return view('front.enrollee.preview', compact('tree'));
	}
}
