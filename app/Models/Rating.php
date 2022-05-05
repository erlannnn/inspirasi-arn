<?php

namespace App;

use App\Models\User;
use App\Models\TvShow;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $table = 'ratings';

    public $fillable = ['rating', 'rateable_id', 'user_id'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tvshow()
    {
        return $this->belongsTo(TvShow::class);
    }

}