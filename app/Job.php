<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function qualifications()
    {
        return $this->belongsToMany(Qualification::class);
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
