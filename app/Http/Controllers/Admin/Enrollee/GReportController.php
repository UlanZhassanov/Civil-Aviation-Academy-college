<?php

namespace App\Http\Controllers\Admin\Enrollee;

use App\Http\Controllers\Controller;
use App\Models\Applications;
use PDF;
use Illuminate\Http\Request;

class GReportController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$created_at_from = $request->created_at_from;
		$created_at_to = $request->created_at_to;
		$years = $request->years;
		if (!isset($created_at_from) || !isset($created_at_to)) {
			// БАКАЛАВРИАТ
			// Техническая эксплуатация летательных аппаратов и двигателей
			$count1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count3 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count5 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count6 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count8 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count9 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			// Обеспечение авиационной безопасности
			$count10 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count11 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count12 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			// Организация аэропортовой деятельности
			$count13 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count14 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count15 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count17 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count18 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count20 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count21 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count23 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count24 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			// Организация авиационных перевозок
			$count25 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count26 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count27 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			// Логистика на транспорте
			$count28 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count29 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count30 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			// Технология транспортных процессов в авиации
			$count31 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$count32 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$count33 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			// МАГИСТРАТУРА
			$countMaster1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
            $countMaster3 = Applications::select('*')
                ->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
                ->where('status', 0)
                ->count();
			$countMaster4 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$countMaster5 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster6 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('status', 0)
				->count();
		} else {
					// БАКАЛАВРИАТ
				// Техническая эксплуатация летательных аппаратов и двигателей
				$count1 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count2 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count3 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count5 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count6 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count8 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count9 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			// Обеспечение авиационной безопасности
			$count10 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count11 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count12 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			// Организация аэропортовой деятельности
			$count13 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count14 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count15 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count17 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count18 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count20 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count21 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count23 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count24 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			// Организация авиационных перевозок
			$count25 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count26 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count27 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			// Логистика на транспорте
			$count28 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count29 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count30 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			// Технология транспортных процессов в авиации
			$count31 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$count32 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$count33 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			// МАГИСТРАТУРА
			$countMaster1 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster2 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
            $countMaster3 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster4 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$countMaster5 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster6 = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral = Applications::select('*')
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->where('programms', 'Авиационная техника и технологии')
				->where('status', 0)
				->count();
		}

		$array = [
			'count1' => $count1,
			'count2' => $count2,
			'count3' => $count3,
			'count4' => $count4,
			'count5' => $count5,
			'count6' => $count6,
			'count7' => $count7,
			'count8' => $count8,
			'count9' => $count9,
			'count10' => $count10,
			'count11' => $count11,
			'count12' => $count12,
			'count13' => $count13,
			'count14' => $count14,
			'count15' => $count15,
			'count16' => $count16,
			'count17' => $count17,
			'count18' => $count18,
			'count19' => $count19,
			'count20' => $count20,
			'count21' => $count21,
			'count22' => $count22,
			'count23' => $count23,
			'count24' => $count24,
			'count25' => $count25,
			'count26' => $count26,
			'count27' => $count27,
			'count28' => $count28,
			'count29' => $count29,
			'count30' => $count30,
			'count31' => $count31,
			'count32' => $count32,
			'count33' => $count33,
			'sum1_5' => $sum1_5,
			'sum6_8' => $sum6_8,
			'sum9_10' => $sum9_10,
			'countMaster1' => $countMaster1,
			'countMaster2' => $countMaster2,
			'countMaster3' => $countMaster3,
			'countMaster4' => $countMaster4,
			'countMaster5' => $countMaster5,
			'countMaster6' => $countMaster6,
			'totalMaster' => $totalMaster,
			'countDoctoral' => $countDoctoral,
			'years' => $years,
			'created_at_from' => $created_at_from,
			'created_at_to' => $created_at_to
		];

		return view('admin.enrollee.report.general.index', $array);
	}

	public function pdf($created_at_from, $created_at_to )
	{

		if($created_at_from == 0 || $created_at_to == 0){
			// БАКАЛАВРИАТ
		// Техническая эксплуатация летательных аппаратов и двигателей
			$count1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count3 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count5 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			$count6 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('status', 0)
				->count();
			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count8 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			$count9 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('status', 0)
				->count();
			// Обеспечение авиационной безопасности
			$count10 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count11 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			$count12 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('status', 0)
				->count();
			// Организация аэропортовой деятельности
			$count13 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count14 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			$count15 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('status', 0)
				->count();
			// Технология транспортных процессов в авиации
			$countTTPA1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$countTTPA2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			$countTTPA3 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count17 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			$count18 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('status', 0)
				->count();
			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count20 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			$count21 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('status', 0)
				->count();
			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count23 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			$count24 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('status', 0)
				->count();
			// Организация авиационных перевозок
			$count25 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count26 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			$count27 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('status', 0)
				->count();
			// Логистика на транспорте
			$count28 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count29 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();
			$count30 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('status', 0)
				->count();

			$sum1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('status', 0)
				->count();
			$sum2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('status', 0)
				->count();
			$sum3 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('status', 0)
				->count();

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15 + $countTTPA1 + $countTTPA2 + $countTTPA3;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			$total = $sum1 + $sum2 + $sum3;

			// МАГИСТРАТУРА
			$countMaster1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$countMaster3 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster4 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$countMaster5 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('status', 0)
				->count();
			$countMaster6 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('status', 0)
				->count();
			$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('status', 0)
				->count();

			$today = now('Asia/Almaty');
		}
		else {
			$count1 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count2 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count3 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
		$count4 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count5 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count6 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Обслуживание наземного радиоэлектронного оборудования аэропортов
		$count7 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count8 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count9 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Обеспечение авиационной безопасности
		$count10 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Обеспечение авиационной безопасности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count11 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Обеспечение авиационной безопасности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count12 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Обеспечение авиационной безопасности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Организация аэропортовой деятельности
		$count13 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Организация аэропортовой деятельности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count14 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Организация аэропортовой деятельности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count15 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Организация аэропортовой деятельности')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Технология транспортных процессов в авиации
		$countTTPA1 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Технология транспортных процессов в авиации')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countTTPA2 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Технология транспортных процессов в авиации')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countTTPA3 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Технология транспортных процессов в авиации')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
		$count16 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count17 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count18 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
		$count19 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count20 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count21 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Лётная эксплуатация гражданских вертолетов (пилот)
		$count22 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count23 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count24 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Организация авиационных перевозок
		$count25 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Организация авиационных перевозок')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count26 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Организация авиационных перевозок')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count27 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Организация авиационных перевозок')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		// Логистика на транспорте
		$count28 = Applications::select('*')
			->where('base', '11-го класса')
			->where('programms', 'Логистика на транспорте')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count29 = Applications::select('*')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('programms', 'Логистика на транспорте')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$count30 = Applications::select('*')
			->where('base', 'Высшего образования')
			->where('programms', 'Логистика на транспорте')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();

		$sum1 = Applications::select('*')
			->where('type', 'Бакалавриат')
			->where('base', '11-го класса')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$sum2 = Applications::select('*')
			->where('type', 'Бакалавриат')
			->where('base', 'Технического и профессионального образования (колледжа)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$sum3 = Applications::select('*')
			->where('type', 'Бакалавриат')
			->where('base', 'Высшего образования')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();

		$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15 + $countTTPA1 + $countTTPA2 + $countTTPA3;
		$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
		$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

		$total = $sum1 + $sum2 + $sum3;

		// МАГИСТРАТУРА
		$countMaster1 = Applications::select('*')
			->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countMaster2 = Applications::select('*')
			->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countMaster3 = Applications::select('*')
			->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countMaster4 = Applications::select('*')
			->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countMaster5 = Applications::select('*')
			->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$countMaster6 = Applications::select('*')
			->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();
		$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

		// ДОКТОРАНТУРА
		$countDoctoral = Applications::select('*')
			->where('programms', 'Авиационная техника и технологии')
			->where('status', 0)
			->whereDate('created_at', '>=', $created_at_from)
			->whereDate('created_at', '<=', $created_at_to)
			->count();

		$today = now('Asia/Almaty');
		}


		$array = [
			'count1' => $count1,
			'count2' => $count2,
			'count3' => $count3,
			'count4' => $count4,
			'count5' => $count5,
			'count6' => $count6,
			'count7' => $count7,
			'count8' => $count8,
			'count9' => $count9,
			'count10' => $count10,
			'count11' => $count11,
			'count12' => $count12,
			'count13' => $count13,
			'count14' => $count14,
			'count15' => $count15,
			'countTTPA1' => $countTTPA1,
			'countTTPA2' => $countTTPA2,
			'countTTPA3' => $countTTPA3,
			'count16' => $count16,
			'count17' => $count17,
			'count18' => $count18,
			'count19' => $count19,
			'count20' => $count20,
			'count21' => $count21,
			'count22' => $count22,
			'count23' => $count23,
			'count24' => $count24,
			'count25' => $count25,
			'count26' => $count26,
			'count27' => $count27,
			'count28' => $count28,
			'count29' => $count29,
			'count30' => $count30,
			'sum1' => $sum1,
			'sum2' => $sum2,
			'sum3' => $sum3,
			'total' => $total,
			'sum1_5' => $sum1_5,
			'sum6_8' => $sum6_8,
			'sum9_10' => $sum9_10,
			'countMaster1' => $countMaster1,
			'countMaster2' => $countMaster2,
			'countMaster3' => $countMaster3,
			'countMaster4' => $countMaster4,
			'countMaster5' => $countMaster5,
			'countMaster6' => $countMaster6,
			'totalMaster' => $totalMaster,
			'countDoctoral' => $countDoctoral,
			'today' => $today,
			'created_at_from' => $created_at_from,
			'created_at_to' => $created_at_to
		];
		$pdfName = 'Общий отчёт на ' . date('d.m.Y h:i', strtotime($today)) . '.pdf';

		$pdf = PDF::loadView('admin.enrollee.report.general.pdf', $array)->setOptions(['default-font' => 'sans-serif']);
		$pdf->setPaper('A4', 'landscape');
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
