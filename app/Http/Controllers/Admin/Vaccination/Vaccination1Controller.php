<?php

namespace App\Http\Controllers\Vaccination;

use App\Http\Controllers\Controller;
use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class VaccinationController extends Controller
{
	protected function index()
	{
		$data = Vaccination::select('*')->orderBy('id', 'desc')->first();
		$percentVaccination = round(($data->quantity * 100) / $data->students, 2);
		return view('vaccination.index', compact('data', 'percentVaccination'));
	}
	protected function add()
	{
		$data = Vaccination::select('*')->orderBy('id', 'desc')->first();
		return view('admin.vaccination.add', compact('data'));
	}

	protected function update()
	{
		$findCreateDate = Vaccination::whereDate('created_at', request()->date)->count();
		if ($findCreateDate !== 0) {
			return redirect()->back()->with('alert', 'Добавление возможна только 1 раз в 24 часа');
		} else {
			$data = new Vaccination;
			$data->students = request()->students;
			$data->quantity = request()->quantity;
			$data->created_at = request()->date;
			$data->updated_at = \Carbon\Carbon::now('Asia/Almaty');
			$data->save();
			return redirect()->back();
		}
	}
}
