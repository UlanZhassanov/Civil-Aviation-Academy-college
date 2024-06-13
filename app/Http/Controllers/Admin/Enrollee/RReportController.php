<?php

namespace App\Http\Controllers\Admin\Enrollee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applications;
use PDF;

class RReportController extends Controller
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
		if (!isset($created_at_from) || !isset($created_at_to)) {
			// БАКАЛАВРИАТ
			// Техническая эксплуатация летательных аппаратов и двигателей
			$count1_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count1_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count1 = $count1_1 + $count1_2;

			$count2_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count2_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count2 = $count2_1 + $count2_2;

			$count3_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count3_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count3 = $count3_1 + $count3_2;

			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count4_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count4 = $count4_1 + $count4_2;

			$count5_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count5_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count5 = $count5_1 + $count5_2;

			$count6_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count6_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count6 = $count6_1 + $count6_2;

			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count7_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count7 = $count7_1 + $count7_2;

			$count8_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count8_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count8 = $count8_1 + $count8_2;

			$count9_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count9_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count9 = $count9_1 + $count9_2;

			// Обеспечение авиационной безопасности
			$count10_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count10_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count10 = $count10_1 + $count10_2;

			$count11_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count11_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count11 = $count11_1 + $count11_2;

			$count12_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count12_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count12 = $count12_1 + $count12_2;

			// Организация аэропортовой деятельности
			$count13_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count13_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count13 = $count13_1 + $count13_2;

			$count14_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count14_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count14 = $count14_1 + $count14_2;

			$count15_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count15_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count15 = $count15_1 + $count15_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count16_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count16 = $count16_1 + $count16_2;

			$count17_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count17_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count17 = $count17_1 + $count17_2;

			$count18_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count18_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count18 = $count18_1 + $count18_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count19_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count19 = $count19_1 + $count19_2;

			$count20_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count20_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count20 = $count20_1 + $count20_2;

			$count21_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count21_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count21 = $count21_1 + $count21_2;

			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count22_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count22 = $count22_1 + $count22_2;

			$count23_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count23_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count23 = $count23_1 + $count23_2;

			$count24_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count24_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count24 = $count24_1 + $count24_2;

			// Организация авиационных перевозок
			$count25_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count25_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count25 = $count25_1 + $count25_2;

			$count26_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count26_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count26 = $count26_1 + $count26_2;

			$count27_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count27_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count27 = $count27_1 + $count27_2;

			// Логистика на транспорте
			$count28_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count28_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count28 = $count28_1 + $count28_2;

			$count29_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count29_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count29 = $count29_1 + $count29_2;

			$count30_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count30_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count30 = $count30_1 + $count30_2;

			$count31_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count31_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count31 = $count31_1 + $count31_2;

			$count32_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count32_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count32 = $count32_1 + $count32_2;

			$count33_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count33_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count33 = $count33_1 + $count33_2;

			$sum1_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum1_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum1 = $sum1_1 + $sum1_2;

			$sum2_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum2_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum2 = $sum2_1 + $sum2_2;

			$sum3_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum3_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum3 = $sum3_1 + $sum3_2;

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			$total = $sum1 + $sum2 + $sum3;

			// МАГИСТРАТУРА
			$countMaster1_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster1_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster1 = $countMaster1_1 + $countMaster1_2;

			$countMaster2_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster2_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster2 = $countMaster2_1 + $countMaster2_2;

			$countMaster3_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster3_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster3 = $countMaster3_1 + $countMaster3_2;

			$countMaster4_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster4_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster4 = $countMaster4_1 + $countMaster4_2;

			$countMaster5_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster5_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster5 = $countMaster5_1 + $countMaster5_2;

			$countMaster6_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster6_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster6 = $countMaster6_1 + $countMaster6_2;

			$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countDoctoral_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countDoctoral = $countDoctoral_1 + $countDoctoral_2;
		} 
		else {
				$count1_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count1_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count1 = $count1_1 + $count1_2;

			$count2_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count2_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count2 = $count2_1 + $count2_2;

			$count3_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count3_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count3 = $count3_1 + $count3_2;

			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count4_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count4 = $count4_1 + $count4_2;

			$count5_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count5_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count5 = $count5_1 + $count5_2;

			$count6_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count6_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count6 = $count6_1 + $count6_2;

			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count7_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count7 = $count7_1 + $count7_2;

			$count8_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count8_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count8 = $count8_1 + $count8_2;

			$count9_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count9_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count9 = $count9_1 + $count9_2;

			// Обеспечение авиационной безопасности
			$count10_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count10_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count10 = $count10_1 + $count10_2;

			$count11_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count11_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count11 = $count11_1 + $count11_2;

			$count12_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count12_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count12 = $count12_1 + $count12_2;

			// Организация аэропортовой деятельности
			$count13_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count13_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count13 = $count13_1 + $count13_2;

			$count14_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count14_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count14 = $count14_1 + $count14_2;

			$count15_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count15_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count15 = $count15_1 + $count15_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count16_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count16 = $count16_1 + $count16_2;

			$count17_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count17_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count17 = $count17_1 + $count17_2;

			$count18_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count18_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count18 = $count18_1 + $count18_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count19_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count19 = $count19_1 + $count19_2;

			$count20_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count20_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count20 = $count20_1 + $count20_2;

			$count21_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count21_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count21 = $count21_1 + $count21_2;

			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count22_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count22 = $count22_1 + $count22_2;

			$count23_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count23_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count23 = $count23_1 + $count23_2;

			$count24_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count24_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count24 = $count24_1 + $count24_2;

			// Организация авиационных перевозок
			$count25_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count25_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count25 = $count25_1 + $count25_2;

			$count26_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count26_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count26 = $count26_1 + $count26_2;

			$count27_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count27_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count27 = $count27_1 + $count27_2;

			// Логистика на транспорте
			$count28_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count28_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count28 = $count28_1 + $count28_2;

			$count29_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count29_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count29 = $count29_1 + $count29_2;

			$count30_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count30_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count30 = $count30_1 + $count30_2;

			$count31_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count31_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count31 = $count31_1 + $count31_2;

			$count32_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count32_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count32 = $count32_1 + $count32_2;

			$count33_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count33_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count33 = $count33_1 + $count33_2;

			$sum1_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum1_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum1 = $sum1_1 + $sum1_2;

			$sum2_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum2_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum2 = $sum2_1 + $sum2_2;

			$sum3_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum3_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum3 = $sum3_1 + $sum3_2;

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			$total = $sum1 + $sum2 + $sum3;

			// МАГИСТРАТУРА
			$countMaster1_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster1_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster1 = $countMaster1_1 + $countMaster1_2;

			$countMaster2_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster2_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster2 = $countMaster2_1 + $countMaster2_2;

			$countMaster3_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster3_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster3 = $countMaster3_1 + $countMaster3_2;

			$countMaster4_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster4_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster4 = $countMaster4_1 + $countMaster4_2;

			$countMaster5_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster5_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster5 = $countMaster5_1 + $countMaster5_2;

			$countMaster6_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster6_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster6 = $countMaster6_1 + $countMaster6_2;

			$totalMaster = $countMaster1 + $countMaster2 + $countMaster3 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countDoctoral_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countDoctoral = $countDoctoral_1 + $countDoctoral_2;
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
			'years' => $years,
			'created_at_from' => $created_at_from,
			'created_at_to' => $created_at_to
		];


		return view('admin.enrollee.report.reception.index', $array);
	}
	public function pdf($created_at_from, $created_at_to)
	{
		if($created_at_from == 0 || $created_at_to == 0){
			// БАКАЛАВРИАТ
			// Техническая эксплуатация летательных аппаратов и двигателей
			$count1_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count1_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count1 = $count1_1 + $count1_2;

			$count2_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count2_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count2 = $count2_1 + $count2_2;

			$count3_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count3_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count3 = $count3_1 + $count3_2;

			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count4_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count4 = $count4_1 + $count4_2;

			$count5_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count5_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count5 = $count5_1 + $count5_2;

			$count6_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count6_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count6 = $count6_1 + $count6_2;

			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count7_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count7 = $count7_1 + $count7_2;

			$count8_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count8_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count8 = $count8_1 + $count8_2;

			$count9_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count9_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count9 = $count9_1 + $count9_2;

			// Обеспечение авиационной безопасности
			$count10_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count10_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count10 = $count10_1 + $count10_2;

			$count11_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count11_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count11 = $count11_1 + $count11_2;

			$count12_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count12_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count12 = $count12_1 + $count12_2;

			// Организация аэропортовой деятельности
			$count13_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count13_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count13 = $count13_1 + $count13_2;

			$count14_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count14_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count14 = $count14_1 + $count14_2;

			$count15_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count15_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count15 = $count15_1 + $count15_2;

			// Технология транспортных процессов в авиации	
			$countTTPA1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countTTPA2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countTTPA3 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count16_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count16 = $count16_1 + $count16_2;

			$count17_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count17_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count17 = $count17_1 + $count17_2;

			$count18_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count18_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count18 = $count18_1 + $count18_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count19_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count19 = $count19_1 + $count19_2;

			$count20_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count20_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count20 = $count20_1 + $count20_2;

			$count21_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count21_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count21 = $count21_1 + $count21_2;

			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count22_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count22 = $count22_1 + $count22_2;

			$count23_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count23_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count23 = $count23_1 + $count23_2;

			$count24_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count24_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count24 = $count24_1 + $count24_2;

			// Организация авиационных перевозок
			$count25_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count25_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count25 = $count25_1 + $count25_2;

			$count26_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count26_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count26 = $count26_1 + $count26_2;

			$count27_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count27_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count27 = $count27_1 + $count27_2;

			// Логистика на транспорте
			$count28_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count28_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count28 = $count28_1 + $count28_2;

			$count29_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count29_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count29 = $count29_1 + $count29_2;

			$count30_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$count30_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$count30 = $count30_1 + $count30_2;

			$sum1_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum1_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum1 = $sum1_1 + $sum1_2;

			$sum2_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum2_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum2 = $sum2_1 + $sum2_2;

			$sum3_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$sum3_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$sum3 = $sum3_1 + $sum3_2;

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15 + $countTTPA1 + $countTTPA2 + $countTTPA3;;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			$total = $sum1 + $sum2 + $sum3;

			// МАГИСТРАТУРА
			$countMaster1_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster1_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster1 = $countMaster1_1 + $countMaster1_2;

			$countMaster2_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster2_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster2 = $countMaster2_1 + $countMaster2_2;

			$countMaster3_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster3_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster3 = $countMaster3_1 + $countMaster3_2;

			$countMaster4_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster4_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster4 = $countMaster4_1 + $countMaster4_2;

			$countMaster5_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster5_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster5 = $countMaster5_1 + $countMaster5_2;

			$countMaster6_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countMaster6_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countMaster6 = $countMaster6_1 + $countMaster6_2;

			$totalMaster = $countMaster1 + $countMaster2 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Обработанный')
				->where('status', 0)
				->count();
			$countDoctoral_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->count();
			$countDoctoral = $countDoctoral_1 + $countDoctoral_2;

			$today = now('Asia/Almaty');
		}
		else{
			// БАКАЛАВРИАТ
				// Техническая эксплуатация летательных аппаратов и двигателей
			$count1_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count1_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count1 = $count1_1 + $count1_2;

			$count2_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count2_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count2 = $count2_1 + $count2_2;

			$count3_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count3_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count3 = $count3_1 + $count3_2;

			// Техническая эксплуатация систем авионики летательных аппаратов и двигателей
			$count4_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count4_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count4 = $count4_1 + $count4_2;

			$count5_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count5_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count5 = $count5_1 + $count5_2;

			$count6_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count6_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Техническая эксплуатация систем авионики летательных аппаратов и двигателей')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count6 = $count6_1 + $count6_2;

			// Обслуживание наземного радиоэлектронного оборудования аэропортов
			$count7_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count7_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count7 = $count7_1 + $count7_2;

			$count8_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count8_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count8 = $count8_1 + $count8_2;

			$count9_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count9_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание наземного радиоэлектронного оборудования аэропортов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count9 = $count9_1 + $count9_2;

			// Обеспечение авиационной безопасности
			$count10_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count10_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count10 = $count10_1 + $count10_2;

			$count11_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count11_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count11 = $count11_1 + $count11_2;

			$count12_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count12_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обеспечение авиационной безопасности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count12 = $count12_1 + $count12_2;

			// Организация аэропортовой деятельности
			$count13_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count13_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count13 = $count13_1 + $count13_2;

			$count14_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count14_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count14 = $count14_1 + $count14_2;

			$count15_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count15_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация аэропортовой деятельности')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count15 = $count15_1 + $count15_2;
			// Технология транспортных процессов в авиации	
			$countTTPA1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countTTPA2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countTTPA3 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Технология транспортных процессов в авиации')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count16_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count16_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count16 = $count16_1 + $count16_2;

			$count17_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count17_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count17 = $count17_1 + $count17_2;

			$count18_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count18_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count18 = $count18_1 + $count18_2;

			// Обслуживание воздушного движения и аэронавигационное обеспечение полетов
			$count19_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count19_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count19 = $count19_1 + $count19_2;

			$count20_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count20_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count20 = $count20_1 + $count20_2;

			$count21_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count21_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских самолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count21 = $count21_1 + $count21_2;

			// Лётная эксплуатация гражданских вертолетов (пилот)
			$count22_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count22_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count22 = $count22_1 + $count22_2;

			$count23_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count23_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count23 = $count23_1 + $count23_2;

			$count24_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count24_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Лётная эксплуатация гражданских вертолетов (пилот)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count24 = $count24_1 + $count24_2;

			// Организация авиационных перевозок
			$count25_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count25_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count25 = $count25_1 + $count25_2;

			$count26_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count26_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count26 = $count26_1 + $count26_2;

			$count27_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count27_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Организация авиационных перевозок')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count27 = $count27_1 + $count27_2;

			// Логистика на транспорте
			$count28_1 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count28_2 = Applications::select('*')
				->where('base', '11-го класса')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count28 = $count28_1 + $count28_2;

			$count29_1 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count29_2 = Applications::select('*')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count29 = $count29_1 + $count29_2;

			$count30_1 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count30_2 = Applications::select('*')
				->where('base', 'Высшего образования')
				->where('programms', 'Логистика на транспорте')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$count30 = $count30_1 + $count30_2;

			$sum1_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum1_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', '11-го класса')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum1 = $sum1_1 + $sum1_2;

			$sum2_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum2_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Технического и профессионального образования (колледжа)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum2 = $sum2_1 + $sum2_2;

			$sum3_1 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum3_2 = Applications::select('*')
				->where('type', 'Бакалавриат')
				->where('base', 'Высшего образования')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$sum3 = $sum3_1 + $sum3_2;

			$sum1_5 = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15 + $countTTPA1 + $countTTPA2 + $countTTPA3;
			$sum6_8 = $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24;
			$sum9_10 = $count25 + $count26 + $count27 + $count28 + $count29 + $count30;

			$total = $sum1 + $sum2 + $sum3;

			// МАГИСТРАТУРА
			$countMaster1_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster1_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster1 = $countMaster1_1 + $countMaster1_2;

			$countMaster2_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster2_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster2 = $countMaster2_1 + $countMaster2_2;

			$countMaster3_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster3_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster3 = $countMaster3_1 + $countMaster3_2;

			$countMaster4_1 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster4_2 = Applications::select('*')
				->where('programms', 'Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster4 = $countMaster4_1 + $countMaster4_2;

			$countMaster5_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster5_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster5 = $countMaster5_1 + $countMaster5_2;

			$countMaster6_1 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster6_2 = Applications::select('*')
				->where('programms', 'Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countMaster6 = $countMaster6_1 + $countMaster6_2;

			$totalMaster = $countMaster1 + $countMaster2 + $countMaster4 + $countMaster5 + $countMaster6;

			// ДОКТОРАНТУРА
			$countDoctoral_1 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Обработанный')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countDoctoral_2 = Applications::select('*')
				->where('programms', 'Авиационная техника и технологии')
				->where('process', 'Сдал документы')
				->where('status', 0)
				->whereDate('created_at', '>=', $created_at_from)
				->whereDate('created_at', '<=', $created_at_to)
				->count();
			$countDoctoral = $countDoctoral_1 + $countDoctoral_2;

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
		$pdfName = 'Отчёт по приёму ' . date('d.m.Y h:i', strtotime($today)) . '.pdf';
		$pdf = PDF::loadView('admin.enrollee.report.reception.pdf', $array)->setOptions(['default-font' => 'sans-serif']);
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
