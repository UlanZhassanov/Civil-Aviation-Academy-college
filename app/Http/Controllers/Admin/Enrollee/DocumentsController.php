<?php

namespace App\Http\Controllers\Admin\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\DB;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = now('Asia/Almaty');
        $years = $request->years;
        // Filter
        $whereArray = [
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
            'surname' => $request->surname,
            'iin' => $request->iin
        ];
        $whereArray = array_filter($whereArray, 'strlen');
        $countENT = $request->countENT;
        $created_at_from = $request->created_at_from;
        $created_at_to = $request->created_at_to;
        $sort = $request->sort;


        $nationality_list = DB::table('nationalities')
            ->get();

        $data = DB::table('applications')
            ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid', 'applications.*', 'nationalities.id as nat_id', 'nationalities.*')
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where($whereArray)
            ->orderBy('created_at', 'desc')
            ->paginate(100)
            ->appends($whereArray)
            ->appends(compact('countENT'));


        // Count
        $countData = DB::table('applications')
            ->select('applications.id as applid', 'applications.*', 'nationalities.id as nat_id', 'nationalities.*')
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where($whereArray)
            ->count();

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
			'today' => $today,
            'countENT' => $request->countENT,
            'sort' => $request->sort,
            'countData' => $countData
        ];
        return view('admin.enrollee.documents.index', $dataArr)->with(compact('nationality_list', 'nationality_list'));
    }

    public function pdfdocs(Request $request)
    {

        $today = now('Asia/Almaty');
        $years = $request->years;
        // Filter
        $whereArray = [
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
            'surname' => $request->surname,
            'iin' => $request->iin
        ];
        $whereArray = array_filter($whereArray, 'strlen');
        $countENT = $request->countENT;
        $created_at_from = $request->created_at_from;
        $created_at_to = $request->created_at_to;
        $sort = $request->sort;


        $nationality_list = DB::table('nationalities')
            ->get();

        $data = DB::table('applications')
            ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid', 'applications.surname',
             'applications.name', 'applications.patronymic', 'applications.programms', 'applications.countENT')
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where($whereArray)
            ->orderBy('created_at', 'desc')
            ->paginate(100)
            ->appends($whereArray)
            ->appends(compact('countENT'));


        // Count
        $countData = DB::table('applications')
            ->select('applications.id as applid', 'applications.*', 'nationalities.id as nat_id', 'nationalities.*')
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where($whereArray)
            ->count();

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
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download($pdfName);
    }

    public function pdf(Request $request)
    {

        $today = now('Asia/Almaty');
		$years = $request->years;
		// Filter
		$whereArray = [
			'type' => $request->type,
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                    ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'desc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy($sort, 'asc')
                    ->paginate(100)
                    ->appends($whereArray)
                    ->appends(compact('sort'));
            } elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
                ->join('nationalities','applications.nationality_id','=','nationalities.id')
                    ->where($whereArray)
                    ->orderBy('created_at', 'desc')
                    ->paginate(100)
                    ->appends($whereArray);
            }
            elseif (isset($created_at_from) && !isset($created_at_to)) {
                $data = DB::table('applications')
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
                ->select(DB::raw('ROW_NUMBER() OVER(ORDER BY created_at desc) AS num_row'),'applications.id as applid','applications.*','nationalities.id', 'nationalities.*')
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
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download($pdfName);
    }


    public function wordExportStatements($id)
    {
        $data = DB::table('applications')
            ->select(
                'applications.name',
                'applications.surname',
                'applications.patronymic',
                'applications.programms',
                'applications.lang_edu',
                'applications.region',
                'applications.case_number',
                'applications.statement',
                'applications.attestat_or_diplom',
                'applications.photo3x4',
                'applications.medical_certificate',
                'applications.ent_certificate',
                'applications.grant_certificate',
                'applications.udostov_copy',
                'applications.birthdate',
                'applications.iin',
                'nationalities.nationality_ru',
                'nationalities.id as nat_id',
                'applications.case_number_date'
            )
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where('applications.id', '=', $id)
            ->first();
        $templateProcessor = new TemplateProcessor('word-templates/statements.docx');
        $templateProcessor->setValue('surname', $data->surname);
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('patronymic', $data->patronymic);
        $templateProcessor->setValue('programms', $data->programms);
        $templateProcessor->setValue('lang_edu', $data->lang_edu);
        $templateProcessor->setValue('region', $data->region);
        $templateProcessor->setValue('case_number', $data->case_number);

        //заявление
        if ($data->statement == 1) {
            $templateProcessor->setValue('s', '✔');
        } else {
            $templateProcessor->setValue('s', '');
        }

        //аттестат или диплом
        if ($data->attestat_or_diplom == 1) {
            $templateProcessor->setValue('d', '✔');
        } else {
            $templateProcessor->setValue('d', '');
        }

        //фото 3x4
        if ($data->photo3x4 == 1) {
            $templateProcessor->setValue('f', '✔');
        } else {
            $templateProcessor->setValue('f', '');
        }

        //мед справка
        if ($data->medical_certificate == 1) {
            $templateProcessor->setValue('m', '✔');
        } else {
            $templateProcessor->setValue('m', '');
        }

        //сертификат ЕНТ
        if ($data->ent_certificate == 1) {
            $templateProcessor->setValue('u', '✔');
        } else {
            $templateProcessor->setValue('u', '');
        }

        //свидетельство гранта
        if ($data->grant_certificate == 1) {
            $templateProcessor->setValue('g', '✔');
        } else {
            $templateProcessor->setValue('g', '');
        }

        //копия удостоверения
        if ($data->udostov_copy == 1) {
            $templateProcessor->setValue('k', '✔');
        } else {
            $templateProcessor->setValue('k', '');
        }

        //национальность
        if ($data->nat_id == 0) {
            $templateProcessor->setValue('nationality', '');
        } else {
            $templateProcessor->setValue('nationality', mb_strtolower($data->nationality_ru, 'UTF-8'));
        }


        //дата рождения
        if ($data->birthdate !== NULL) {
            $templateProcessor->setValue('birth_date', date('d.m.Y', strtotime($data->birthdate)));
        } elseif ($data->iin === NULL) {
            $templateProcessor->setValue('birth_date', '');
        } elseif (Str::startsWith($data->iin, ['0', '1'])) {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.20' . Str::substr($data->iin, 0, 2));
        } else {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.19' . Str::substr($data->iin, 0, 2));
        }

        //дата номера дела
        if ($data->case_number_date !== NULL) {
            $templateProcessor->setValue('case_number_date', \Carbon\Carbon::parse($data->case_number_date)->translatedFormat('j F Y'));
        } else {
            $templateProcessor->setValue('case_number_date', '            20___');
        }


        $fileName = $data->surname;
        $templateProcessor->saveAs($fileName . ' (заявления).docx');
        return response()->download($fileName . ' (заявления).docx')->deleteFileAfterSend(true);
    }

    public function wordExportBilateralAgreement($id)
    {
        $data = Applications::find($id);
        if ($data->citizen === 'Нерезидент РК' && $data->lang_edu === 'Английский'){
            $templateProcessor = new TemplateProcessor('word-templates/BilateralAgreementEnglish.docx');
        } else {
            $templateProcessor = new TemplateProcessor('word-templates/BilateralAgreement.docx');
        }
        $templateProcessor->setValue('surname', $data->surname);
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('patronymic', $data->patronymic);
        $templateProcessor->setValue('lang_edu', $data->lang_edu);
        $templateProcessor->setValue('type', $data->type);
        $templateProcessor->setValue('iin', $data->iin);
        $templateProcessor->setValue('phone_1', $data->phone_1);
        $templateProcessor->setValue('phone_2', $data->phone_2);
        $templateProcessor->setValue('email', $data->email);

        //степень в родительном падеже
        if ($data->type === 'Бакалавриат') {
            $templateProcessor->setValue('degree_rp_kz', 'бакалавр');
            $templateProcessor->setValue('degree_rp_ru', 'бакалавра');
            $templateProcessor->setValue('degree_rp_en', 'bachelor');
            $templateProcessor->setValue('type_en', 'Bachelor');
        } else if ($data->type === 'Магистратура') {
            $templateProcessor->setValue('degree_rp_kz', 'магистр');
            $templateProcessor->setValue('degree_rp_ru', 'магистра');
            $templateProcessor->setValue('degree_rp_en', 'masters');
            $templateProcessor->setValue('type_en', 'Masters');
        } else if ($data->type === 'Докторантура') {
            $templateProcessor->setValue('degree_rp_kz', 'PhD докторы');
            $templateProcessor->setValue('degree_rp_ru', 'доктора PhD');
            $templateProcessor->setValue('degree_rp_en', 'PhD doctoral studies');
            $templateProcessor->setValue('type_en', 'PhD doctoral studies');
        }

        //образовательная программа(рус)
        $templateProcessor->setValue('programs_ru', $data->programms);

        //группа образовательных программ
        if ($data->programms === 'Лётная эксплуатация гражданских самолетов (пилот)' || $data->programms === 'Лётная эксплуатация гражданских вертолетов (пилот)' || $data->programms === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
            $templateProcessor->setValue('programs_group_ru', 'В167 – Лётная эксплуатация летательных аппаратов и двигателей');
            $templateProcessor->setValue('programs_group_en', 'В167 – Flight operation of aircraft and engines');
            $templateProcessor->setValue('programs_group_kz', 'В167 – Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану');
        } else if ($data->programms === 'Организация авиационных перевозок' || $data->programms === 'Логистика на транспорте') {
            $templateProcessor->setValue('programs_group_ru', 'В095 – Транспортные услуги');
            $templateProcessor->setValue('programs_group_en', 'В095 – Transport services');
            $templateProcessor->setValue('programs_group_kz', 'В095 – Көлік қызметтері');
        } else if ($data->programms === 'Авиационная техника и технологии (профильная магистратура)' || $data->programms === 'Авиационная техника и технологии (научно-педагогическая магистратура)') {
            $templateProcessor->setValue('programs_group_ru', 'М105 – Авиационная техника и технологии');
            $templateProcessor->setValue('programs_group_en', 'М105 – Aviation equipment and technologies');
            $templateProcessor->setValue('programs_group_kz', 'М105 – Авиациялық техника және технологиялар');
        } else if ($data->programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)' || $data->programms === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)') {
            $templateProcessor->setValue('programs_group_ru', 'М151 – Транспортные услуги');
            $templateProcessor->setValue('programs_group_en', 'М151 – Transport services');
            $templateProcessor->setValue('programs_group_kz', 'М151 – Көлік қызметі');
        } else if ($data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)' || $data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)') {
            $templateProcessor->setValue('programs_group_ru', 'М106 – Летная эксплуатация летательных аппаратов и двигателей');
            $templateProcessor->setValue('programs_group_en', 'М106 – Flight operation of aircraft and engines');
            $templateProcessor->setValue('programs_group_kz', 'М106 – Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану');
        } else if ($data->programms === 'Авиационная техника и технологии') {
            $templateProcessor->setValue('programs_group_ru', 'D105 - Авиационная техника и технологии');
            $templateProcessor->setValue('programs_group_en', 'D105 – Aviation equipment and technologies');
            $templateProcessor->setValue('programs_group_kz', 'D105 - Авиациялық техника және технологиялар');
        } else {
            $templateProcessor->setValue('programs_group_ru', 'В067 – Воздушный транспорт и технологии');
            $templateProcessor->setValue('programs_group_en', 'В067 – Air transport and technology');
            $templateProcessor->setValue('programs_group_kz', 'В067 – Әуе көлігі және технологиялары');
        }

        //образовательная программа(каз, анг)
        if ($data->programms === 'Лётная эксплуатация гражданских самолетов (пилот)') {
            $templateProcessor->setValue('programs_kz', 'Азаматтық ұшақтарды ұшуда пайдалану (ұшқыш)');
            $templateProcessor->setValue('programs_en', 'Flight operation of civil aircraft (pilot)');
        } else if ($data->programms === 'Лётная эксплуатация гражданских вертолетов (пилот)') {
            $templateProcessor->setValue('programs_kz', 'Азаматтық тікұшақтарды ұшуда пайдалану (ұшқыш)');
            $templateProcessor->setValue('programs_en', 'Flight operation of civil helicopters (pilot)');
        } else if ($data->programms === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
            $templateProcessor->setValue('programs_kz', 'Әуе қозғалысына қызмет көрсету және ұшуда аэронавигациялық қамтамасыз ету  (авиадиспетчер)');
            $templateProcessor->setValue('programs_en', 'Air traffic services and air navigation support of flights');
        } else if ($data->programms === 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттарының авионика жүйелерін техникалық пайдалану');
            $templateProcessor->setValue('programs_en', 'Technical operation of aircraft avionics systems');
        } else if ($data->programms === 'Техническая эксплуатация летательных аппаратов и двигателей') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды техникалық пайдалану');
            $templateProcessor->setValue('programs_en', 'Technical operation of aircraft and engines');
        } else if ($data->programms === 'Обеспечение авиационной безопасности') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық қауіпсіздікті қамтамасыз ету');
            $templateProcessor->setValue('programs_en', 'Aviation security');
        } else if ($data->programms === 'Обслуживание наземного радиоэлектронного оборудования аэропортов') {
            $templateProcessor->setValue('programs_kz', 'Әуежайлардың жердегі радиоэлектрондық жабдықтарына қызмет көрсету');
            $templateProcessor->setValue('programs_en', 'Maintenance of ground radio-electronic equipment of airports');
        } else if ($data->programms === 'Организация аэропортовой деятельности') {
            $templateProcessor->setValue('programs_kz', 'Әуежай қызметін ұйымдастыру');
            $templateProcessor->setValue('programs_en', 'Organization of airport services');
        } else if ($data->programms === 'Организация авиационных перевозок') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық тасымалдауды ұйымдастыру');
            $templateProcessor->setValue('programs_en', 'Organization of air transportation');
        } else if ($data->programms === 'Логистика на транспорте') {
            $templateProcessor->setValue('programs_kz', 'Көліктегі логистика');
            $templateProcessor->setValue('programs_en', 'Transport logistics');
        } else if ($data->programms === 'Технология транспортных процессов в авиации') {
            $templateProcessor->setValue('programs_kz', 'Авиациядағы көлік процестерінің технологиясы');
            $templateProcessor->setValue('programs_en', 'Technology of transport processes in aviation');
        }
        else if ($data->programms === 'Авиационная техника и технологии (профильная магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар (бейіндік магистратура)');
           $templateProcessor->setValue('programs_en', 'Aviation equipment and technologies (profile direction)');
       } else if ($data->programms === 'Авиационная техника и технологии (научно-педагогическая магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар (ғылыми-педагогикалық магистратура)');
           $templateProcessor->setValue('programs_en', 'Aviation equipment and technologies (scientific and pedagogical direction)');
       } else if ($data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану (ғылыми-педагогикалық магистратура)');
           $templateProcessor->setValue('programs_en', 'Flight operation of aircraft and engines (scientific and pedagogical direction)');
       } else if ($data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану (бейіндік магистратура)');
           $templateProcessor->setValue('programs_en', 'Flight operation of aircraft and engines (profile direction)');
       } else if ($data->programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Тасымалдауды, қозғалысты ұйымдастыру және көлікті пайдалану (бейіндік магистратура)');
           $templateProcessor->setValue('programs_en', 'Organization of transportation, traffic and operation of transport (profile direction)');
       } else if ($data->programms === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)') {
           $templateProcessor->setValue('programs_kz', 'Тасымалдауды, қозғалысты ұйымдастыру және көлікті пайдалану (ғылыми-педагогикалық магистратура)');
           $templateProcessor->setValue('programs_en', 'Organization of transportation, traffic and operation of transport (scientific and pedagogical direction)');
       }
       else if ($data->programms === 'Авиационная техника и технологии') {
           $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар');
           $templateProcessor->setValue('programs_en', 'Aviation equipment and technologies');
       }

        //стоимость
        if ($data->have_grant === 1) {
            $templateProcessor->setValue('price', 'грант');
            $templateProcessor->setValue('price_ru', '(                                                                                                )');
            $templateProcessor->setValue('price_kz', '(                                                                                                )');
        } else {
            if($data->type === 'Бакалавриат'){
                if ($data->programms === 'Организация авиационных перевозок' || $data->programms === 'Логистика на транспорте') {
                    if($data->citizen === 'Резидент РК'){
                        $templateProcessor->setValue('price', '714 900');
                        $templateProcessor->setValue('price_ru', '(Семьсот четырнадцать тысяч девятьсот)');
                        $templateProcessor->setValue('price_kz', '(Жеті жүз он төрт мың тоғыз жүз)');
                        $templateProcessor->setValue('price_en', '(Seven hundred and fourteen thousand, nine hundred)');
                    } else {
                        $templateProcessor->setValue('price', '1 000 000');
                        $templateProcessor->setValue('price_ru', '(Один миллион)');
                        $templateProcessor->setValue('price_kz', '(Бір миллион)');
                        $templateProcessor->setValue('price_en', '(One million)');
                    }
                } else {
                    if($data->citizen === 'Резидент РК'){
                        $templateProcessor->setValue('price', '980 000');
                        $templateProcessor->setValue('price_ru', '(Девятьсот восемьдесят тысяч)');
                        $templateProcessor->setValue('price_kz', '(Тоғыз жүз сексен мың)');
                        $templateProcessor->setValue('price_en', '(Nine hundred and eighty thousand)');
                    } else {
                        if ($data->programms === 'Лётная эксплуатация гражданских самолетов (пилот)' || $data->programms === 'Лётная эксплуатация гражданских вертолетов (пилот)' || $data->programms === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
                            $templateProcessor->setValue('price', '1 500 000');
                            $templateProcessor->setValue('price_ru', '(Один миллион пятьсот тысяч)');
                            $templateProcessor->setValue('price_kz', '(Бір миллион бес жүз мың)');
                            $templateProcessor->setValue('price_en', '(One million, five hundred thousand)');
                        } else {
                            $templateProcessor->setValue('price', '1 250 000');
                            $templateProcessor->setValue('price_ru', '(Один миллион двести пятьдесят тысяч)');
                            $templateProcessor->setValue('price_kz', '(Бір миллион екі жүз елу мың)');
                            $templateProcessor->setValue('price_en', '(One million, two hundred and fifty thousand)');
                        }
                    }
                }
            }
            else if ($data->type === 'Магистратура'){
                $templateProcessor->setValue('price', '980 000');
                $templateProcessor->setValue('price_ru', '(Девятьсот восемьдесят тысяч)');
                $templateProcessor->setValue('price_kz', '(Тоғыз жүз сексен мың)');
                $templateProcessor->setValue('price_en', '(Nine hundred and eighty thousand)');
            }
            else if ($data->type === 'Докторантура'){
                $templateProcessor->setValue('price', '1 950 000');
                $templateProcessor->setValue('price_ru', '(Один миллион двести пятьдесят тысяч)');
                $templateProcessor->setValue('price_kz', '(Бір миллион тоғыз жүз елу мың)');
                $templateProcessor->setValue('price_en', '(One million, nine hundred and fifty thousand)');
            }
        }


        //кредит
        if ($data->type === 'Бакалавриат') {
            $templateProcessor->setValue('cr', '240');
        } else if ($data->type === 'Магистратура') {
            if($data->programms === 'Авиационная техника и технологии (профильная магистратура)' || $data->programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)' || $data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)'){
                $templateProcessor->setValue('cr', '60');
            } else {
                $templateProcessor->setValue('cr', '120');
            }
        } else if ($data->type === 'Докторантура') {
            $templateProcessor->setValue('cr', '180');
        }

        //дата рождения
        if ($data->birthdate !== NULL) {
            $templateProcessor->setValue('birth_date', date('d.m.Y', strtotime($data->birthdate)));
        } elseif ($data->iin === NULL) {
            $templateProcessor->setValue('birth_date', '');
        } elseif (Str::startsWith($data->iin, ['0', '1'])) {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.20' . Str::substr($data->iin, 0, 2));
        } else {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.19' . Str::substr($data->iin, 0, 2));
        }

        $fileName = $data->surname;
        $templateProcessor->saveAs($fileName . ' (двусторонний договор).docx');
        return response()->download($fileName . ' (двусторонний договор).docx')->deleteFileAfterSend(true);
    }

    public function wordExportStateGrantAgreement($id)
    {
        $data = Applications::find($id);
        $templateProcessor = new TemplateProcessor('word-templates/Agreement(state grant).docx');
        $templateProcessor->setValue('surname', $data->surname);
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('patronymic', $data->patronymic);
        $templateProcessor->setValue('lang_edu', $data->lang_edu);
        $templateProcessor->setValue('type', $data->type);
        $templateProcessor->setValue('iin', $data->iin);
        $templateProcessor->setValue('phone_1', $data->phone_1);
        $templateProcessor->setValue('phone_2', $data->phone_2);
        $templateProcessor->setValue('email', $data->email);

        //степень в родительном падеже
        if ($data->type === 'Бакалавриат') {
            $templateProcessor->setValue('degree_rp_kz', 'бакалавр');
            $templateProcessor->setValue('degree_rp_ru', 'бакалавра');
            $templateProcessor->setValue('degree_rp_en', 'bachelor');
        } else if ($data->type === 'Магистратура') {
            $templateProcessor->setValue('degree_rp_kz', 'магистр');
            $templateProcessor->setValue('degree_rp_ru', 'магистра');
            $templateProcessor->setValue('degree_rp_en', 'masters');
        } else if ($data->type === 'Докторантура') {
            $templateProcessor->setValue('degree_rp_kz', 'PhD докторы');
            $templateProcessor->setValue('degree_rp_ru', 'доктора PhD');
            $templateProcessor->setValue('degree_rp_en', 'PhD doctoral studies');
        }

        //образовательная программа(рус)
        $templateProcessor->setValue('programs_ru', $data->programms);

        //образовательная программа(каз)
        if ($data->programms === 'Лётная эксплуатация гражданских самолетов (пилот)') {
            $templateProcessor->setValue('programs_kz', 'Азаматтық ұшақтарды ұшуда пайдалану (ұшқыш)');
        } else if ($data->programms === 'Лётная эксплуатация гражданских вертолетов (пилот)') {
            $templateProcessor->setValue('programs_kz', 'Азаматтық тікұшақтарды ұшуда пайдалану (ұшқыш)');
        } else if ($data->programms === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов') {
            $templateProcessor->setValue('programs_kz', 'Әуе қозғалысына қызмет көрсету және ұшуда аэронавигациялық қамтамасыз ету  (авиадиспетчер)');
        } else if ($data->programms === 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттарының авионика жүйелерін техникалық пайдалану');
        } else if ($data->programms === 'Техническая эксплуатация летательных аппаратов и двигателей') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды техникалық пайдалану');
        } else if ($data->programms === 'Обеспечение авиационной безопасности') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық қауіпсіздікті қамтамасыз ету');
        } else if ($data->programms === 'Обслуживание наземного радиоэлектронного оборудования аэропортов') {
            $templateProcessor->setValue('programs_kz', 'Әуежайлардың жердегі радиоэлектрондық жабдықтарына қызмет көрсету');
        } else if ($data->programms === 'Организация аэропортовой деятельности') {
            $templateProcessor->setValue('programs_kz', 'Әуежай қызметін ұйымдастыру');
        } else if ($data->programms === 'Организация авиационных перевозок') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық тасымалдауды ұйымдастыру');
        } else if ($data->programms === 'Логистика на транспорте') {
            $templateProcessor->setValue('programs_kz', 'Көліктегі логистика');
        } else if ($data->programms === 'Технология транспортных процессов в авиации') {
            $templateProcessor->setValue('programs_kz', 'Авиациядағы көлік процестерінің технологиясы');
        }
         else if ($data->programms === 'Авиационная техника и технологии (профильная магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар (бейіндік магистратура)');
        } else if ($data->programms === 'Авиационная техника и технологии (научно-педагогическая магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар (ғылыми-педагогикалық магистратура)');
        } else if ($data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану (ғылыми-педагогикалық магистратура)');
        } else if ($data->programms === 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Ұшу аппараттары мен қозғалтқыштарды ұшуда пайдалану (бейіндік магистратура)');
        } else if ($data->programms === 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Тасымалдауды, қозғалысты ұйымдастыру және көлікті пайдалану (бейіндік магистратура)');
        } else if ($data->programms === 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)') {
            $templateProcessor->setValue('programs_kz', 'Тасымалдауды, қозғалысты ұйымдастыру және көлікті пайдалану (ғылыми-педагогикалық магистратура)');
        }
        else if ($data->programms === 'Авиационная техника и технологии') {
            $templateProcessor->setValue('programs_kz', 'Авиациялық техника және технологиялар');
        }





        //дата рождения
        if ($data->birthdate !== NULL) {
            $templateProcessor->setValue('birth_date', date('d.m.Y', strtotime($data->birthdate)));
        } elseif ($data->iin === NULL) {
            $templateProcessor->setValue('birth_date', '');
        } elseif (Str::startsWith($data->iin, ['0', '1'])) {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.20' . Str::substr($data->iin, 0, 2));
        } else {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.19' . Str::substr($data->iin, 0, 2));
        }

        $fileName = $data->surname;
        $templateProcessor->saveAs($fileName . ' (договор на оказание образовательных услуг на основе госгранта).docx');
        return response()->download($fileName . ' (договор на оказание образовательных услуг на основе госгранта).docx')->deleteFileAfterSend(true);
    }

    public function wordExportApplicationForCredits($id)
    {
        $data = DB::table('applications')
            ->select(
                'applications.name',
                'applications.surname',
                'applications.patronymic',
                'applications.programms',
                'applications.lang_edu',
                'applications.type',
                'applications.phone_1',
                'applications.birthdate',
                'applications.iin',
                'applications.gender',
                'applications.base',
                'nationalities.nationality_kz',
                'nationalities.nationality_ru',
                'nationalities.id as nat_id',
                'applications.case_number_date'
            )
            ->join('nationalities', 'applications.nationality_id', '=', 'nationalities.id')
            ->where('applications.id', '=', $id)
            ->first();
        $templateProcessor = new TemplateProcessor('word-templates/applicationForCredits.docx');
        $templateProcessor->setValue('surname', $data->surname);
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('patronymic', $data->patronymic);
        $templateProcessor->setValue('lang_edu', $data->lang_edu);
        $templateProcessor->setValue('type', $data->type);
        $templateProcessor->setValue('phone_1', $data->phone_1);

        //дата рождения
        if ($data->birthdate !== NULL) {
            $templateProcessor->setValue('birth_date', date('d.m.Y', strtotime($data->birthdate)));
        } elseif ($data->iin === NULL) {
            $templateProcessor->setValue('birth_date', '');
        } elseif (Str::startsWith($data->iin, ['0', '1'])) {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.20' . Str::substr($data->iin, 0, 2));
        } else {
            $templateProcessor->setValue('birth_date', Str::substr($data->iin, 4, 2) . '.' . Str::substr($data->iin, 2, 2) . '.19' . Str::substr($data->iin, 0, 2));
        }

        //пол
        if ($data->gender !== NULL) {
            if ($data->gender === "мужской") {
                $templateProcessor->setValue('gender_kz', 'ер');
                $templateProcessor->setValue('gender_ru', 'мужской');
            } elseif ($data->gender === "женский") {
                $templateProcessor->setValue('gender_kz', 'әйел');
                $templateProcessor->setValue('gender_ru', 'женский');
            }
        } elseif ($data->iin === NULL) {
            $templateProcessor->setValue('gender_kz', '');
            $templateProcessor->setValue('gender_ru', '');
        } elseif (Str::substr($data->iin, 6, 1) == '1' || Str::substr($data->iin, 6, 1) == '3' || Str::substr($data->iin, 6, 1) == '5') {
            $templateProcessor->setValue('gender_kz', 'ер');
            $templateProcessor->setValue('gender_ru', 'мужской');
        } else {
            $templateProcessor->setValue('gender_kz', 'әйел');
            $templateProcessor->setValue('gender_ru', 'женский');
        }

        //на базе
        if($data->type === 'Бакалавриат'){
            if ($data->base === '11-го класса') {
                $templateProcessor->setValue('base_ru', '11-го класса');
                $templateProcessor->setValue('base_kz', '11 сынып');
            } else if ($data->base === 'Высшего образования') {
                $templateProcessor->setValue('base_ru', 'ВО');
                $templateProcessor->setValue('base_kz', 'ЖБ');
            } else if ($data->base == 'Технического и профессионального образования (колледжа)') {
                $templateProcessor->setValue('base_ru', 'ТиПО');
                $templateProcessor->setValue('base_kz', 'ТжКБ');
            }
        } else {
            $templateProcessor->setValue('base_ru', 'ВО');
            $templateProcessor->setValue('base_kz', 'ЖБ');
        }

        //национальность
        if ($data->nat_id == 0) {
            $templateProcessor->setValue('nationality_kz', '');
            $templateProcessor->setValue('nationality_ru', '');
        } else {
            $templateProcessor->setValue('nationality_kz', mb_strtolower($data->nationality_kz, 'UTF-8'));
            $templateProcessor->setValue('nationality_ru', mb_strtolower($data->nationality_ru, 'UTF-8'));
        }

        //дата номера дела
        if ($data->case_number_date !== NULL) {
            $templateProcessor->setValue('cday', '« ' . \Carbon\Carbon::parse($data->case_number_date)->translatedFormat('j') . ' »');
            $templateProcessor->setValue('cd_month_kz', \Carbon\Carbon::parse($data->case_number_date)->translatedFormat('F'));
            $templateProcessor->setValue('cd_month_ru', \Carbon\Carbon::parse($data->case_number_date)->locale('ru_RU')->translatedFormat('F'));
            $templateProcessor->setValue('c_y', \Carbon\Carbon::parse($data->case_number_date)->translatedFormat('y'));
        } else {
            $templateProcessor->setValue('cday', '«       »');
            $templateProcessor->setValue('cd_month_kz', '');
            $templateProcessor->setValue('cd_month_ru', '');
            $templateProcessor->setValue('c_y', '___');
        }

        $fileName = $data->surname;
        $templateProcessor->saveAs($fileName . ' (заявление для поступающих по кредитам).docx');
        return response()->download($fileName . ' (заявление для поступающих по кредитам).docx')->deleteFileAfterSend(true);
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
                $data->base = $request->base;
                $data->lang_edu = $request->lang_edu;
                $data->phone_1 = $request->phone_1;
                $data->phone_2 = $request->phone_2;
                $data->programms = $request->programms;
                $data->process = $request->process;
                $data->surname = $request->surname;
                $data->name = $request->name;
                $data->patronymic = $request->patronymic;
                $data->mathLit = $request->mathLit;
                $data->readLit = $request->readLit;
                $data->historyKZ = $request->historyKZ;
                $data->math = $request->math;
                $data->aviaSec = $request->aviaSec;
                $data->natureSec = $request->natureSec;
                $data->geography = $request->geography;
                $data->physics = $request->physics;
                $data->countENT = $request->countENT;
                $data->nationality_id = $request->nationality_id;

                $data->statement = $request->statement;
                $data->attestat_or_diplom = $request->attestat;
                $data->photo3x4 = $request->photo;
                $data->medical_certificate = $request->med;
                $data->ent_certificate = $request->ent;
                $data->grant_certificate = $request->grant;
                $data->udostov_copy = $request->udostov;

                $data->have_grant = $request->grant;

                if ($request->hasFile('vlekImage')) {
                    $request->validate([
                        'images' => 'vlekImage|mimes:jpeg,png,jpg,gif,pdf|max:2048',
                    ]);

                    $image_vlek = $request->file('vlekImage');
                    $image_name_vlek = $image_vlek->getClientOriginalName();
                    $destinationPathVlek = public_path('/storage/applications/vlek/' . $request->surname . ' ' . $request->name);
                    $image_vlek->move($destinationPathVlek, $image_name_vlek);

                    $data->haveVLEK = "Да";
                    $data->imgVLEK = '/storage/applications/vlek/' . $request->surname . ' ' . $request->name . '/' . $image_name_vlek;
                }
                if ($request->hasFile('psychoImage')) {
                    $request->validate([
                        'images' => 'psychoImage|mimes:jpeg,png,jpg,gif,pdf|max:2048',
                    ]);

                    $image_psycho = $request->file('psychoImage');
                    $image_name_psycho = $image_psycho->getClientOriginalName();
                    $destinationPathPsycho = public_path('/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name);
                    $image_psycho->move($destinationPathPsycho, $image_name_psycho);

                    $data->imgPSYCHO = '/storage/applications/vlek/psycho/' . $request->surname . ' ' . $request->name . '/' . $image_name_psycho;
                }



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
