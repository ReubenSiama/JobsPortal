<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
