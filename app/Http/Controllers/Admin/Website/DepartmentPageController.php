<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentPages;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Models\WorkerDepartmentPage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class DepartmentPageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user_department = Page::userInfo()->department;
        $canCreate = false;

        if ($user_department === 'ДМР') {
            $canCreate = true;
		    $departments = Department::join('department_pages', 'departments.id', 'department_pages.department_id')
			->select(
				'department_pages.id',
				'departments.name as department_name',
				'department_pages.name',
				'department_pages.content',
				'department_pages.slug',
				'department_pages.sort',
			)
			->orderBy('departments.name', 'asc')
			->get();
        } else {
            $departments = Department::join('department_pages', 'departments.id', 'department_pages.department_id')
            ->join('worker_department_pages', 'worker_department_pages.department_page_id', 'department_pages.id')
            ->where('worker_department_pages.worker_id', Auth::user()->id)
			->select(
				'department_pages.id',
				'departments.name as department_name',
				'department_pages.name',
				'department_pages.content',
				'department_pages.slug',
				'department_pages.sort',
			)
			->orderBy('departments.name', 'asc')
			->get();
        }

		return view('admin.website.department-page.index', compact('departments','canCreate'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$departments = Department::all();
		$slugs = ['history', 'teachers', 'science', 'laboratories', 'eduProgram1', 'eduProgram2', 'eduProgram3', 'eduProgram4', 'eduProgram5', 'eduProgram6', 'eduProgram7', 'eduProgram8', 'eduProgram9', 'eduProgram10'];
		return view('admin.website.department-page.create', compact('departments', 'slugs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$name = [
			'ru' => $request->name_ru,
			'kk' => $request->name_kk,
			'en' => $request->name_en
		];
		$name = serialize($name);

		$content = [
			'ru' => $request->content_ru,
			'kk' => $request->content_kk,
			'en' => $request->content_en
		];
		$content = serialize($content);

		$now = date_format(now('Asia/Almaty'), 'Ymd');
		$folder = public_path('/assets/images/department/page/');

		$image = $request->file('image_ru');
		$image_name = $now . $image->getClientOriginalName();
		$bg_image = Image::make($image);
		$bg_image->save($folder . $image_name, 40);

		$department_page = new DepartmentPages();
		$department_page->department_id = $request->department_id;
		$department_page->name = $name;
		$department_page->content = $content;
		$department_page->image = '/assets/images/department/page/' . $image_name;
		$department_page->slug = $request->slug;
		$department_page->sort = $request->sort;
		$department_page->save();

		return redirect()->route('admin.website.department.index');
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
        $user_department = Page::userInfo()->department;
        $canCreate = false;
        if ($user_department === 'ДМР') {
            $canCreate = true;
        }

		$department_page = DepartmentPages::find($id);
		$name = unserialize($department_page->name);
		$content = unserialize($department_page->content);
		$sort = $department_page->sort;
		$department_id = $department_page->department_id;
		$slug = $department_page-> slug;
		$image = $department_page->image;
		$departments = Department::all();
		$slugs = ['history', 'teachers', 'science', 'laboratories', 'eduProgram1', 'eduProgram2', 'eduProgram3', 'eduProgram4', 'eduProgram5', 'eduProgram6', 'eduProgram7', 'eduProgram8', 'eduProgram9', 'eduProgram10'];
		return view('admin.website.department-page.edit', compact('department_page', 'departments', 'slugs', 'name', 'content', 'sort', 'department_id', 'slug', 'image', 'canCreate'));
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
		$name = [
			'ru' => $request->name_ru,
			'kk' => $request->name_kk,
			'en' => $request->name_en
		];
		$name = serialize($name);

		$content = [
			'ru' => $request->content_ru,
			'kk' => $request->content_kk,
			'en' => $request->content_en
		];
		$content = serialize($content);
		$now = date_format(now('Asia/Almaty'), 'Ymd');
		$department_page = DepartmentPages::find($id);
		$image = $request->file('image_ru');

		if(isset($image)){
			$folder = public_path('/assets/images/department/page/');
			$image_name = $now . $image->getClientOriginalName();
			$bg_image = Image::make($image);
			$bg_image->save($folder . $image_name, 40);
			$department_page->image = '/assets/images/department/page/' . $image_name;
		}
		$department_page->name = $name;
		$department_page->content = $content;
		$department_page->slug = $request->slug;
		$department_page->sort = $request->sort;
		$department_page->save();
		return redirect()->back()->with('alert', 'Изменения успешно сохранены');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$department_page = DepartmentPages::find($id);
		$department_page->delete();

		return redirect()->route('admin.website.department-page.index');
	}

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('assets/images/upload'), $fileName);

            $url = asset('assets/images/upload/' . $fileName);

            // Check if the request has CKEditorFuncNum (for 'Upload to server' button)
            if ($request->has('CKEditorFuncNum')) {
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $msg = 'Image uploaded successfully';
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg');</script>";

                // Return JavaScript response
                @header('Content-type: text/html; charset=utf-8');
                echo $response;
                return;
            }

            // Otherwise, return JSON response for clipboard uploads
            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ]);
        }
    }
}
