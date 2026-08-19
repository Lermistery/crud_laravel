<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Mengarahkan ke file resources/views/projects/index.blade.php
        return view('projects.index');
    }

    public function create()
    {
        // Mengarahkan ke file resources/views/projects/nejects.blade.php
        return view('projects.nejects');
    }
}
