<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$userDepartment = User::find(Auth::user()->id)->workersInfo->department;
		$events = Event::where('department', $userDepartment)->get();
		return view('admin.website.events.index', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.website.events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$now = date_format(now('Asia/Almaty'), 'Ymd');
		$folder = public_path('/storage/news/');
		$user = User::find(Auth::user()->id)->workersInfo;
		$event_id = Event::orderBy('id', 'desc')->first();
		if (empty($event_id)) {
			$event_id = 1;
		} else {
			$event_id = Event::orderBy('id', 'desc')->pluck('id')->first();
		}
		$data = new Event();

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
		$data->user_id = $user->user_id;
		$data->slug = $event_id + 1;
		$data->titles = $title_ser;
		$data->descriptions = $desc_ser;
		$data->agree = true;
		$data->department = $user->department;

		$data->publish_at = $request->publish_at;
		$data->save();

		return redirect()->route('admin.website.events.index')->with('alert', 'Событие успешно создано!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function show(Event $event)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$event = Event::find($id);
		return view('admin.website.events.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// Get department name 
		$event = Event::find($id);

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
		$event->titles = $title_ser;
		$event->descriptions = $desc_ser;
		$event->agree = true;
		$event->save();

		return redirect()->route('admin.website.events.index')->with('alert', 'Событие успешно изменено!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Event  $event
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$events = Event::find($id);
		$events->delete();
		return redirect()->back()->with('alert', 'Событие успешно удалено!');
	}
}
