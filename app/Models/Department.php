<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model
{
	use Sluggable;

	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => $this->name
			]
		];
	}
}