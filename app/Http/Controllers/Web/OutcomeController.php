<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class OutcomeController extends Controller
{
    public function index()
    {
        return view('admin.outcomes');
    }
}
