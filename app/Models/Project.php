<?php

namespace App\Models;

use App\Models\Tasks;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // protecting the form field from manipulation equal to protected fillable but be careful to not request all fields in the Controller
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }

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
