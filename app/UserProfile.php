<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ["user_id", "level", "image", "about", "total_game", "total_win", "total_draw", "score", 'gold'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
