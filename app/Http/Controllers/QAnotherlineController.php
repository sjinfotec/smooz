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
//use App\Models\Quotations;

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
            if (!isset($request->keyparams)) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "keyparams", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $params = $request->keyparams;
            //Log::debug("getDataSearch params[s_order_no] = ".$params['s_order_no']);
            if (!isset($params['s_m_code']) && !isset($params['s_manager'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null, 'params' => $params,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }

            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_manager = isset($params['s_manager']) ? $params['s_manager'] : "";
            //Log::debug("getCustomerData s_manager = ".$s_manager);
            //Log::debug("request keyparams = ".$params['s_manager']);
            /*
            foreach($params AS $key => $val) {
                Log::debug("getCustomerData foreach->params key = ".$key);
                Log::debug("getCustomerData foreach->params val = ".$val);
            }
            */

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



    /** enduser(エンドユーザー)取得
     *
     * @return list results
     */
    public function getEnduserData(Request $request){
        $this->array_messagedata = array();
        $result = true;
        try {

            // パラメータチェック
            $params = array();
            if (!isset($request->keyparams)) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "keyparams", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $params = $request->keyparams;
            //Log::debug("getDataSearch params[s_order_no] = ".$params['s_order_no']);
            if (!isset($params['s_m_code']) && !isset($params['s_customer'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null, 'params' => $params,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }

            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_customer = isset($params['s_customer']) ? $params['s_customer'] : "";

            $qsearch = new QSearch();
            //if(isset($s_m_code))      $quotationsparts->setParamM_codeAttribute($s_m_code);
            if(isset($s_customer))      $qsearch->setParamCustomerAttribute($s_customer);
            $details_enduser =  $qsearch->getEnduser();
            //$str = is_object($result) ? "objです": "なにか";
            //Log::info("Model Qsearch getEnduser -> ".$str);
            //$details_enduser->append('全て');
            //$details_enduser->offsetSet('enduser','last');


            return response()->json(
                [
                    'result' => $result, 
                    's_m_code' => $s_m_code, 
                    's_customer' => $s_customer,
                    'details_enduser' => $details_enduser,
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



    /** product(製品名)取得
     *
     * @return list results
     */
    public function getProductData(Request $request){
        $this->array_messagedata = array();
        $result = true;
        try {

            // パラメータチェック
            $params = array();
            if (!isset($request->keyparams)) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "keyparams", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $params = $request->keyparams;
            //Log::debug("getDataSearch params[s_order_no] = ".$params['s_order_no']);
            if (!isset($params['s_m_code']) && !isset($params['s_enduser'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null, 'params' => $params,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }

            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_customer = isset($params['s_customer']) ? $params['s_customer'] : "";
            $s_enduser = isset($params['s_enduser']) ? $params['s_enduser'] : "";

            $qsearch = new QSearch();
            //if(isset($s_m_code))      $quotationsparts->setParamM_codeAttribute($s_m_code);
            if(isset($s_customer))      $qsearch->setParamCustomerAttribute($s_customer);
            if(isset($s_enduser))      $qsearch->setParamEnduserAttribute($s_enduser);
            $details_product =  $qsearch->getProduct();


            return response()->json(
                [
                    'result' => $result, 
                    's_m_code' => $s_m_code, 
                    's_customer' => $s_customer,
                    's_enduser' => $s_enduser,
                    'details_product' => $details_product,
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
