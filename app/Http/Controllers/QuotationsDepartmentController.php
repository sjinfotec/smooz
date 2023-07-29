<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\QuotationsDepartment;
use App\Models\Generalcode;

class QuotationsDepartmentController extends Controller
{
    public function index()
    {
        $authusers = Auth::user();
        return view('quotationsdepartment', compact('authusers'));
    }


    /** 部門（フォーム・オフセット・組版・コレーター・ネームライナー）取得
     *
     * @return list results
     */
    public function getData(Request $request){
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
            //Log::debug("getData params[s_order_no] = ".$params['s_order_no']);
            if (!isset($params['s_m_code']) && !isset($params['s_customer_code']) && !isset($params['s_customer']) && !isset($params['s_enduser']) && !isset($params['s_product']) && !isset($params['s_date_start']) && !isset($params['s_date_end'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null, 'params' => $params,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $s_m_code = isset($params['s_m_code']) ? $params['s_m_code'] : "";
            //Log::debug("getData s_m_code = ".$s_m_code);
            $q_department = new QuotationsDepartment();
            if(isset($s_m_code))      $q_department->setParamM_codeAttribute($s_m_code);
            $details =  $q_department->getSearch();


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
                    'select_arr_s001' => $select_arr_s001,
                    'select_arr_s002' => $select_arr_s002,
                    'select_arr_s003' => $select_arr_s003,
                    'select_arr_s004' => $select_arr_s004,
                    'select_arr_s005' => $select_arr_s005,
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
