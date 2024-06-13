<?php

namespace App\Http\Controllers\Admin\Workers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkersInfo;
use App\Models\WorkersPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::join('workers_infos', 'users.id', 'workers_infos.user_id')
			->select(
				'users.id',
				'users.iin',
				'workers_infos.department',
				'workers_infos.position',
				'workers_infos.surname',
				'workers_infos.name',
				'workers_infos.patronymic',
				'workers_infos.phone',
				'workers_infos.email',
				'workers_infos.working',
			)
			->where('workers_infos.working', true)
			->get();
		return view('admin.workers.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.workers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'iin' => 'min:12|max:12',
			'password' => 'min:8',
		]);

		$user = User::create([
			'iin' => $request->iin,
			'password' => Hash::make($request['password'])
		]);

		$workers_info = new WorkersInfo();
		$workers_info->user_id = $user->id;
		$workers_info->department = $request->department;
		$workers_info->position = $request->position;
		$workers_info->surname = $request->surname;
		$workers_info->name = $request->name;
		$workers_info->patronymic = $request->patronymic;
		$workers_info->email = $request->email;
		$workers_info->phone = $request->phone;
		$workers_info->working = true;
		$workers_info->save();

		return redirect()->back()->with('alert', 'Новый работник успешно добавлен');
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
		$user = WorkersInfo::find($id);

		$user->department = $request->department;
		$user->position = $request->position;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->working = $request->working;
		if ($request->password) {
			$users = User::where('iin', $request->iin)->first();
			$users->password = Hash::make($request->password);
			$users->save();
		}
		$user->save();
		return redirect()->back()->with('alert', 'Данные изменены');
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
