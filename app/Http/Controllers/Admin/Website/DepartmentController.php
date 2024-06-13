<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\WorkerDepartmentPage;

class DepartmentController extends Controller
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
            $departments = Department::all();
            return view('admin.website.department.index', compact('departments'));
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
        return view('admin.website.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $department = Department::where('slug', $slug)->first();
        return view('admin.website.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $now = date_format(now('Asia/Almaty'), 'Ymd');
        $folder = public_path('/assets/images/department/');

        $department = Department::where('slug', $slug)->first();
        $department->name = $request->name;

        $image = $request->file('image');
        if (!empty($image)) {
            $image_name = $now . $image->getClientOriginalName();
            $bg_image = Image::make($image);
            $bg_image->save($folder . $image_name, 40);
            $department->image = '/assets/images/department/' . $image_name;
        }

        $department->sort = $request->sort;
        $department->save();

        return redirect()->route('admin.website.department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.website.department.index');
    }
}
