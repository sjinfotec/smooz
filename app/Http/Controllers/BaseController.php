<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function base()
    {
         $authusers = Auth::user();

        return view('base',
            compact(
                'authusers'
            ));

    }

}
