<?php

namespace App\Http\Controllers\Admin\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$years = $request->years;
		$created_at_from = $request->created_at_from;
		$created_at_to = $request->created_at_to;

		// Filter
		$whereArray = [
			'type' => 'Магистратура',
			'status' => 0,
			'citizen' => $request->citizen,
			'programms' => $request->programms,
			'region' => $request->region,
			'process' => $request->process,
			'surname' => $request->surname
		];
		$whereArray = array_filter($whereArray, 'strlen');
		if (!isset($created_at_from) || !isset($created_at_to)) {
			$data = DB::table('applications')
            ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
            ->join('nationalities','applications.nationality_id','=','nationalities.id')
		//	->whereDate('created_at', '>=', $created_at_from)
		//	->whereDate('created_at', '<=', $created_at_to)
			->where($whereArray)
			->orderBy('created_at', 'desc')
			->paginate(100)
			->appends($whereArray);
		$countData = DB::table('applications')
        ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
        ->join('nationalities','applications.nationality_id','=','nationalities.id')
		//	->whereDate('created_at', '>=', $created_at_from)
		//	->whereDate('created_at', '<=', $created_at_to)
			->where($whereArray)
			->count();
		}else {
			$data = DB::table('applications')
            ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
            ->join('nationalities','applications.nationality_id','=','nationalities.id')
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->where($whereArray)
			->orderBy('created_at', 'desc')
			->paginate(100)
			->appends($whereArray);
		$countData = DB::table('applications')
        ->join('nationalities','applications.nationality_id','=','nationalities.id')
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->where($whereArray)
			->count();
		}
		//Sort
		// if (isset($request->sort)) {
		// 	$data = $data->sortBy($request->sort);
		// 	$data->values()->all();
		// }
		// Data
		$dataArr = [
			'data' => $data,
			'citizen' => $request->citizen,
			'programms' => $request->programms,
			'region' => $request->region,
			'years' => $request->years,
			'created_at_from' => $request->created_at_from,
            'created_at_to' => $request->created_at_to,
			'process' => $request->process,
			'sort' => $request->sort,
			'countData' => $countData
		];
		return view('admin.enrollee.master', $dataArr);
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
		$data = Applications::find($id);
		$data->status = 1;
		$data->updated_at = \Carbon\Carbon::now('Asia/Almaty');
		$data->save();
		return redirect()->back();
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
		if (Auth::user()->role === '999') {
			return redirect()->back()->with('alert', 'У вас не прав на это действие');
		} else {
			$data = Applications::find($request->id);
			if ($data->process === 'Сдал документы' && $request->process === 'Отказ') {
				$data->process = 'Отказ';
				$data->case_number = NULL;
				$data->save();
				return redirect()->back()->with('alert', 'Процесс изменен и удалён № дела');
			} elseif ($request->process === 'Сдал документы' && $data->case_number === NULL) {
				$data->process = $request->process;
				$findLastCaseNumber = DB::table('applications')
                    ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
                    ->where(function($query) {
                        $query->where('created_at', '>=', "2022-09-01 00:00:00")
                        ->where('type','Бакалавриат');
                        })
                    ->orWhere(function($query) {
                        $query->where('created_at', '>=', "2023-02-01 00:00:00")
                        ->where(function($query) {
                            $query->where('type','Магистратура')
                                        ->orWhere('type','Докторантура');
                            });
                        })
                    ->orderBy('case_number', 'desc')->pluck('case_number')->first();
				$data->case_number = $findLastCaseNumber + 1;
				$data->save();
				return redirect()->back()->with('alert', 'Номер дела - ' . $data->case_number);
			} else {
				$data->iin = $request->iin;
                $data->surname = $request->surname;
                $data->name = $request->name;
                $data->patronymic = $request->patronymic;
				$data->programms = $request->programms;
				$data->lang_edu = $request->lang_edu;
				$data->phone_1 = $request->phone_1;
				$data->phone_2 = $request->phone_2;
				$data->process = $request->process;
				$data->save();
				return redirect()->back()->with('alert', 'Корректировка выполнена!');
			}
		}
	}

	public function toDeleted(Request $request)
	{
		$data = Applications::find($request->id);
		$data->status = 1;
		$data->updated_at = \Carbon\Carbon::now('Asia/Almaty');
		$data->save();
		return redirect()->back();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		/* if (Auth::user()->role === '999') {
			return redirect()->back()->with('alert', 'У вас не прав на это действие');
		} else {
			$data = Applications::find($request->id);
			$data->status = 1;
			$data->updated_at = \Carbon\Carbon::now('Asia/Almaty');
			$data->save();
			return redirect()->back();
		} */
	}
}
