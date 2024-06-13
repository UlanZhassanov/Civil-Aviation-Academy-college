<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use App\Models\LibraryPage;
use App\Models\WorkerPage;
use App\Models\User;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_department = LibraryPage::userInfo()->department;
        $canCreate = false;
        if ($user_department === 'ДМР') {
            $data = LibraryPage::select('*')->where('user_id', '>', 0)
                ->orderBy('library_pages.id', 'desc')->get();
            $canCreate = true;
        } else {
            $data = DB::table('library_pages')
                ->select('library_pages.*')
                ->join('worker_pages', 'library_pages.id', '=', 'worker_pages.page_id')
                ->where('worker_pages.worker_id', Auth::user()->id)
                ->orderBy('library_pages.id', 'desc')
                ->get();
        }

        return view('admin.website.library_pages.index', compact('data', 'canCreate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.website.library_pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $worker_permission = User::find(Auth::user()->id)->workersPermissions;
        $worker_permission = unserialize($worker_permission->permission);
        if (isset($worker_permission->books->create) && $worker_permission->books->create == true) {
            $data = new LibraryPage;
            $lastID = LibraryPage::orderBy('id', 'desc')->pluck('id')->first();
            $lastID = $lastID + 1;
            $slug = SlugService::createSlug(LibraryPage::class, 'slug', $request->title_ru . '_' . $lastID);
            $data->title_ru = $request->title_ru;
            $data->title_kk = $request->title_kk;
            $data->title_en = $request->title_en;
            $data->desc_ru = $request->desc_ru;
            $data->desc_kk = $request->desc_kk;
            $data->desc_en = $request->desc_en;
            $data->slug = $slug;
            $data->user_id = Auth::user()->id;
            $data->save();

            $dataWorkerPages = new WorkerPage;
            $wplastID = LibraryPage::orderBy('id', 'desc')->pluck('id')->first();
            $dataWorkerPages->worker_id = Auth::user()->id;
            $dataWorkerPages->page_id = $wplastID;
            $dataWorkerPages->save();

            return redirect()->route('admin.website.library_pages.index')->with('alert', 'Страница успешно добавлена');
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('assets/images/upload'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/images/upload/' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LibraryPage  $libraryPage
     * @return \Illuminate\Http\Response
     */
    public function show($libraryPage)
    {
        $tree = Navigation::tree();
        $data = LibraryPage::where('slug', $libraryPage)->first();
        return view('libraryPage', compact('tree', 'data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LibraryPage  $libraryPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LibraryPage::find($id);
        return view('admin.website.library_pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LibraryPage  $libraryPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $worker_permission = User::find(Auth::user()->id)->workersPermissions;
        $worker_permission = unserialize($worker_permission->permission);
        if (isset($worker_permission->books->update) && $worker_permission->books->update == true) {
            $data = LibraryPage::find($id);
            $data->title_ru = $request->title_ru;
            $data->title_kk = $request->title_kk;
            $data->title_en = $request->title_en;
            $data->desc_ru = $request->desc_ru;
            $data->desc_kk = $request->desc_kk;
            $data->desc_en = $request->desc_en;
            $data->user_id = Auth::user()->id;
            $data->save();
            return redirect()->back()->with('alert', 'Изменения успешно сохранены');
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LibraryPage  $libraryPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker_permission = User::find(Auth::user()->id)->workersPermissions;
        $worker_permission = unserialize($worker_permission->permission);
        if (isset($worker_permission->books->delete) && $worker_permission->books->delete == true) {
            $data = LibraryPage::find($id);
            $data->delete();
            return redirect()->back()->with('alert', 'Страница удалена');
        } else {
            return abort('403', 'У вас нет доступа на это действие');
        }
    }
}
