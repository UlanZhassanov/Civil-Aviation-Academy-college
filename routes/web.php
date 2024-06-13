<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

Auth::routes(['register' => false]);

// ADMIN
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

	// HOME PAGE
	Route::resource('', 'HomeController');
	Route::group(['prefix' => 'department', 'namespace' => 'Department', 'as' => 'department.'], function () {
		Route::resources([
			'teacher' => 'DepartmentTeacherController',
		]);
	});

	// WEBSITE
	Route::group(['prefix' => 'website', 'namespace' => 'Website', 'as' => 'website.'], function () {
		Route::resources([
			'navigation' => 'NavigationController',
			'library_navigation' => 'LibraryNavigationController',
			'pages' => 'PageController',
			'books' => 'BooksController',
			'book_collection' => 'BookCollectionController',
			'library_pages' => 'LibraryController',
			'news' => 'NewsController',
			'library_news' => 'LibraryNewsController',
			'media_about_us' => 'MediaAboutUsController',
			'studevents' => 'StudEventsController',
			'events' => 'EventController',
			'department' => 'DepartmentController',
			'department-page' => 'DepartmentPageController',
		]);

		// CK EDITOR
		Route::post('pages/upload', 'PageController@upload')->name('pages.upload');
		Route::post('department-page/upload', 'DepartmentPageController@upload')->name('department-page.upload');
		/* Route::post('images', 'ImageController@store')->name('images.store'); */
	});

	// WORKERS
	Route::group(['namespace' => 'Workers'], function () {
		Route::resources([
			'workers' => 'WorkersController',
			'workers-permissions' => 'WorkersPermissionsController',
			'workerpage' => 'WorkerPageController',
			'worker_department_page' => 'WorkerDepartmentPageController',
		]);
	});

	// ENROLLEE
	Route::group(['prefix' => 'enrollee', 'namespace' => 'Enrollee', 'as' => 'enrollee.'], function () {
		Route::resources([
			'bachelor' => 'BachelorController',
			'master' => 'MasterController',
			'doctoral' => 'DoctoralController',
			'deleted' => 'DeletedController',
			'documents' => 'DocumentsController',
		]);


        //Documents
		Route::get('pdf', 'DocumentsController@pdf')->name('documents.pdf');
		Route::get('pdfdocs', 'DocumentsController@pdfdocs')->name('documents.pdfdocs');
		Route::get('documents', 'DocumentsController@index')->name('documents.index');
		Route::get('documents/word-statements/{id}', 'DocumentsController@wordExportStatements')->name('documents.wordExportStatements');
		Route::get('documents/word-bilateralAgreement/{id}', 'DocumentsController@wordExportBilateralAgreement')->name('documents.wordExportBilateralAgreement');
		Route::get('documents/word-stateGrantAgreement/{id}', 'DocumentsController@wordExportStateGrantAgreement')->name('documents.wordExportStateGrantAgreement');
		Route::get('documents/word-applicationForCredits/{id}', 'DocumentsController@wordExportApplicationForCredits')->name('documents.wordExportApplicationForCredits');

		// General Report
		Route::get('greport', 'GReportController@index')->name('greport.index');
		Route::get('greport/pdf', 'GReportController@pdf')->name('greport.pdf');
		Route::get('greport/pdf/{created_at_from}/{created_at_to}', 'GReportController@pdf')->name('greport.pdf');
		// Reception Report
		Route::get('rreport', 'RReportController@index')->name('rreport.index');
		Route::get('rreport/pdf', 'RReportController@pdf')->name('rreport.pdf');
		Route::get('rreport/pdf/{created_at_from}/{created_at_to}', 'RReportController@pdf')->name('rreport.pdf');
	});

	// GRADUATE
	Route::group(['prefix' => 'graduate', 'namespace' => 'Graduate', 'as' => 'graduate.'], function () {
		// Route::resource('graduates', 'GraduateController');
		Route::get('graduates/index', 'GraduateController@index')->name('graduates.index');
		Route::get('graduates/index_new', 'GraduateController@index_new')->name('graduates.index_new');
		Route::get('graduates/create', 'GraduateController@create')->name('graduates.create');
		Route::get('graduates/create_new', 'GraduateController@create_new')->name('graduates.create_new');
		Route::post('graduates/store', 'GraduateController@store')->name('graduates.store');
		Route::post('graduates/store_new', 'GraduateController@store_new')->name('graduates.store_new');
		Route::put('graduates/update', 'GraduateController@update')->name('graduates.update');
		Route::delete('graduates/destroy/{id}', 'GraduateController@destroy')->name('graduates.destroy');

		Route::get('report', 'ReportController@index')->name('report.index');
		Route::get('report/index_new', 'ReportController@index_new')->name('report.index_new');
		Route::get('pdf/{graduation_year}', 'ReportController@pdf')->name('report.pdf');
		Route::get('pdf_new', 'ReportController@pdf_new')->name('report.pdf_new');
		Route::get('excel', 'ReportController@excel')->name('report.excel');
	});

	// VACCINATION
	Route::group(['prefix' => 'vaccination', 'namespace' => 'Vaccination', 'as' => 'vaccination.'], function () {
		Route::resource('', 'VaccinationController');
	});
});

