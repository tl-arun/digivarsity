<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    public function index()
    {
        return view('admin.leads');
    }
}
