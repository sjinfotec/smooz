<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class QuotationsDepartmentController extends Controller
{
    public function index()
    {
        $authusers = Auth::user();
        return view('quotationsdepartment', compact('authusers'));
    }

}
