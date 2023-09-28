<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\QSearch;
//use App\Models\Generalcode;
use App\Models\Quotations;

class QAnotherlineController extends Controller
{
    public function index()
    {
        $authusers = Auth::user();
        return view('quotationsanotherline', compact('authusers')
        );
    }



    /** manager(担当)取得
     *
     * @return list results
     */
    public function getManagerData(Request $request){
        $this->array_messagedata = array();
        $result = true;
        try {

            // パラメータチェック
            $params = array();
            $params = $request->keyparams;
            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_manager = isset($params['s_manager']) ? $params['s_manager'] : "";
            //Log::debug("getDataSearch s_m_code = ".$s_m_code);

            $qsearch = new QSearch();
            //if(isset($s_m_code))      $quotationsparts->setParamM_codeAttribute($s_m_code);
            //if(isset($s_parts_code))      $quotationsparts->setParamParts_codeAttribute($s_parts_code);
            //$details_parts =  $quotationsparts->getParts();
            $details_manager =  $qsearch->getManager();


            return response()->json(
                [
                    'result' => $result, 
                    's_m_code' => $s_m_code, 
                    's_manager' => $s_manager,
                    'details_manager' => $details_manager,
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



    /** customer(得意先)取得
     *
     * @return list results
     */
    public function getCustomerData(Request $request){
        $this->array_messagedata = array();
        $result = true;
        try {

            // パラメータチェック
            $params = array();
            $params = $request->keyparams;
            //$params = $request->arrayParams;
            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_manager = isset($params['s_manager']) ? $params['s_manager'] : "";
            Log::debug("getCustomerData s_manager = ".$s_manager);

            $qsearch = new QSearch();
            //if(isset($s_m_code))      $quotationsparts->setParamM_codeAttribute($s_m_code);
            if(isset($s_manager))      $qsearch->setParamManagerAttribute($s_manager);
            $details_customer =  $qsearch->getCustomer();


            return response()->json(
                [
                    'result' => $result, 
                    's_m_code' => $s_m_code, 
                    's_manager' => $s_manager,
                    'details_customer' => $details_customer,
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
