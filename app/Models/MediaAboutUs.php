<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class MediaAboutUs extends Model
{
	// use Sluggable;

	// protected $fillable = [
	// 	'titles',
	// 	'descriptions',
	// 	'bg_images',
	// 	'more_images',
	// ];


	// public function sluggable(): array
	// {
	// 	return [
	// 		'slug' => [
	// 			'source' => $this->titles
	// 		]
	// 	];
	// }

	public function getLink()
	{
		return url($this->slug);
	}
}
