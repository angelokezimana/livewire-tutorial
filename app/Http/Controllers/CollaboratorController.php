<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function index()
    {
        return view('collaborators.index');
    }
}
