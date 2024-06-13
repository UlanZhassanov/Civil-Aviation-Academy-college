<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\Studevents;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudEventsController extends Controller
{
	public function __construct()
	{
		/* $user_id = User::find(Auth::user()->id)->permissions->permission;
		$unserialize = unserialize($user_id);

		if($unserialize->studevents->read == true){
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
		$userDepartment = User::find(Auth::user()->id)->workersInfo->department;
		$studevents = Studevents::where('department', $userDepartment)->get();
		return view('admin.website.studevents.index', compact('studevents'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
        $createForCompliance = false;
		$userDepartment = User::find(Auth::user()->id)->workersInfo->department;
        if($userDepartment == "ДМР"){
            $createForCompliance = true;
        }
		return view('admin.website.studevents.create', compact('createForCompliance'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$bg_images = [
			'ru' => 'bg_image_ru',
			'kk' => 'bg_image_kk',
			'en' => 'bg_image_en',
		];

		$more_images = [
			'more_image_1',
			'more_image_2',
			'more_image_3',
			'more_image_4',
			'more_image_5',
			'more_image_6',
			'more_image_7',
			'more_image_8',
			'more_image_9',
		];

		// Validate Background Images
		foreach ($bg_images as $k) {
			$request->validate([
				$k => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
			]);
		}

		// Validate More Images
		foreach ($more_images as $k) {
			$request->validate([
				$k => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
			]);
		}

		$now = date_format(now('Asia/Almaty'), 'Ymd');
		$folder = public_path('/storage/studevents/');
		$user = User::find(Auth::user()->id)->workersInfo;
		$studevents_id = Studevents::orderBy('id', 'desc')->first();
		if (empty($studevents_id)) {
			$studevents_id = 1;
		} else {
			$studevents_id = Studevents::orderBy('id', 'desc')->first();
			$studevents_id = $studevents_id->id;
		}
		$data = new Studevents();



		// Titles
		$titles = [
			'ru' => 'title_ru',
			'kk' => 'title_kk',
			'en' => 'title_en',
		];
		$title_arr = [];
		foreach ($titles as $k => $v) {
			$res = $request->$v;
			if (empty($res)) {
				$res = $title_arr['ru'];
			}
			$title_arr[$k] = $res;
		}
		$title_obj = json_decode(json_encode($title_arr));
		$title_ser = serialize($title_obj);

		// Descriptions
		$descs = [
			'ru' => 'desc_ru',
			'kk' => 'desc_kk',
			'en' => 'desc_en',
		];
		$desc_arr = [];
		foreach ($descs as $k => $v) {
			$res = $request->$v;
			if (empty($res)) {
				$res = $desc_arr['ru'];
			}
			$desc_arr[$k] = $res;
		}
		$desc_obj = json_decode(json_encode($desc_arr));
		$desc_ser = serialize($desc_obj);

		// Background Images
		$bg_arr = [];
		foreach ($bg_images as $k => $v) {
			$bg_image = $request->file($v);
			if (!empty($bg_image)) {
				$bg_image_name = $now . $k . $bg_image->getClientOriginalName();
				$bg_image = Image::make($bg_image);
				$bg_image->save($folder . $bg_image_name, 40);
				$bg_arr[$k] = $bg_image_name;
			} else {
				$bg_arr[$k] = null;
			}
		}
		$bg_obj = json_decode(json_encode($bg_arr));
		$bg_ser = serialize($bg_obj);

		// More Images
		$more_img_arr = [];
		foreach ($more_images as $v) {
			$more_image = $request->file($v);
			if (!empty($more_image)) {
				$more_image_name = $now . $v . $more_image->getClientOriginalName();
				$more_image = Image::make($more_image);
				$more_image->save($folder . $more_image_name, 40);
				$more_img_arr[] = $more_image_name;
			}
		}
		$more_img_obj = json_decode(json_encode($more_img_arr));
		$more_img_ser = serialize($more_img_obj);

		// Сохраняём в базу
		$data->user_id = $user->user_id;
		$data->slug = $studevents_id + 1;
		$data->titles = $title_ser;
		$data->descriptions = $desc_ser;
		$data->agree = true;
		$data->bg_images = $bg_ser;
		$data->more_images = $more_img_ser;
		$data->department = $user->department;

		$data->publish_at = $request->publish_at;
		$data->save();

		return redirect()->route('admin.website.studevents.index')->with('alert', 'Новость успешно создана!');
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
		$studevents = Studevents::find($id);
		return view('admin.website.studevents.edit', compact('studevents'));
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
		$folder = public_path('/storage/studevents/');

		$bg_images = [
			'ru' => 'bg_image_ru',
			'kk' => 'bg_image_kk',
			'en' => 'bg_image_en',
		];

		// Validate Background Images
		foreach ($bg_images as $bg_image) {
			$request->validate([
				$bg_image => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
			]);
		}

		// Get department name
		$studevents = Studevents::find($id);

		// Delete Bg Images
		$oldBgImages = unserialize($studevents->bg_images);
		$oldBgImages = (array) $oldBgImages;

		foreach ($bg_images as $k => $v) {
			$bg_image = $request->file($v);
			if (!empty($bg_image)) {
				foreach ($oldBgImages as $oldBgImageKey => $oldBgImageValue) {
					if ($oldBgImageKey === $k) {
						File::delete(public_path('/storage/studevents/' . $oldBgImageValue));
					}
				}
				$bg_image_name = $now . $k . $bg_image->getClientOriginalName();
				$bg_image = Image::make($bg_image);
				$bg_image->save($folder . $bg_image_name, 40);
				$oldBgImages[$k] = $bg_image_name;
			}
		}

		$oldBgImages_obj = json_decode(json_encode($oldBgImages));
		$oldBgImages_ser = serialize($oldBgImages_obj);

		// Titles
		$titles = [
			'ru' => 'title_ru',
			'kk' => 'title_kk',
			'en' => 'title_en',
		];

		$title_arr = [];

		foreach ($titles as $k => $v) {
			$res = $request->$v;
			if (empty($res)) {
				$res = $title_arr['ru'];
			}
			$title_arr[$k] = $res;
		}

		$title_obj = json_decode(json_encode($title_arr));
		$title_ser = serialize($title_obj);

		// Descriptions
		$descs = [
			'ru' => 'desc_ru',
			'kk' => 'desc_kk',
			'en' => 'desc_en',
		];
		$desc_arr = [];
		foreach ($descs as $k => $v) {
			$res = $request->$v;
			if (empty($res)) {
				$res = $desc_arr['ru'];
			}
			$desc_arr[$k] = $res;
		}
		$desc_obj = json_decode(json_encode($desc_arr));
		$desc_ser = serialize($desc_obj);

		// Сохраняём в базу
		$studevents->titles = $title_ser;
		$studevents->descriptions = $desc_ser;
		$studevents->agree = true;
		$studevents->bg_images = $oldBgImages_ser;
		$studevents->save();

		return redirect()->route('admin.website.studevents.index')->with('alert', 'Новость успешно изменена!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$studevents = Studevents::find($id);
		$bg_images = unserialize($studevents->bg_images);
		$more_images = unserialize($studevents->more_images);
		if (!empty($bg_images)) {
			foreach ($bg_images as $bg_image) {
				File::delete(public_path('/storage/studevents/' . $bg_image));
			}
		}
		if (!empty($more_images)) {
			foreach ($more_images as $more_image) {
				File::delete(public_path('/storage/studevents/' . $more_image));
			}
		}
		$studevents->delete();
		return redirect()->back()->with('alert', 'Новость успешно удалена!');
	}
}
