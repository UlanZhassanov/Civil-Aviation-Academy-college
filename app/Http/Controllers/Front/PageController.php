<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\LibraryNavigation;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\ReviewRating;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = new Page;
		$data->title_ru = $request->title_ru;
		$data->desc_ru = $request->desc_ru;
		if ($request->hasFile('bg_image_ru')) {
			// Form validation
			$request->validate([
				'images' => 'image|mimes:jpeg,png,jpg,gif|max:4096'
			]);

			$image = $request->file('bg_image_ru');
			$image_name = $image->getClientOriginalName();
			$destinationPath = public_path('/storage/pages');
			$image->move($destinationPath, $image_name);
			$data->bg_image_ru = '/storage/pages/' . $image_name;
		}
		$data->save();
		return redirect()->back()->with('alert', 'Страница успешно добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page)
    {
		$tree = Navigation::tree();
		$libtree = LibraryNavigation::tree();
		$data = Page::where('slug', $page)->first();
        if($data===null)
        abort(404);
		if (Config::get('app.locale') === 'ru') {
			$data->title = $data->title_ru;
			$data->desc = $data->desc_ru;
		} elseif (Config::get('app.locale') === 'kk') {
			$data->title = $data->title_kk;
			$data->desc = $data->desc_kk;
		} elseif (Config::get('app.locale') === 'en') {
			$data->title = $data->title_en;
			$data->desc = $data->desc_en;
		}
        $revR = ReviewRating::orderBy('created_at', 'asc')->get();
		return view('front.page', compact('tree','libtree', 'data','revR'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
