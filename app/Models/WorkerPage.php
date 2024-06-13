<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkerPage extends Model
{
	use HasFactory;
	protected $primaryKey = 'id';


	public static function userInfo()
	{
		$userInfo = WorkersInfo::select('department')
			->where('user_id', Auth::user()->id)
			->first();

		return $userInfo;
	}

    public static function allUsers()
	{
		$allUsers = WorkersInfo::orderBy('surname', 'asc')
        ->where('working', true)
        ->orderBy('name', 'asc')->get();

		return $allUsers;
	}

    public static function allPages()
	{
		$allPages = Page::orderBy('slug', 'asc')->get();

		return $allPages;
	}

	public static function list()
	{
        $allWorkerPages = DB::table('worker_pages')
            ->join('workers_infos', 'workers_infos.user_id', '=', 'worker_pages.worker_id')
            ->join('pages', 'pages.id', '=', 'worker_pages.page_id')
            ->select('worker_pages.*', 'workers_infos.surname as surname', 'workers_infos.name as name', 'workers_infos.patronymic as patronymic', 'pages.slug as slug')
            ->orderBy('surname', 'asc')
            ->orderBy('name', 'asc')
            ->orderBy('slug', 'asc')
            ->get();

		return $allWorkerPages;
	}

}
