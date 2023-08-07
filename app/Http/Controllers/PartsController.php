<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PartsController extends Controller
{
    public function index(Request $request)
    {
        Log::debug('PartsController index in ');
        $params = $request->keyparams;
        Log::debug('PartsController index pagenum = '.$params['pagenum']);
        Log::debug('PartsController index pagename = '.$params['pagename']);
        Log::debug('PartsController index partsview = '.$params['partsview']);
        $pagenum = $params['pagenum'];
        $pagename = $params['pagename'];
        $partsview = $params['partsview'];
        $authusers = Auth::user();
        return view('parts',
            compact(
                'pagenum',
                'pagename',
                'partsview'
            ));
    }
    public function getitem(Request $request)
    {
        Log::debug('PartsController getitem in ');
        $params = $request->keyparams;
        Log::debug('PartsController getitem pagenum = '.$params['pagenum']);
        Log::debug('PartsController getitem pagename = '.$params['pagename']);
        Log::debug('PartsController getitem partsview = '.$params['partsview']);
        $pagenum = $params['pagenum'];
        $pagename = $params['pagename'];
        $partsview = $params['partsview'];
        $authusers = Auth::user();
        return view('parts',
            compact(
                'pagenum',
                'pagename',
                'partsview'
            ));
    }

}
