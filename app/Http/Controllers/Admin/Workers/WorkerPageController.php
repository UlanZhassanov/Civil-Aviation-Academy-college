<?php

namespace App\Http\Controllers\Admin\Workers;

use App\Http\Controllers\Controller;
use App\Models\WorkerPage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_department = WorkerPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            $allUsers = WorkerPage::allUsers();
            $allPages = WorkerPage::allPages();
            $list = WorkerPage::list();
            return view('admin.workerpage.index', compact('list', 'allUsers', 'allPages', 'user_department'));
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
        $user_department = WorkerPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            $data = new WorkerPage;
            $data->worker_id = $request->user_id;
            $data->page_id = $request->page_id;
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
     * @param  \App\Models\WorkerPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerPage $navigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerPage $navigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkerPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerPage  $navigation
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerPage $workerpage)
    {
        $user_department = WorkerPage::userInfo()->department;
        if ($user_department === 'ДМР') {
            WorkerPage::where('id', $workerpage->id)->delete();
            return redirect()->back();
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }
}
