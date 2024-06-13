<?php

namespace App\Http\Controllers\Front\Enrollee;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationsMail;
use App\Models\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DoctoralController extends Controller
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
		return view('front.enrollee.doctoral', compact('tree'))->with(compact('nationality_list', 'nationality_list'));
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
		$countKT = $request->tgo_magister + $request->prof_sub_magister_1 + $request->prof_sub_magister_2 + $request->eng_magister;
		DB::table('applications')
			->updateOrInsert(
				['surname' => $request->surname, 'name' => $request->name, 'case_number' => NULL ],
				[
					'type' => $request->type,
                    'lang_edu' => $request->language,
					'tgo_magister' => $request->tgo_magister,
					'prof_sub_magister_1' => $request->prof_sub_magister_1,
					'prof_sub_magister_2' => $request->prof_sub_magister_2,
					'eng_magister' => $request->eng_magister,
					'countKT' => $countKT,
					'citizen' => $request->citizen,
					'iin' => $request->iin,
					'region' => $request->region,
					'countries' => $request->countries,
					'programms' => $request->programms,
					'patronymic' => $request->patronymic,
					'birthdate' => $request->birthdate,
					'gender' => $request->gender,
                    'nationality_id' => $request->nationality,
					'phone_1' => $request->phone_1,
					'phone_2' => $request->phone_2,
					'email' => $request->email,
					'process' => NULL,
					'status' => 0,
					'created_at' => \Carbon\Carbon::now('Asia/Almaty'),
					'updated_at' => \Carbon\Carbon::now('Asia/Almaty'),
				]
			);
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
