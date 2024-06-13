<?php

namespace App\Http\Controllers\Front\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentPages;
use App\Models\DepartmentTeacher;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class DepartmentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$tree = Navigation::tree();
		$departments = Department::orderBy('sort', 'asc')->get();
		return view('front.departments.index', compact('tree', 'departments'));
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
		$tree = Navigation::tree();
		$department = Department::where('slug', $slug)->first();
		$eduP = DepartmentPages::where('slug','LIKE','%eduProgram%')->first();
		$department_id = $department->id;

		$pages = DepartmentPages::where('department_id', $department_id)->orderBy('department_id', 'asc')->orderBy('sort', 'asc')->get();
		$data = Department::where('slug', $slug)->get();
		return view('front.departments.show', compact('department', 'data', 'tree', 'pages', 'eduP'));
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
		//
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



	public function teachers($slug)
	{
		$tree = Navigation::tree();
		$department = Department::where('slug', $slug)->first();
		$data = Department::where('slug', $slug)->get();
		$teachers = DepartmentTeacher::where('department_id', $department->id)->get();
		return view('front.departments.teachers.index', compact('department', 'data', 'tree', 'teachers'));
	}

	public function teacher($department, $teacher)
	{
		$tree = Navigation::tree();
		$department = Department::where('slug', $department)->first();
		$teacher = DepartmentTeacher::where('slug', $teacher)->first();
		return view('front.departments.teachers.show', compact('tree', 'department', 'teacher'));
	}

	public function history($department, $slug)
	{
		$tree = Navigation::tree();
		$department = Department::where('slug', $department)->first();
		$department_id = $department->id;
		$department_page = DepartmentPages::where('department_id', $department_id)->where('slug', $slug)->first();
		$name = unserialize($department_page->name);
		$content = unserialize($department_page->content);

		return view('front.departments.history.index', compact('tree', 'department', 'name', 'content'));
	}
}
