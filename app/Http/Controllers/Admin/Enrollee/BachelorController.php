<?php

namespace App\Http\Controllers\Admin\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BachelorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$years = $request->years;
		// Filter
		$whereArray = [
			'type' => 'Бакалавриат',
			'status' => '0',
			'base' => $request->base,
			'haveENT' => $request->haveENT,
			'haveVLEK' => $request->haveVLEK,
			'haveIELTS' => $request->haveIELTS,
			'citizen' => $request->citizen,
			'programms' => $request->programms,
			'region' => $request->region,
			'process' => $request->process,
			'created_at' => $request->created_at,
			'surname' => $request->surname
		];
		$whereArray = array_filter($whereArray, 'strlen');
		$countENT = $request->countENT;
		$created_at_from = $request->created_at_from;
        $created_at_to = $request->created_at_to;
		$sort = $request->sort;
		if (isset($countENT)) {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'));
                }
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'));
                }
            }
            elseif(isset($created_at_to) && !isset($created_at_from)){
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'));
                }
            }
            else {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'));
                }
            }
        } elseif ($sort === 'countENT') {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy($sort, 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'desc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
            else {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'desc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_from',$created_at_from,)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
        } elseif ($sort === 'surname') {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_to',$created_at_to,)
                    ->appends(compact('sort'));
            } else {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'asc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_from',$created_at_from,)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
        } else {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray);
            }
            elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,);
            }
            elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_to',$created_at_to,);
            }
            elseif (isset($created_at_to) && isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends('created_at_to',$created_at_to,);
            }
        }


        // Count
        if (isset($countENT)) {
            if(isset($created_at_from) && isset($created_at_to)){
                $countData =DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->count();
            } elseif (!isset($created_at_from) && isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } else {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->count();
            }
        } else {
            if(isset($created_at_from) && isset($created_at_to)){
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->count();
            } elseif (!isset($created_at_from) && isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } else {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->count();
            }
        }
		// Data
		$dataArr = [
			'data' => $data,
			'base' => $request->base,
			'haveENT' => $request->haveENT,
			'haveVLEK' => $request->haveVLEK,
			'haveIELTS' => $request->haveIELTS,
			'citizen' => $request->citizen,
			'programms' => $request->programms,
			'region' => $request->region,
			'years' => $request->years,
			'created_at_from' => $request->created_at_from,
            'created_at_to' => $request->created_at_to,
			'process' => $request->process,
			'countENT' => $request->countENT,
			'sort' => $request->sort,
			'countData' => $countData
		];
		return view('admin.enrollee.bachelor', $dataArr);
	}


    public function pdf(Request $request)
    {

        $today = now('Asia/Almaty');
		$years = $request->years;
		// Filter
		$whereArray = [
			'type' => 'Бакалавриат',
			'status' => '0',
			'base' => $request->base,
			'haveENT' => $request->haveENT,
			'haveVLEK' => $request->haveVLEK,
			'haveIELTS' => $request->haveIELTS,
			'citizen' => $request->citizen,
			'programms' => $request->programms,
			'region' => $request->region,
			'process' => $request->process,
			'created_at' => $request->created_at,
			'surname' => $request->surname
		];
		$whereArray = array_filter($whereArray, 'strlen');
		$countENT = $request->countENT;
		$created_at_from = $request->created_at_from;
        $created_at_to = $request->created_at_to;
		$sort = $request->sort;
        if (isset($countENT)) {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends(compact('countENT'));
                }
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends(compact('countENT'));
                }
            }
            elseif(isset($created_at_to) && !isset($created_at_from)){
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'));
                }
            }
            else {
                if ($sort === 'countENT') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } elseif ($sort === 'surname') {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy($sort, 'asc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'))
                        ->appends(compact('sort'));
                } else {
                    $data = DB::table('applications')
                    ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                    ->join('nationalities','applications.nationality_id','=','nationalities.id')
                        ->where($whereArray)
                        ->where('countENT', '>=', $countENT)
                        ->where('created_at', '>=', "$created_at_from 00:00:00")
                        ->where('created_at', '<=', "$created_at_to 00:00:00")
                        ->orderBy('created_at', 'desc')
                        ->paginate(100)
                        ->appends($whereArray)
                        ->appends('created_at_from',$created_at_from,)
                        ->appends('created_at_to',$created_at_to,)
                        ->appends(compact('countENT'));
                }
            }
        } elseif ($sort === 'countENT') {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy($sort, 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'desc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
            else {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'desc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_from',$created_at_from,)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
        } elseif ($sort === 'surname') {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_to',$created_at_to,)
                    ->appends(compact('sort'));
            } else {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->orderBy($sort, 'asc')
                ->paginate(100)
                ->appends($whereArray)
                ->appends('created_at_from',$created_at_from,)
                ->appends('created_at_to',$created_at_to,)
                ->appends(compact('sort'));
            }
        } else {
            if (!isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray);
            }
            elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,);
            }
            elseif (isset($created_at_to) && !isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_to',$created_at_to,);
            }
            elseif (isset($created_at_to) && isset($created_at_from)) {
                $data = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->where('created_at', '>=', "$created_at_from 00:00:00")
                    ->where('created_at', '<=', "$created_at_to 00:00:00")
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends('created_at_from',$created_at_from,)
                    ->appends('created_at_to',$created_at_to,);
            }
        }


        // Count
        if (isset($countENT)) {
            if(isset($created_at_from) && isset($created_at_to)){
                $countData =DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->count();
            } elseif (!isset($created_at_from) && isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } else {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('countENT', '>=', $countENT)
                ->count();
            }
        } else {
            if(isset($created_at_from) && isset($created_at_to)){
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '>=', "$created_at_from 00:00:00")
                ->count();
            } elseif (!isset($created_at_from) && isset($created_at_to)) {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->where('created_at', '<=', "$created_at_to 00:00:00")
                ->count();
            } else {
                $countData = DB::table('applications')
                ->select('applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                ->where($whereArray)
                ->count();
            }
        }
        // Data
        $dataArr = [
            'data' => $data,
            'base' => $request->base,
            'haveENT' => $request->haveENT,
            'haveVLEK' => $request->haveVLEK,
            'haveIELTS' => $request->haveIELTS,
            'citizen' => $request->citizen,
            'programms' => $request->programms,
            'region' => $request->region,
            'years' => $request->years,
            'created_at_from' => $request->created_at_from,
            'created_at_to' => $request->created_at_to,
            'process' => $request->process,
            'countENT' => $request->countENT,
			'today' => $today,
            'sort' => $request->sort,
            'countData' => $countData
        ];

        $pdfName = 'Список абитуриентов на ' . date('d.m.Y h:i', strtotime($today)) . '.pdf';
        $pdf = PDF::loadView('admin.enrollee.documents.pdf', $dataArr)->setOptions(['default-font' => 'sans-serif']);
        $pdf->setPaper('A4', 'portrait');$pdf->render();
        return $pdf->download($pdfName);
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
		return redirect()->back()->with('alert', 'Анкета перемещена в архив');
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
        $today = Carbon::today();

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
				$data->case_number_date = $today;
				$data->save();
				return redirect()->back()->with('alert', 'Номер дела - ' . $data->case_number);
			} else {
				$data->iin = $request->iin;
                $data->surname = $request->surname;
                $data->name = $request->name;
                $data->patronymic = $request->patronymic;
				$data->base = $request->base;
				$data->lang_edu = $request->lang_edu;
				$data->phone_1 = $request->phone_1;
				$data->phone_2 = $request->phone_2;
				$data->programms = $request->programms;
				$data->process = $request->process;
				$data->save();
				return redirect()->back()->with('alert', 'Корректировка выполнена!');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request)
	{
	}
}
