<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Favoritable
{


    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorited');
    }

    public function favorite()
    {
        $attribute = ['user_id' => auth()->id()];

        if (! $this->favorites()->where($attribute)->exists()){
        return $this->favorites()->create($attribute);
        }
    }

    public function isFavorited()
    {
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
    
}