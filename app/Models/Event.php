<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
	use Sluggable;

	protected $fillable = [
		'titles',
		'descriptions'
	];


	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => $this->titles
			]
		];
	}
}
