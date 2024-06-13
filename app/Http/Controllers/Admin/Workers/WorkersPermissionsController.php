<?php

namespace App\Http\Controllers\Admin\Workers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkersInfo;
use App\Models\WorkersPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkersPermissionsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::join('workers_infos', 'users.id', 'workers_infos.user_id')
			->leftJoin('workers_permissions', 'users.id', 'workers_permissions.user_id')
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
				'workers_permissions.permission',
			)
			->where('workers_infos.working', true)
			->get();
		return view('admin.workers-permissions.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$users = WorkersInfo::leftJoin('workers_permissions', 'workers_infos.user_id', 'workers_permissions.user_id')
			->where('workers_permissions.permission', NULL)
			->select(
				'workers_infos.user_id',
				'workers_infos.surname',
				'workers_infos.name',
				'workers_infos.patronymic',
			)
			->get();
		return view('admin.workers-permissions.create', compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// Определяем пользователя, кому назначаются "доступы"
		$user_id = $request->user_id;

		// Доступ к страницам
		$permissions_keys = [
			'enrollees',
			'graduates',
			'vaccination',
			'news',
			'studevents',
			'books',
			'events',
			'navigation',
			'pages',
			'workers',
			'department'
		];

		foreach ($permissions_keys as $key => $value) {
			// Переменные, из-за невозможности прямого вызова
			$createValue = $value . '_create';
			$readValue = $value . '_read';
			$updateValue = $value . '_update';
			$deleteValue = $value . '_delete';

			$newArray[$value] = array(
				'create' => intval($request->$createValue),
				'read' => intval($request->$readValue),
				'update' => intval($request->$updateValue),
				'delete' => intval($request->$deleteValue)
			);
		}

		// Преобразуем в JSON строку и сериализуем для хранения в базе
		$obj = json_decode(json_encode($newArray));
		$obj = serialize($obj);

		$data = new WorkersPermission();
		$data->user_id = $user_id;
		$data->permission = $obj;
		$data->save();

		return redirect()->route('admin.workers-permissions.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$data = [
			'Абитуриенты' => 'enrollees',
			'Выпускники' => 'graduates',
			'Вакцинация' => 'vaccination',
			'Новости' => 'news',
			'Мероприятия (E-orientation)' => 'studevents',
			'Книги' => 'books',
			'События' => 'events',
			'Навигация' => 'navigation',
			'Страницы' => 'pages',
			'Работники' => 'workers',
			'Кафедры' => 'department'
		];

		$user = User::join('workers_infos', 'users.id', 'workers_infos.user_id')
			->join('workers_permissions', 'users.id', 'workers_permissions.user_id')
			->select(
				'users.id',
				'workers_infos.surname',
				'workers_infos.name',
				'workers_infos.patronymic',
				'workers_permissions.permission',
			)
			->where('id', $id)
			->first();
		$permissions = unserialize($user->permission);
		return view('admin.workers-permissions.show', compact('user', 'data', 'permissions'));
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
		// Доступ к страницам
		$permissions_keys = [
			'enrollees',
			'graduates',
			'vaccination',
			'news',
			'studevents',
			'books',
			'events',
			'navigation',
			'pages',
			'workers',
			'department'
		];

		foreach ($permissions_keys as $key => $value) {
			// Переменные, из-за невозможности прямого вызова
			$createValue = $value . '_create';
			$readValue = $value . '_read';
			$updateValue = $value . '_update';
			$deleteValue = $value . '_delete';

			$newArray[$value] = array(
				'create' => intval($request->$createValue),
				'read' => intval($request->$readValue),
				'update' => intval($request->$updateValue),
				'delete' => intval($request->$deleteValue)
			);
		}

		// Преобразуем в JSON строку и сериализуем для хранения в базе
		$obj = json_decode(json_encode($newArray));
		$obj = serialize($obj);

		// Сохраняем изменения
		$user = WorkersPermission::where('user_id', $id)->first();
		$user->permission = $obj;
		$user->save();

		return redirect()->route('admin.workers-permissions.index')->with('alert', 'Доступ изменен');
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
