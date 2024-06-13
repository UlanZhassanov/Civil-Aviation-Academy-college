<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
	use Sluggable;

	protected $fillable = [
		'title_ru', 
		'title_kz',
		'title_en', 
		'desc_ru', 
		'desc_kz', 
		'desc_en'
	];

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'title_ru'
			]
		];
	}

	public function getLink()
	{
		return url($this->slug);
	}

	public function pages()
	{
		return $this->hasMany('App\Website\Page');
	}

	public static function userInfo()
	{
		$userInfo = WorkersInfo::select('department')
		->where('user_id', Auth::user()->id)
		->first();

		return $userInfo;
	}
}
