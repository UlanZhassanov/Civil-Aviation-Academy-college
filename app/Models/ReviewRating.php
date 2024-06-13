<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ReviewRating extends Model
{
	use Sluggable;

	protected $fillable = [
		'id',
		'booking_id',
		'comments',
		'star_rating',
		'status'
	];


	public function sluggable(): array
	{
		return [
			'slug' => [
				'source' => 'id', 'booking_id', 'comments', 'star_rating', 'status'
				]
		];
	}

	public function getLink()
	{
		return url($this->slug);
	}
}
