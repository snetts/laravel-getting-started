<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class CompletedTasksController extends Controller
{
    public function store(Tasks $tasks) {
        $tasks->complete();

        return back();
    }

    public function destroy(Tasks $tasks) {
        $tasks->incomplete();

        return back();
    }
}
