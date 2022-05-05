<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use willvincent\Rateable\Rateable;
// use App\Models\Rating;
use willvincent\Rateable\Rating;

class TvShow extends Model
{
    
    protected $guarded = [
        'id'
    ];
    use HasFactory, Sluggable, Rateable;
    public static function rules($request_slug=False,$tvshow_slug=False)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'sampul' => 'image|file|max:2028'
        ];
        if ($tvshow_slug != $request_slug){
            $rules['slug'] = 'required|unique:tv_shows';
        }
        return $rules;

    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function rating()
    {
        // return $this->hasMany(Rating::class);
        return $this->morphMany('Rating', 'rateable');
    }
    public function categories()
    {
        return $this->belongsToMany(CategoryTvshow::class,'category_tvshow_tv_show');
    }
    public function genres()
    {
        return $this->belongsToMany(Genre::class,'genre_tv_show');
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
