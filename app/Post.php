<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $guarded = ['id'];

    // $post->user
    // dohvati usera koji je kreirao post
    public function user(){
        return $this->belongsTo(User::class);
    }

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // $post->comments
    // dohvati sve komentare za post
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public static function popular(){
        return self::orderBy('views', 'desc')->limit(5)->get();
    }
}
