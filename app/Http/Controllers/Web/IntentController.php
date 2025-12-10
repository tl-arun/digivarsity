<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class IntentController extends Controller
{
    public function index()
    {
        return view('admin.intents');
    }
}
