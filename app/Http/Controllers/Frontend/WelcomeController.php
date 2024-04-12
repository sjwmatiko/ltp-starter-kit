<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return view(config('system.paths.frontend.base') . 'welcome');
    }
}
