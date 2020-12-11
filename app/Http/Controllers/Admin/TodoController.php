<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function add()
    {
        return view('todo/create'); 
        //resourse/views/todo/create.blade.php
    }
}
