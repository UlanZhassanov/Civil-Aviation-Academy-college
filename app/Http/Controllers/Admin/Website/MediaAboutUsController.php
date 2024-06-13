<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaAboutUs;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaAboutUsController extends Controller
{
	public function __construct()
	{
		/* $user_id = User::find(Auth::user()->id)->permissions->permission;
		$unserialize = unserialize($user_id);

		if($unserialize->media_about_us->read == true){
			return abort('403', 'Доступ разрешён');
		}
		else{
			return abort('403', 'Доступ запрещён');
		} */
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$media_about_us = MediaAboutUs::orderBy('id', 'desc')->get();
		return view('admin.website.media_about_us.index', compact('media_about_us'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.website.media_about_us.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
        // Validate Background Images
			$request->validate([
				'bg_image' => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
			]);

		$user = User::find(Auth::user()->id)->workersInfo;
		$media_about_us_id = MediaAboutUs::orderBy('id', 'desc')->first();
		if (empty($media_about_us_id)) {
			$media_about_us_id = 1;
		} else {
			$media_about_us_id = MediaAboutUs::orderBy('id', 'desc')->first();
			$media_about_us_id = $media_about_us_id->id;
		}
		$data = new MediaAboutUs();


        $now = date_format(now('Asia/Almaty'), 'Ymd');
		$folder = public_path('/storage/mediaAboutUs/');

        // Background Images
        $bg_image = $request->file('bg_image');
		if (!empty($bg_image)) {
			$bg_image_name = $now . $bg_image->getClientOriginalName();
			$bg_image = Image::make($bg_image);
			$bg_image->save($folder . $bg_image_name, 40);
		}

		// Сохраняём в базу
		$data->user_id = $user->user_id;
		$data->title_ru = $request->title_ru;
		$data->title_kk = $request->title_kk;
		$data->title_en = $request->title_en;
		$data->media_ru = $request->media_ru;
		$data->media_kk = $request->media_kk;
		$data->media_en = $request->media_en;
		$data->bg_image = $bg_image_name;
		$data->publish_at = $request->publish_at;
		$data->link = $request->link;

		$data->save();

		return redirect()->route('admin.website.media_about_us.index')->with('alert', 'Пост успешно создан!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$media_about_us = MediaAboutUs::find($id);
		return view('admin.website.media_about_us.edit', compact('media_about_us'));
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
		// For generate name images ...
		$now = date_format(now('Asia/Almaty'), 'Ymd');
		$folder = public_path('/storage/mediaAboutUs/');

        // Validate Background Images
        $request->validate([
            'bg_image' => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
        ]);;

		$media_about_us = MediaAboutUs::find($id);
        // Delete Bg Images
		$oldBgImage = $media_about_us->bg_image;


        $bg_image = $request->file('bg_image');
		if (!empty($bg_image)) {
            if ($oldBgImage === $bg_image) {
                File::delete(public_path('/storage/mediaAboutUs/' . $oldBgImage));
            }
		    $bg_image_name = $now . $bg_image->getClientOriginalName();
			$bg_image = Image::make($bg_image);
			$bg_image->save($folder . $bg_image_name, 40);
		}


		$media_about_us->title_ru = $request->title_ru;
		$media_about_us->title_kk = $request->title_kk;
		$media_about_us->title_en = $request->title_en;
		$media_about_us->media_ru = $request->media_ru;
		$media_about_us->media_kk = $request->media_kk;
		$media_about_us->media_en = $request->media_en;
		$media_about_us->bg_image = $bg_image_name;
		$media_about_us->publish_at = $request->publish_at;
		$media_about_us->link = $request->link;
		$media_about_us->save();

		return redirect()->route('admin.website.media_about_us.index')->with('alert', 'Пост успешно изменен!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$media_about_us = MediaAboutUs::find($id);
		$media_about_us->delete();
		return redirect()->back()->with('alert', 'Пост успешно удален!');
	}
}
