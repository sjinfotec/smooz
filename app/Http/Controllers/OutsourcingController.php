<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Outsourcing;

class OutsourcingController extends Controller
{
    /**
     * 取得（request）
     *
     * @return void
     */
    public function getRequest(Request $request){
        /*
        $params_order_info1 = $request->order_info;
        $params_order_info2 = $request->input('order_info');
        $params_order_info3 = $request->query('order_info');
        Log::info("ViewInventoryController getDataAFunc paramsget = ".$params_order_info1);
        Log::info("ViewInventoryController getDataAFunc paramsget = ".$params_order_info2);
        Log::info("ViewInventoryController getDataAFunc paramsget = ".$params_order_info3);
        */
        $message = "ログ OutsourcingControll -> ";
        //echo 'message ----- ' . var_export($message, true) . '';
        //echo 'request = ' . var_export($request, true) . '';
        //Log::debug("debug --".$message);
        $this->array_messagedata = array();
        try {
            $details = $this->getRequestFunc($request);
            return response()->json(
                ['result' => true, 'details' => $details,
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

    /**
     * 取得
     *
     * @return void
     */
    public function getRequestFunc($request){

        $this->array_messagedata = array();
        //$details = new Collection();
        //$user = Auth::user();
        //$login_user_code = $user->code;
        //$login_account_id = $user->account_id;
        $result = true;
        try {

            // パラメータセット
            $params = array();
            $params_edit_id = null;
            $params_code = null;
            $params_name = null;
            
            //Log::info("OutsourcingController getRequestFunc params_edit_id = ".$params_edit_id);
            //Log::info("OutsourcingController getRequestFunc");

            $outsourcing = new Outsourcing();
            if (isset($request->keyparams)) {
                $params = $request->keyparams;
                if (!empty($params['edit_id'])) {
                    $params_edit_id = $params['edit_id'];
                    $outsourcing->setParamOrderinfoAttribute($params_edit_id);
                }
                if (!empty($params['code'])) {
                    $params_code = $params['code'];
                    $outsourcing->setParamOrdernoAttribute($params_code);
                }
                if (!empty($params['name'])) {
                    $params_name = $params['name'];
                    $outsourcing->setParamCompanyidAttribute($params_name);
                }
            }

            //$inventory_a->setParamEditidAttribute($edit_id);
            $details =  $outsourcing->getData();

            return $details;
        }catch(\PDOException $pe){
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.Config::get('const.LOG_MSG.unknown_error'));
            Log::error($e->getMessage());
            throw $e;
        }
    }


}
