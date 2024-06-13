<?php

namespace App\Http\Controllers\Admin\Graduate;

use App\Http\Controllers\Controller;
use App\Models\Graduate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GraduateController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$whereArray = [
			'form_study' => $request->form_study,
			'surname' => $request->surname,
			'region' => $request->region,
			'reference' => $request->reference,
			'resume' => $request->resume,
			'magister' => $request->magister,
			'direction' => $request->direction,
			'work' => $request->work,
			'unification' => $request->unification,
			'process' => $request->process
		];
		$whereArray = array_filter($whereArray, 'strlen');

		$data = Graduate::where($whereArray)
			->paginate(100)
			->appends($whereArray);

		$countData = Graduate::where($whereArray)
			->count();

		$dataArray = [
			'data' => $data,
			'form_study' => $request->form_study,
			'region' => $request->region,
			'magister' => $request->magister,
			'reference' => $request->reference,
			'resume' => $request->resume,
			'direction' => $request->direction,
			'unification' => $request->unification,
			'work' => $request->work,
			'process' => $request->process,
			'countData' => $countData
		];
		return view('admin.graduate.index', $dataArray);
	}

    	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index_new(Request $request)
	{
		$whereArray = [
			'form_study' => $request->form_study,
			'surname' => $request->surname,
			'iin' => $request->iin,
			'region' => $request->region,
			'reference' => $request->reference,
			'employment_type' => $request->employment_type,
			'have_portfolio' => $request->have_portfolio,
			'type' => $request->type,
			'direction' => $request->direction,
			'work' => $request->work,
			'process' => $request->process,
			'graduate_status' => $request->graduate_status,
		];
		$whereArray = array_filter($whereArray, 'strlen');

        if(isset($request->grad_year)) {
            $data = Graduate::where($whereArray)
            ->whereYear('grad_year', "$request->grad_year")
			->paginate(100)
			->appends($whereArray)
			->appends('grad_year',$request->grad_year,);
        } else {
            $data = Graduate::where($whereArray)
                ->paginate(100)
                ->appends($whereArray);
        }


        if(isset($request->grad_year)) {
		$countData = Graduate::where($whereArray)
        ->whereYear('grad_year', "$request->grad_year")
			->count();
        } else {
            $countData = Graduate::where($whereArray)
                ->count();
        }

		$dataArray = [
			'data' => $data,
			'form_study' => $request->form_study,
			'region' => $request->region,
			'type' => $request->type,
			'reference' => $request->reference,
			'employment_type' => $request->employment_type,
			'have_portfolio' => $request->have_portfolio,
			'direction' => $request->direction,
			'unification' => $request->unification,
			'work' => $request->work,
			'process' => $request->process,
			'grad_year' => $request->grad_year,
			'graduate_status' => $request->graduate_status,
			'countData' => $countData
		];
		return view('admin.graduate.index_new', $dataArray);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.graduate.add');
	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create_new()
	{
		return view('admin.graduate.add_new');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$data = new Graduate;
		$data->surname = $request->surname;
		$data->name = $request->name;
		$data->patronymic = $request->patronymic;
		$data->groupe = $request->groupe;
		$data->unification = $request->unification;
		$data->gpa = $request->gpa;
		$data->iin = $request->iin;
		$data->form_study = $request->form_study;
		$data->reg_address = $request->reg_address;
		$data->res_address = $request->res_address;
		$data->region = $request->region;
		$data->speciality = $request->speciality;
		$data->magister = $request->magister;
		$data->work = $request->work;
		if ($request->work === 0 || $request->work === NULL) {
			$data->work_place = NULL;
		} else {
			$data->work_place = $request->work_place;
		}
		$data->reference = $request->reference;
		$data->resume = $request->resume;
		$data->document = $request->document;
		$data->direction = $request->direction;
		$data->direction_place1 = $request->directionPlace1;
		$data->direction_place2 = $request->directionPlace2;
		$data->direction_place3 = $request->directionPlace3;
		$data->phone = $request->phone;
		$data->graduation_year = $request->graduation_year;
		$data->quarter = $request->quarter;
		$data->process = $request->process;
		$data->save();
		return redirect()->route('admin.graduate.graduates.index')->with('alert', 'Выпускник ' . $request->surname . ' ' . $request->name . ' добавлен');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store_new(Request $request)
	{
		$data = new Graduate;
		$data->surname = $request->surname;
		$data->name = $request->name;
		$data->patronymic = $request->patronymic;
		$data->type = $request->type;
		$data->iin = $request->iin;
		$data->groupe = $request->groupe;
		$data->speciality = $request->speciality;
		$data->edu_program = $request->edu_program;
		$data->edu_direction = $request->edu_direction;
		$data->op_group = $request->op_group;
		$data->gpa = $request->gpa;
		$data->form_study = $request->form_study;
		$data->international_grant = $request->international_grant;
		$data->edu_form = $request->edu_form;
		$data->reg_address = $request->reg_address;
		$data->region = $request->region;
		$data->continue_education = $request->continue_education;
		$data->work = $request->work;
		$data->employment_type = $request->employment_type;
		$data->work_place = $request->work_place;
		$data->position = $request->position;
		$data->position_status = $request->position_status;
		$data->reference = $request->reference;
		$data->have_portfolio = $request->have_portfolio;
		$data->have_fincenter_doc = $request->have_fincenter_doc;
		$data->direction = $request->direction;
		$data->direction_place1 = $request->direction_place1;
		$data->direction_place2 = $request->direction_place2;
		$data->direction_place3 = $request->direction_place3;
		$data->phone = $request->phone;
		$data->grad_year = $request->grad_year."-01" ;
		$data->graduate_status = $request->graduate_status;


        if ($request->hasFile('reference_doc')) {
            $request->validate([
                'images' => 'reference_doc|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ]);

            $reference_doc = $request->file('reference_doc');
            $image_name_reference_doc = $reference_doc->getClientOriginalName();
            $destinationPathVlek = public_path('/storage/graduates/references/' . $request->surname . ' ' . $request->name);
            $reference_doc->move($destinationPathVlek, $image_name_reference_doc);

            $data->reference = 1;
            $data->reference_doc = '/storage/graduates/references/' . $request->surname . ' ' . $request->name . '/' . $image_name_reference_doc;
        }
        if ($request->hasFile('portfolio_doc')) {
            $request->validate([
                'images' => 'portfolio_doc|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ]);

            $portfolio_doc = $request->file('portfolio_doc');
            $image_name_portfolio_doc = $portfolio_doc->getClientOriginalName();
            $destinationPathPsycho = public_path('/storage/graduates/portfolios/' . $request->surname . ' ' . $request->name);
            $portfolio_doc->move($destinationPathPsycho, $image_name_portfolio_doc);

            $data->have_portfolio = "Имеется";
            $data->portfolio_doc = '/storage/graduates/portfolios/' . $request->surname . ' ' . $request->name . '/' . $image_name_portfolio_doc;
        }

		$data->save();
		return redirect()->route('admin.graduate.graduates.index_new')->with('alert', 'Выпускник ' . $request->surname . ' ' . $request->name . ' добавлен');
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
	public function update(Request $request)
	{
		$data = Graduate::find($request->id);
        $data->surname = $request->surname;
        $data->name = $request->name;
        $data->patronymic = $request->patronymic;
        $data->groupe = $request->groupe;
		$data->type = $request->type;
		$data->reg_address = $request->reg_address;
		$data->res_address = $request->res_address;
		$data->region = $request->region;
		$data->unification = $request->unification;
		$data->reference = $request->reference;
		$data->resume = $request->resume;
		$data->work = $request->work;
        $data->work_place = $request->work_place;
		$data->direction = $request->direction;
        if($request->direction === '0'){
            $data->direction_place1 = null;
		    $data->direction_place2 = null;
		    $data->direction_place3 = null;
        } else if (($request->direction === '1' || $data->direction === 1) && $request->direction !== '0'){
            $data->direction_place1 = $request->direction_place1;
            $data->direction_place2 = $request->direction_place1;
            $data->direction_place3 = $request->direction_place1;
        }
		$data->document = $request->document;
		$data->gpa = $request->gpa;
		$data->graduation_year = $request->graduation_year;
		$data->quarter = $request->quarter;
		$data->phone = $request->phone;
		$data->magister = $request->magister;
		$data->process = $request->process;
		$data->iin = $request->iin;
		$data->form_study = $request->form_study;

        $data->speciality = $request->speciality;
        $data->international_grant = $request->international_grant;
        $data->edu_form = $request->edu_form;
        $data->edu_program = $request->edu_program;
        $data->continue_education = $request->continue_education;
        $data->employment_type = $request->employment_type;
        $data->position = $request->position;
        $data->position_status = $request->position_status;
        $data->reference = $request->reference;
        $data->have_portfolio = $request->have_portfolio;
        $data->have_fincenter_doc = $request->have_fincenter_doc;
		$data->grad_year = $request->grad_year."-01" ;
        $data->graduate_status = $request->graduate_status;
        if ($request->hasFile('reference_doc')) {
            $request->validate([
                'images' => 'reference_doc|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ]);

            $reference_doc = $request->file('reference_doc');
            $image_name_reference_doc = $reference_doc->getClientOriginalName();
            $destinationPathVlek = public_path('/storage/graduates/references/' . $request->surname . ' ' . $request->name);
            $reference_doc->move($destinationPathVlek, $image_name_reference_doc);

            $data->reference = 1;
            $data->reference_doc = '/storage/graduates/references/' . $request->surname . ' ' . $request->name . '/' . $image_name_reference_doc;
        }
        if ($request->hasFile('portfolio_doc')) {
            $request->validate([
                'images' => 'portfolio_doc|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            ]);

            $portfolio_doc = $request->file('portfolio_doc');
            $image_name_portfolio_doc = $portfolio_doc->getClientOriginalName();
            $destinationPathPsycho = public_path('/storage/graduates/portfolios/' . $request->surname . ' ' . $request->name);
            $portfolio_doc->move($destinationPathPsycho, $image_name_portfolio_doc);

            $data->have_portfolio = "Имеется";
            $data->portfolio_doc = '/storage/graduates/portfolios/' . $request->surname . ' ' . $request->name . '/' . $image_name_portfolio_doc;
        }

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
		$data = Graduate::find($id);
		$data->delete();
		return redirect()->back()->with('alert', 'Выпускник успешно удалён');
	}
}
