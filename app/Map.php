<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Map extends Model
{
    protected $fillable = ['user_id', 'title' , 'slug', 'description', 'map_data', 'published'];

    //Mutators
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug(mb_substr($this->title, 0, 40). "-" . \Carbon\Carbon::now()->format('dmiHy'), '-');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function maps()
    {
        return $this->hasMany('App\MapsPhoto');
    }
}
