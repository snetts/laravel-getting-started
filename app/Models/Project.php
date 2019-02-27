<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tasks;

class Project extends Model
{
    // protecting the form field from manipulation equal to protected fillable but be careful to not request all fields in the Controller
    protected $guarded = [];

    public function tasks() {
        return $this->hasMany(Tasks::class);
    }

    public function owner()
    {
        return $this->belongsTo(\App\User::class);
    }


    // code nelow works fine and is recommended but I don't want to write code twice
    // public function addTask($tasks) {
    //     $this->tasks()->create($tasks);
    // }
}
