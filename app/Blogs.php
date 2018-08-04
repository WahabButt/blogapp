<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $fillable =['user_id', 'title', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
