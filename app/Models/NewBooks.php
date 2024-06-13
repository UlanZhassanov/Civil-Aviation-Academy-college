<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class NewBooks extends Model
{
	use Sluggable;

	protected $fillable = [
		'titles',
		'authors',
		'descriptions',
		'bg_images',
	];


	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => $this->titles
			]
		];
	}

	public function getLink()
	{
		return url($this->slug);
	}
}
