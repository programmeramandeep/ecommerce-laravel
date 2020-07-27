<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
		'name', 'slug', 'details', 'price', 'description', 'featured', 'quantity', 'image', 'images'
	];

	public function presentPrice()
	{
		return moneyFormat($this->price, 'INR');
	}

	public function scopeMightAlsoLike($query)
	{
		return $query->inRandomOrder()->take(6);
	}

	public function categories()
	{
		return $this->belongsToMany(Category::class)->withTimestamps();
	}
}
