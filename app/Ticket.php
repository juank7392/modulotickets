<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	protected $fillable = ['title', 'priority', 'date_assignment', 'user_assigned', 'content', 'slug', 'status', 'user_id'];
		public function comments()
		{
			return $this->hasMany('App\Comment', 'post_id');
		}
}
