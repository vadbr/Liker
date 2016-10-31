<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Post extends Model
{

    protected $fillable = ['body'];
    protected $appends = ['likeCount', 'likedByCurrentUser'];

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }


    public function getLikeCountAttribute()
    {
        return $this->likes->count();
    }


    public function getLikedByCurrentUserAttribute()
    {
        if (!Auth::check()) {
            return false;
        }
        return $this->likes->where('user_id', Auth::user()->id)->count() === 1;
    }


    public function getCanBeLikedByCurrentUserAttribute()
    {
        //7
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

}
