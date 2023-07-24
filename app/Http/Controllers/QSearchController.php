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
use App\Models\Generalcode;


class QSearchController extends Controller
{
    public function search()
    {
        $authusers = Auth::user();
        return view('quotationssearch', compact('authusers')
        );
    }

    /** 検索SEARCH取得
     *
     * @return list results
     */
    public function getDataSearch(Request $request){
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
            if (!isset($params['s_m_code']) && !isset($params['s_customer_code']) && !isset($params['s_customer']) && !isset($params['s_enduser']) && !isset($params['s_product']) && !isset($params['s_date_start']) && !isset($params['s_date_end'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null, 'params' => $params,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            $s_customer_code = isset($params['s_customer_code']) ? $params['s_customer_code'] : "";
            $s_customer = isset($params['s_customer']) ? $params['s_customer'] : "";
            $s_enduser = isset($params['s_enduser']) ? $params['s_enduser'] : "";
            $s_product = isset($params['s_product']) ? $params['s_product'] : "";
            $s_date_start = isset($params['s_date_start']) ? $params['s_date_start'] : "";
            $s_date_end = isset($params['s_date_end']) ? $params['s_date_end'] : "";
            //Log::debug("getDataSearch s_company_name = ".$s_company_name);
            $q_search = new QSearch();
            if(isset($s_m_code))      $q_search->setParamM_codeAttribute($s_m_code);
            if(isset($s_customer_code))      $q_search->setParamCustomer_codeAttribute($s_customer_code);
            if(isset($s_customer))      $q_search->setParamCustomerAttribute($s_customer);
            if(isset($s_enduser))      $q_search->setParamEnduserAttribute($s_enduser);
            if(isset($s_product))      $q_search->setParamProductAttribute($s_product);
            if(isset($s_date_start))      $q_search->setParamDate_startAttribute($s_date_start);
            if(isset($s_date_end))      $q_search->setParamDate_endAttribute($s_date_end);
            $details =  $q_search->getSearch();
            $pvu = $q_search->getPvu();

            $general_code = new Generalcode();
            $general_code->setParamIdentificationidAttribute('S001');
            $select_arr_s001 =  $general_code->getItem();
            $general_code->setParamIdentificationidAttribute('S002');
            $select_arr_s002 =  $general_code->getItem();
            $general_code->setParamIdentificationidAttribute('S003');
            $select_arr_s003 =  $general_code->getItem();
            $general_code->setParamIdentificationidAttribute('S004');
            $select_arr_s004 =  $general_code->getItem();
            $general_code->setParamIdentificationidAttribute('S005');
            $select_arr_s005 =  $general_code->getItem();

            return response()->json(
                [
                    'result' => $result, 
                    'details' => $details, 
                    's_m_code' => $s_m_code, 
                    's_customer_code' => $s_customer_code, 
                    's_customer' => $s_customer, 
                    's_enduser' => $s_enduser, 
                    's_product' => $s_product, 
                    's_date_start' => $s_date_start, 
                    's_date_end' => $s_date_end, 
                    'select_arr_s001' => $select_arr_s001,
                    'select_arr_s002' => $select_arr_s002,
                    'select_arr_s003' => $select_arr_s003,
                    'select_arr_s004' => $select_arr_s004,
                    'select_arr_s005' => $select_arr_s005,
                    'pvu' => $pvu,
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
