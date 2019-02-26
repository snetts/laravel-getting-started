<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{   
    protected $guarded = [];

    public function projects() {
        return $this->belongsTo(Projects::class);
    }

    public function complete($completed = true) {
        $this->update(['completed' => $completed]);
    }

    public function incomplete() {
        $this->complete(false);
    }
}
