<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
