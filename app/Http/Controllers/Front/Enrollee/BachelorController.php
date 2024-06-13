<?php

namespace App\Http\Controllers\Front\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationsMail;

class BachelorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$tree = Navigation::tree();
        $nationality_list = DB::table('nationalities')
        ->get();
		return view('front.enrollee.bachelor', compact('tree'))->with(compact('nationality_list', 'nationality_list'));
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
		$countENT = $request->mathLit + $request->readLit + $request->historyKZ + $request->math + $request->aviaSec + $request->natureSec + $request->geography + $request->physics;
		if ($request->hasFile('vlekImage') && $request->hasFile('psychoImage') && $request->hasFile('ieltsImage')) {
			$request->validate([
				'images' => 'vlekImage|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'images' => 'psychoImage|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'images' => 'ieltsImage|mimes:jpeg,png,jpg,gif,pdf|max:2048'
			]);
			$image_vlek = $request->file('vlekImage');
			$image_name_vlek = $image_vlek->getClientOriginalName();
			$destinationPathVlek = public_path('/storage/applications/vlek/' . $request->surname . ' ' . $request->name);
			$image_vlek->move($destinationPathVlek, $image_name_vlek);

			$image_psycho = $request->file('psychoImage');
			$image_name_psycho = $image_psycho->getClientOriginalName();
			$destinationPathPsycho = public_path('/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name);
			$image_psycho->move($destinationPathPsycho, $image_name_psycho);

			$image_ielts = $request->file('ieltsImage');
			$image_name_ielts = $image_ielts->getClientOriginalName();
			$destinationPathIelts = public_path('/storage/applications/ielts/' . $request->surname . ' ' . $request->name);
			$image_ielts->move($destinationPathIelts, $image_name_ielts);


			DB::table('applications')
				->updateOrInsert(
					['surname' => $request->surname, 'name' => $request->name, 'case_number' => NULL ],
					[
						'base' => $request->base,
						'type' => $request->type,
						'lang_edu' => $request->language,
						'citizen' => $request->citizen,
						'haveENT' => $request->haveENT,
						'countENT' => $countENT,
						'quantENT' => $request->quantENT,
						'mathLit' => $request->mathLit,
						'readLit' => $request->readLit,
						'historyKZ' => $request->historyKZ,
						'iin' => $request->iin,
						'birthdate' => $request->birthdate,
						'gender' => $request->gender,
						'nationality_id' => $request->nationality,
						'math' => $request->math,
						'profSub' => $request->profSub,
						'aviaSec' => $request->aviaSec,
						'natureSec' => $request->natureSec,
						'geography' => $request->geography,
						'physics' => $request->physics,
						'haveVLEK' => $request->haveVLEK,
						'imgVLEK' => '/storage/applications/vlek/' . $request->surname . ' ' . $request->name . '/' . $image_name_vlek,
						'imgPSYCHO' => '/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name . '/' . $image_name_psycho,
						'haveIELTS' => $request->haveIELTS,
						'imgIELTS' => '/storage/applications/ielts/' . $request->surname . ' ' . $request->name . '/' . $image_name_ielts,
						'region' => $request->region,
						'countries' => $request->countries,
						'programms' => $request->programms,
						'patronymic' => $request->patronymic,
						'phone_1' => $request->phone_1,
						'phone_2' => $request->phone_2,
						'email' => $request->email,
						'process' => NULL,
						'status' => 0,
						'created_at' => \Carbon\Carbon::now('Asia/Almaty'),
						'updated_at' => \Carbon\Carbon::now('Asia/Almaty'),
					]
				);
		} elseif ($request->hasFile('vlekImage')) {
			$request->validate([
				'images' => 'vlekImage|mimes:jpeg,png,jpg,gif,pdf|max:2048',
				'images' => 'psychoImage|mimes:jpeg,png,jpg,gif,pdf|max:2048'
			]);
			$image_vlek = $request->file('vlekImage');
			$image_name_vlek = $image_vlek->getClientOriginalName();
			$destinationPathVlek = public_path('/storage/applications/vlek/' . $request->surname . ' ' . $request->name);
			$image_vlek->move($destinationPathVlek, $image_name_vlek);

			$image_psycho = $request->file('psychoImage');
			$image_name_psycho = $image_psycho->getClientOriginalName();
			$destinationPathPsycho = public_path('/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name);
			$image_psycho->move($destinationPathPsycho, $image_name_psycho);

			DB::table('applications')
				->updateOrInsert(
					['surname' => $request->surname, 'name' => $request->name, 'case_number' => NULL ],
					[
						'base' => $request->base,
						'type' => $request->type,
						'citizen' => $request->citizen,
						'lang_edu' => $request->language,
						'haveENT' => $request->haveENT,
						'countENT' => $countENT,
						'quantENT' => $request->quantENT,
						'mathLit' => $request->mathLit,
						'readLit' => $request->readLit,
						'historyKZ' => $request->historyKZ,
						'iin' => $request->iin,
						'birthdate' => $request->birthdate,
						'gender' => $request->gender,
						'nationality_id' => $request->nationality,
						'math' => $request->math,
						'profSub' => $request->profSub,
						'aviaSec' => $request->aviaSec,
						'natureSec' => $request->natureSec,
						'geography' => $request->geography,
						'physics' => $request->physics,
						'haveVLEK' => $request->haveVLEK,
						'imgVLEK' => '/storage/applications/vlek/' . $request->surname . ' ' . $request->name . '/' . $image_name_vlek,
						'imgPSYCHO' => '/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name . '/' . $image_name_psycho,
						'haveIELTS' => $request->haveIELTS,
						'imgIELTS' => NULL,
						'region' => $request->region,
						'countries' => $request->countries,
						'programms' => $request->programms,
						'patronymic' => $request->patronymic,
						'phone_1' => $request->phone_1,
						'phone_2' => $request->phone_2,
						'email' => $request->email,
						'process' => NULL,
						'status' => 0,
						'created_at' => \Carbon\Carbon::now('Asia/Almaty'),
						'updated_at' => \Carbon\Carbon::now('Asia/Almaty'),
					]
				);
		} elseif ($request->hasFile('ieltsImage')) {
			$request->validate([
				'images' => 'ieltsImage|mimes:jpeg,png,jpg,gif,pdf|max:2048'
			]);
			$image_ielts = $request->file('ieltsImage');
			$image_name_ielts = $image_ielts->getClientOriginalName();
			$destinationPathIelts = public_path('/storage/applications/ielts/' . $request->surname . ' ' . $request->name);
			$image_ielts->move($destinationPathIelts, $image_name_ielts);
			DB::table('applications')
				->updateOrInsert(
					['surname' => $request->surname, 'name' => $request->name, 'case_number' => NULL ],
					[
						'base' => $request->base,
						'type' => $request->type,
						'citizen' => $request->citizen,
						'lang_edu' => $request->language,
						'haveENT' => $request->haveENT,
						'countENT' => $countENT,
						'quantENT' => $request->quantENT,
						'mathLit' => $request->mathLit,
						'readLit' => $request->readLit,
						'historyKZ' => $request->historyKZ,
						'iin' => $request->iin,
						'birthdate' => $request->birthdate,
						'gender' => $request->gender,
						'nationality_id' => $request->nationality,
						'math' => $request->math,
						'profSub' => $request->profSub,
						'aviaSec' => $request->aviaSec,
						'natureSec' => $request->natureSec,
						'geography' => $request->geography,
						'physics' => $request->physics,
						'haveVLEK' => $request->haveVLEK,
						'imgVLEK' => NULL,
						'imgPSYCHO' => NULL,
						'haveIELTS' => $request->haveIELTS,
						'imgIELTS' => '/storage/applications/ielts/' . $request->surname . ' ' . $request->name . '/' . $image_name_ielts,
						'region' => $request->region,
						'countries' => $request->countries,
						'programms' => $request->programms,
						'patronymic' => $request->patronymic,
						'phone_1' => $request->phone_1,
						'phone_2' => $request->phone_2,
						'email' => $request->email,
						'process' => NULL,
						'status' => 0,
						'created_at' => \Carbon\Carbon::now('Asia/Almaty'),
						'updated_at' => \Carbon\Carbon::now('Asia/Almaty'),
					]
				);
		} else {
			DB::table('applications')
				->updateOrInsert(
					['surname' => $request->surname, 'name' => $request->name, 'case_number' => NULL ],
					[
						'base' => $request->base,
						'type' => $request->type,
						'citizen' => $request->citizen,
						'lang_edu' => $request->language,
						'haveENT' => $request->haveENT,
						'countENT' => $countENT,
						'quantENT' => $request->quantENT,
						'mathLit' => $request->mathLit,
						'readLit' => $request->readLit,
						'historyKZ' => $request->historyKZ,
						'iin' => $request->iin,
						'birthdate' => $request->birthdate,
						'gender' => $request->gender,
						'nationality_id' => $request->nationality,
						'math' => $request->math,
						'profSub' => $request->profSub,
						'aviaSec' => $request->aviaSec,
						'natureSec' => $request->natureSec,
						'geography' => $request->geography,
						'physics' => $request->physics,
						'haveVLEK' => $request->haveVLEK,
						'imgVLEK' => NULL,
						'imgPSYCHO' => NULL,
						'haveIELTS' => $request->haveIELTS,
						'imgIELTS' => NULL,
						'region' => $request->region,
						'countries' => $request->countries,
						'programms' => $request->programms,
						'patronymic' => $request->patronymic,
						'phone_1' => $request->phone_1,
						'phone_2' => $request->phone_2,
						'email' => $request->email,
						'process' => NULL,
						'status' => 0,
						'created_at' => \Carbon\Carbon::now('Asia/Almaty'),
						'updated_at' => \Carbon\Carbon::now('Asia/Almaty'),
					]
				);
		}
		// Mail::to('of.mok.aga@mail.ru')->send(new ApplicationsMail());
		return redirect()->back()->with('alert', 'Ваша анкета успешно отправлена!');
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
}
