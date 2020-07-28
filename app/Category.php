<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'category';

	protected $_guarded = [];

	public function products()
	{
		return $this->belongsToMany(Product::class);
	}

	public function setActiveCategory($category, $output = 'active')
	{
		return request()->category == $category ? $output : '';
	}
}
