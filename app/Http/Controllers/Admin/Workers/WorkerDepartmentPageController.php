<?php

namespace App\Http\Controllers\Admin\Workers;

use App\Http\Controllers\Controller;
use App\Models\WorkerDepartmentPage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerDepartmentPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_department = WorkerDepartmentPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            $allUsers = WorkerDepartmentPage::allUsers();
            $allPages = WorkerDepartmentPage::allPages();
            $list = WorkerDepartmentPage::list();
            return view('admin.worker_department_page.index', compact('list', 'allUsers', 'allPages', 'user_department'));
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
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
        $user_department = WorkerDepartmentPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            $data = new WorkerDepartmentPage;
            $data->worker_id = $request->user_id;
            $data->department_page_id = $request->department_page_id;
            $data->added_by_userid = Auth::user()->id;
            $data->save();
            return redirect()->back()->with('alert', 'Успешное добавление');
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkerDepartmentPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerDepartmentPage $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerDepartmentPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerDepartmentPage $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkerDepartmentPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerDepartmentPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerDepartmentPage $worker_department_page)
    {
        $user_department = WorkerDepartmentPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            WorkerDepartmentPage::where('id', $worker_department_page->id)->delete();
            return redirect()->back();
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }
}
