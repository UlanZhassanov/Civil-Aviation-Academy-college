<?php

namespace App\Http\Controllers\Admin\Vaccination;

use App\Http\Controllers\Controller;
use App\Models\Vaccination;
use Illuminate\Http\Request;

class VaccinationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data = Vaccination::select('*')->orderBy('id', 'desc')->first();
		$percentVaccination = round(($data->quantity * 100) / $data->students, 2);
		return view('vaccination.index', compact('data', 'percentVaccination'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$data = Vaccination::select('*')->orderBy('id', 'desc')->first();
		$today = now('Asia/Almaty')->format('d.m.Y');
		return view('admin.vaccination.add', compact('data', 'today'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$findCreateDate = Vaccination::whereDate('created_at', $request->date)->count();
		if ($findCreateDate !== 0) {
			return redirect()->back()->with('alert', 'Добавление возможна только 1 раз в 24 часа');
		} else {
			$data = new Vaccination;
			$data->students = $request->students;
			$data->quantity = $request->quantity;
			$data->created_at = $request->date;
			$data->updated_at = now('Asia/Almaty');
			$data->save();
			return redirect()->back();
		}
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
