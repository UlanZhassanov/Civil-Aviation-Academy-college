<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Navigation extends Model
{
	use HasFactory;

	public static function userInfo()
	{
		$userInfo = WorkersInfo::select('department')
			->where('user_id', Auth::user()->id)
			->first();

		return $userInfo;
	}

	public static function tree()
	{
		$allNavigations = Navigation::where('active', true)->orderBy('sort', 'asc')->get();

		$rootNavigations = $allNavigations->whereNull('parrent_id');

		self::formatTree($rootNavigations, $allNavigations);

		return $rootNavigations;
	}

	public static function treeCollege()
	{
		$allNavigations = Navigation::where(['active' => true, 'college' => true])->orderBy('sort', 'asc')->get();

		$rootNavigations = $allNavigations->whereNull('parrent_id');

		self::formatTree($rootNavigations, $allNavigations);

		return $rootNavigations;
	}

	private static function formatTree($navigations, $allNavigations)
	{
		foreach ($navigations as $navigation) {
			$navigation->children = $allNavigations->where('parrent_id', $navigation->id)->values();

			if ($navigation->children->isNotEmpty()) {
				self::formatTree($navigation->children, $allNavigations);
			}
		}
	}
}
