<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
   public function store(Request $request)
	{
		if($request->hasFile('upload')){
			$originName = $request->file('upload')->getClientOriginalName();
			$fileName = pathinfo($originName, PATHINFO_FILENAME);
			$extension = $request->file('upload')->getClientOriginalExtension();
			$fileName = $fileName. '_' . time(). '.' .$extension;

			$request->file('upload')->move(public_path('images'), $fileName);

			$CKEditorFuncNum = $request->input('CKEditorFuncNum');
			$url = asset('public/images/'. $fileName);
			$msg = 'Image uploaded successfully';
			$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>"

			@header('Content-type: text/html; charset=utf-8');
			echo $response;
		}

		/* $page = new Page();
		$page->id = 1;
		$page->exists = true;
		$image = $page->addMediaFromRequest('upload')->toMediaCollection('images');

		return response()->json([
			'url' => $image->getUrl()
		]); */

	}
}
