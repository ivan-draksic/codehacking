<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Sluggable configuration.
     *
     * @var array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source'         => 'title',
                'separator'      => '-',
                'includeTrashed' => true,
            ]
        ];
    }

    
    public function user(){

    	return $this->belongsTo('App\User');
    }

    public function photo(){

    	return $this->belongsTo('App\Photo');
    }

    public function category(){

    	return $this->belongsTo('App\Category');
    }

    public function comments(){
        
    return $this->hasMany('App\Comment');
  }

public function photoPlaceHolder(){

        return "http://placehold.it/700x200";
    }
}
