<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Date\Date;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer(['front.inc.top_bar','front.inc.header'],  function ($view) {
			$view->with('current_locale', app()->getLocale());
			$view->with('available_locales', config('app.available_locales'));
		});

        Date::setlocale(config('app.locale'));
	}
}
