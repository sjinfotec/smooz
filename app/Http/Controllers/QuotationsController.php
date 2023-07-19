<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class QuotationsController extends Controller
{
    public function index()
    {
        $authusers = Auth::user();
        return view('quotations', compact('authusers'));
    }

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
        $s_order_no = "";
        $s_company_name = "";
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
            if (!isset($params['s_order_no']) && !isset($params['s_company_name'])) {
                Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', "edit_id", Config::get('const.LOG_MSG.parameter_illegal')));
                $this->array_messagedata[] = Config::get('const.MSG_ERROR.parameter_illegal');
                return response()->json(
                    ['result' => false, 'details' => null,
                    Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
                );
            }
            $s_order_no = isset($params['s_order_no']) ? $params['s_order_no'] : "";
            $s_company_name = isset($params['s_company_name']) ? $params['s_company_name'] : "";
            //Log::debug("getDataSearch s_company_name = ".$s_company_name);
            $inventory_a = new InventoryA();
            if(isset($s_order_no))      $inventory_a->setParamOrdernoAttribute($s_order_no);
            if(isset($s_company_name))  $inventory_a->setParamCompanynameAttribute($s_company_name);
            $details =  $inventory_a->getSearchA();

            return response()->json(
                ['result' => $result, 'details' => $details, 's_order_no' => $s_order_no, 's_company_name' => $s_company_name,
                Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
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
