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
}
