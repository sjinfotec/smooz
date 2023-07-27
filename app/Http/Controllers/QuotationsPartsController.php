<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\QuotationsParts;

class QuotationsPartsController extends Controller
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
        return view('quotationsparts',
            compact(
                'pagenum',
                'pagename',
                'partsview'
            ));
    }


    /** Parts取得
     *
     * @return list results
     */
    public function getPartsData(Request $request){
        $this->array_messagedata = array();
        $result = true;
        try {

            // パラメータチェック
            $params = array();
            $params = $request->keyparams;
            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            //Log::debug("getDataSearch s_m_code = ".$s_m_code);

            $quotationsparts = new QuotationsParts();
            if(isset($s_m_code))      $quotationsparts->setParamM_codeAttribute($s_m_code);
            $details_parts =  $quotationsparts->getParts();


            return response()->json(
                [
                    'result' => $result, 
                    's_m_code' => $s_m_code, 
                    'details_parts' => $details_parts,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata
                ]
            );


        }catch(\PDOException $pe){
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.Config::get('const.LOG_MSG.unknown_error'));
            Log::error($e->getMessage());
            throw $e;
        }

    }



}
