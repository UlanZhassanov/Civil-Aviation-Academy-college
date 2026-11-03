<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
	use Sluggable;
	
	protected $fillable = [
		'titles',
		'descriptions',
		'bg_images',
		'more_images',
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

	public function decodeSerialized($value, $field = '')
	{
		if (!is_string($value) || $value === '') {
			return null;
		}

		$warning = null;
		set_error_handler(function ($severity, $message) use (&$warning) {
			$warning = $message;
			return true;
		});

		try {
			$decoded = unserialize($value);
		} finally {
			restore_error_handler();
		}

		if ($warning !== null || $decoded === false) {
			Log::warning('Invalid serialized news field.', [
				'news_id' => $this->id ?? null,
				'field' => $field,
				'error' => $warning,
			]);
			return null;
		}

		return $decoded;
	}
}
