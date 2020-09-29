<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["content", "category_id"];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
