<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AdminHomeController extends Controller
{
    public function __invoke()
    {
        $projects = Project::all();
        return view('admin.home', compact('projects'));
    }
}