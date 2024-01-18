<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // fonction pour rediriger vers welcome.blade.php
    public function welcome()
    {
        return view('welcome');
    }

    // fonction pour rediriger vers dashboard.blade.php
    public function dashboard()
    {
        return view('dashboard');
    }

    
}
