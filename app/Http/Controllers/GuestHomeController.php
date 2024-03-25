<?php

namespace App\Http\Controllers;

use App\Models\Project;


use Illuminate\Http\Request;

class GuestHomeController extends Controller
{
    public function __invoke()
    {
        $projects = Project::all();
        return view('guest.home', compact('projects'));
    }
}
