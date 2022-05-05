<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use willvincent\Rateable\Rateable;

class CategoryTvshow extends Model
{
    use HasFactory,Sluggable;
    protected $guarded = [
        'id'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function tvshows()
    {
        return $this->BelongsToMany(TvShow::class,'category_tvshow_tv_show');
    }

}
