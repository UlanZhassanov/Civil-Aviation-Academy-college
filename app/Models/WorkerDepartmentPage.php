<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkerDepartmentPage extends Model
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
        $allUsers = WorkersInfo::orderBy('surname', 'asc')->orderBy('name', 'asc')->get();

        return $allUsers;
    }

    public static function allPages()
    {
        $allPages = DB::table('department_pages')
        ->join('departments', 'department_pages.department_id', '=', 'departments.id')
        ->select(
            'department_pages.*',
            'department_pages.name as department_page_name',
            'departments.name as department_name'
        )
        ->orderBy('departments.name', 'asc')->get();

        return $allPages;
    }

    public static function list()
    {
        $allWorkerPages = DB::table('worker_department_pages')
            ->join('workers_infos', 'workers_infos.user_id', '=', 'worker_department_pages.worker_id')
            ->join('department_pages', 'department_pages.id', '=', 'worker_department_pages.department_page_id')
            ->join('departments', 'department_pages.department_id', '=', 'departments.id')
            ->select(
                'worker_department_pages.*',
                'workers_infos.surname as surname',
                'workers_infos.name as name',
                'workers_infos.patronymic as patronymic',
                'department_pages.slug as slug',
                'department_pages.name as department_page_name',
                'departments.name as department_name'
            )
            ->orderBy('surname', 'asc')
            ->orderBy('name', 'asc')
            ->get();

        return $allWorkerPages;
    }
}