// FRONTEND
Route::group(['namespace' => 'Front', 'as' => 'front.'], function () {
	// HOMEPAGE
	Route::get('', 'HomeController@index')->name('home');
	Route::get('centerava','CenterController@index')->name('centerava');
	Route::get('training_centers','TrainingCenterController@index')->name('training_centers');
	Route::get('library','BooksController@index')->name('library');
	Route::get('virtual_admission','VirtualAdmissionController@index')->name('virtual_admission');
	Route::get('news', 'NewsController@index')->name('news');
	Route::get('news/{slug}', 'NewsController@show')->name('news.show');
	Route::get('library/library_news', 'LibraryNewsController@index')->name('library_news');
	Route::get('library/library_news/{slug}', 'LibraryNewsController@show')->name('library_news.show');
	Route::get('library/{libpage}', 'LibraryController@show')->name('library_pages');
	Route::get('media_about_us', 'MediaAboutUsController@index')->name('media_about_us');
	Route::get('media_about_us/{slug}', 'MediaAboutUsController@show')->name('media_about_us.show');
	Route::get('newsCompliance', 'NewsComplianceController@index')->name('newsCompliance');
	Route::get('newsCompliance/{slug}', 'NewsComplianceController@show')->name('newsCompliance.show');
	Route::get('studevents', 'StudEventsController@index')->name('studevents');
	Route::get('studevents/{slug}', 'StudEventsController@show')->name('studevents.show');
	Route::get('events', 'EventController@index')->name('events');
	Route::get('events/{slug}', 'EventController@show')->name('events.show');
	// ENROLLEE
	Route::group(['prefix' => 'enrollee', 'namespace' => 'Enrollee', 'as' => 'enrollee.'], function () {
		Route::resources([
			'bachelor' => 'BachelorController',
			'master' => 'MasterController',
			'doctoral' => 'DoctoralController',
		]);
		Route::get('', 'EnrolleeController@index');
	});


	// DEPARTMENT
	Route::group(['namespace' => 'Department'], function () {
		Route::resources([
			'departments' => 'DepartmentController',
		]);
		Route::group(['prefix' => 'departments', 'as' => 'department.'], function () {
			Route::get('{department}/{history}', 'DepartmentController@history')->name('history.index');
			Route::get('{department}/teachers', 'DepartmentController@teachers')->name('teachers.index');
			Route::get('{department}/teachers/{teacher}', 'DepartmentController@teacher')->name('teachers.show');
		});
	});

    // // LIBRARY
	// Route::group(['namespace' => 'Library'], function () {
	// 	Route::resources([
	// 		'library' => 'LibraryController',
	// 	]);
	// 	Route::group(['prefix' => 'library', 'as' => 'library.'], function () {
	// 		Route::get('library/{libpage}', 'LibraryController@libpage')->name('libpage.index');
	// 	});
	// });

	// PAGES
	Route::get('{page}', 'PageController@show')->name('pages');
	Route::post('review-store', 'ReviewRatingController@store')->name('review.store');
	Route::get('review-show', 'ReviewRatingController@index')->name('review.index');
	// LANGUAGE SWITCHER
	Route::get('/language/{locale}', function ($locale) {
		app()->setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	});
});
