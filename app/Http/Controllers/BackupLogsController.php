<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \SplFileObject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\ApiCommonController;
use App\Models\BackupAttribute;
use App\Models\BackupLogs;
use App\Models\ImpMitumoridat;
use App\Models\Quotations;
use App\Models\QuotationsBinding;
use App\Models\QuotationsCost;
use App\Models\QuotationsDepartment;
use App\Models\QuotationsParts;


//
//  バックアップ・インポート・エクスポート機能
//
class BackupLogsController extends Controller
{
    protected $table_users = 'users';
    protected $table_generalcodes = 'generalcodes';
    protected $table_imp_mitumori_dat = 'imp_mitumori_dat';
    protected $table_quotations = 'quotations';
    protected $table_binding = 'quotations_binding';
    protected $table_quotations_cost = 'quotations_cost';
    protected $table_quotations_department = 'quotations_department';
    protected $table_quotations_parts = 'quotations_parts';
    protected $table_wrk_quotations = 'wrk_quotations';
    protected $table_wrk_quotations_binding = 'wrk_quotations_binding';
    protected $table_wrk_quotations_cost = 'wrk_quotations_cost';
    protected $table_wrk_quotations_department = 'wrk_quotations_department';
    protected $table_wrk_quotations_parts = 'wrk_quotations_parts';

    private $array_messagedata = array();

    public function index()
    {
        $authusers = Auth::user();
        return view('backuplogs', compact('authusers'));
    }

    //
    //  ズムーズ見積datimport
    //
    public function importMitumoridat(Request $request)
    {
        Log::debug('importMitumoridat in');
        $params = $request->keyparams;
        $mode = $params['mode'];
        $identification_code = $params['identification'];
        $this->array_messagedata = array();
        $apicommon = new ApiCommonController();
        $bkup_model = new BackupAttribute();
        $user = Auth::user();
        $login_user_code = $user->code;
        $result = true;
        $procend = true;

        try {
            // バックアップ属性取得
            Log::debug('importMitumoridat $identification_code = '.$identification_code);
            $bkup_model->setParamIdentificationidAttribute(Config::get('const.IDENTIFICATION_ID.quotation_import'));
            $bkup_model->setParamIdentificationcodeAttribute($identification_code);
            $bkup_model->setParamStatusAttribute(Config::get('const.STATUS.end'));
            // status != end を取得
            $result_datas = $bkup_model->getItem();
            foreach($result_datas as $item) {
                if (isset($item->identification_code)) {
                    // 処理開始
                    $result = false;
                    $dt_start = new Carbon();
                    $dt_end = null;
                    $array_imple_putBackupResult = array(
                        'proc' => Config::get('const.STATUS.start'),
                        'dt_start' => $dt_start,
                        'dt_end' => $dt_end,
                        'item' => $item,
                        'result' => true,
                        'login_user_code' => $login_user_code
                    );
                    $result_back = $this->putBackupResult($array_imple_putBackupResult);

                    switch ($item->identification_code){
                        // 見積スムースデータ複写
                        case Config::get('const.G001.copy'):
                            $result = $this->copyG001();
                            break;
                        // 見積スムースデータ展開
                        case Config::get('const.G001.deploy'):
                            $array_imple_deployG001 = array(
                                'item' => $item,
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->deployG001($array_imple_deployG001);
                            break;
                        // 見積スムースデータ振分
                        case Config::get('const.G001.distribute_quotations'):
                            set_time_limit(300);
                            $array_imple_distributeG001 = array(
                                'item' => $item,
                                'distribute' => Config::get('const.G001.distribute_quotations'),
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->distributeG001($array_imple_distributeG001);
                            break;
                        // 見積スムースデータ振分
                        case Config::get('const.G001.distribute_quotations_binding'):
                            set_time_limit(300);
                            $array_imple_distributeG001 = array(
                                'item' => $item,
                                'distribute' => Config::get('const.G001.distribute_quotations_binding'),
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->distributeG001($array_imple_distributeG001);
                            break;
                        // 見積スムースデータ振分
                        case Config::get('const.G001.distribute_quotations_cost'):
                            set_time_limit(300);
                            $array_imple_distributeG001 = array(
                                'item' => $item,
                                'distribute' => Config::get('const.G001.distribute_quotations_cost'),
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->distributeG001($array_imple_distributeG001);
                            break;
                        // 見積スムースデータ振分
                        case Config::get('const.G001.distribute_quotations_department'):
                            set_time_limit(300);
                            $array_imple_distributeG001 = array(
                                'item' => $item,
                                'distribute' => Config::get('const.G001.distribute_quotations_department'),
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->distributeG001($array_imple_distributeG001);
                            break;
                        // 見積スムースデータ振分
                        case Config::get('const.G001.distribute_quotations_parts'):
                            set_time_limit(300);
                            $array_imple_distributeG001 = array(
                                'item' => $item,
                                'distribute' => Config::get('const.G001.distribute_quotations_parts'),
                                'login_user_code' => $login_user_code
                            );
                            $result = $this->distributeG001($array_imple_distributeG001);
                            break;
                        default:
                            break;
                    }
                    // 処理終了
                    $dt_end = new Carbon();
                    $array_imple_putBackupResult = array(
                        'proc' => Config::get('const.STATUS.end'),
                        'dt_start' => $dt_start,
                        'dt_end' => $dt_end,
                        'item' => $item,
                        'result' => $result,
                        'login_user_code' => $login_user_code
                    );
                    $result_back = $this->putBackupResult($array_imple_putBackupResult);
                    $result = true;
                }
            }
            // バックアップ属性取得
            $bkup_model->setParamIdentificationidAttribute(Config::get('const.IDENTIFICATION_ID.quotation_import'));
            $bkup_model->setParamIdentificationcodeAttribute(null);
            $bkup_model->setParamStatusAttribute(Config::get('const.STATUS.end'));
            // status != end を取得
            $result_datas = $bkup_model->getItem();
            foreach($result_datas as $item) {
                $procend = false;
                break;
            }
            Log::debug('importMitumoridat end $procend = '.$procend);
            return response()->json(
                ['result' => $result, 'procend' => $procend,
                Config::get('const.RESPONCE_ITEM.messagedata') => $this->array_messagedata]
            );
        } catch (ProcessFailedException $pe) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
        } catch (Exception $e) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
        }
    }

    //
    //  見積スムースデータ複写
    //
    private function copyG001()
    {
        $apicommon = new ApiCommonController();
        try {
            //   $shname: 起動するshファイル名
            //   $targetpath: 取り込み元パス名
            //   $targetfile: 取り込み元ファイル名
            //   $sh_keyword: logファイル名の一部（機能名）  "import"
            $shname = Config::get('const.FILE_NAME.file_sh_smooth');
            $targetpath = Config::get('const.FILE_PATH.path_smooth_dat');
            $targetfile = Config::get('const.FILE_NAME.file_mitumoridat_dat');
            $sh_keyword = Config::get('const.KEY_WORD.shell_keyword_import');
            Log::debug('importMitumoridat $shname = '.$shname);
            Log::debug('importMitumoridat $targetpath = '.$targetpath);
            Log::debug('importMitumoridat $targetfile = '.$targetfile);
            $result = $apicommon->shExec($shname, $targetpath, $targetfile, $sh_keyword);
            return $result;
        } catch (ProcessFailedException $pe) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        } catch (Exception $e) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }


    //
    //  見積スムースデータ展開
    //
    private function deployG001($params)
    {
        $apicommon = new ApiCommonController();
        $imp_m_model = new ImpMitumoridat();
        $login_user_code = $params['login_user_code'];
        $array_imp_data = array();
        ini_set('max_execution_time', '300');
        
        try {
            $dest_path = Config::get('const.FILE_PATH.path_smooth_dest');
            $targetfile = Config::get('const.FILE_NAME.file_mitumoridat_dat');
            // import開始
            // 全件物理削除
            $result = $imp_m_model->truncate();
            Log::debug('deployG001 $dest_path.$targetfile = '.$dest_path.$targetfile);
            $file = new SplFileObject($dest_path.$targetfile, 'r');
            Log::debug('deployG001 setFlags ');
            $file->setFlags(SplFileObject::SKIP_EMPTY | SplFileObject::DROP_NEW_LINE);

            DB::beginTransaction();
            $rec_cnt = 0;
            $row_cnt = 0;
            Log::debug('deployG001 foreach in ');
            foreach ($file as $n => $line) {
                if ($line === false) continue;
                if ($rec_cnt > 20000) {
                    $insert_data = collect($array_imp_data);
                    foreach ($insert_data->chunk(1000) as $chunk) {
                        DB::table($this->table_imp_mitumori_dat)->insert( $chunk->toArray());
                    }
                    $array_imp_data = array();
                    $rec_cnt = 0;
                }
                $rec_cnt++;
                $row_cnt++;
                // 文字列を完全にUTF-8にするための処理
                // Malformed UTF-8 characters, possibly incorrectly encoded 対応
                // $convert =  mb_convert_encoding ($line, 'UTF-8', 'UTF-8');
                // 文字列をSJIS->UTF-8にするための処理
                $convert =  mb_convert_encoding ($line, 'UTF-8', 'SJIS');
                $array_imp_data[] = array(
                    'row_no' => $row_cnt,
                    'imp_data' => $convert,
                    'created_user' => $login_user_code,
                    'created_at' => Carbon::now()
                );
                // echo "$n $line", PHP_EOL;
            }
            if ($rec_cnt > 20000) {
                $insert_data = collect($array_imp_data);
                foreach ($insert_data->chunk(1000) as $chunk) {
                    DB::table($this->table_imp_mitumori_dat)->insert( $chunk->toArray());
                }
                $array_imp_data = array();
                $rec_cnt = 0;
            }
        Log::debug('deployG001 foreach end ');
            DB::commit();

            // // スムーズ営業担当を新システムのcodeに変換するためusers取得する
            // $user_item = DB::table($this->table_users)
            //     ->whereNotNull('smooth_code')
            //     ->get();
            // $filtered = $collect_array_break_worktimetable_result
            // ->where('no', '=', $param_target_result->working_timetable_no)
            // ->where('working_time_kubun', Config::get('const.C004.regular_working_time'));
            return true;

        } catch (ProcessFailedException $pe) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }
    }

    //
    //  見積スムースデータ振分
    //
    private function distributeG001($params)
    {
        Log::debug('distributeG001 in ');
        $item = $params['item'];
        $apicommon = new ApiCommonController();
        $imp_m_model = new ImpMitumoridat();
        $login_user_code = $params['login_user_code'];
        $distribute = $params['distribute'];
        $array_imp_data_quotations = array();
        $array_imp_data_quotations_binding = array();
        $array_imp_data_quotations_cost = array();
        $array_imp_data_quotations_department = array();
        $array_imp_data_quotations_parts = array();

        try {
            // 見積もりimportdata取得し配列に展開
            Log::debug('distributeG001 getImportData start ');
            $result = $this->getImportData($params);
            Log::debug('distributeG001 getImportData end ');
            $array_imp_data_quotations = $result[0];
            $array_imp_data_quotations_binding = $result[1];
            $array_imp_data_quotations_cost = $result[2];
            $array_imp_data_quotations_department = $result[3];
            $array_imp_data_quotations_parts = $result[4];
            switch ($distribute){
            case Config::get('const.G001.distribute_quotations'):
                DB::table($this->table_wrk_quotations)->truncate();
                Log::debug('distributeG001 array_imp_data_quotations count = '.count($array_imp_data_quotations));
                for ($i=0; $i<count($array_imp_data_quotations); $i++) {
                    Log::debug('distributeG001 $i = '.$i);
                    Log::debug('distributeG001 user_code = '.$array_imp_data_quotations[$i]["user_code"]);
                    Log::debug('distributeG001 m_code = '.$array_imp_data_quotations[$i]["m_code"]);
                    // Log::debug('distributeG001 wm_code = '.$array_imp_data_quotations[$i]["wm_code"]);
                    // Log::debug('distributeG001 wm_sub = '.$array_imp_data_quotations[$i]["wm_sub"]);
                    // Log::debug('distributeG001 reference_num = '.$array_imp_data_quotations[$i]["reference_num"]);
                    // Log::debug('distributeG001 create_date = '.$array_imp_data_quotations[$i]["create_date"]);
                    // Log::debug('distributeG001 lastorder_date = '.$array_imp_data_quotations[$i]["lastorder_date"]);
                    // Log::debug('distributeG001 number_order = '.$array_imp_data_quotations[$i]["number_order"]);
                    Log::debug('distributeG001 manager_code = '.$array_imp_data_quotations[$i]["manager_code"]);
                    Log::debug('distributeG001 manager = '.$array_imp_data_quotations[$i]["manager"]);
                    Log::debug('distributeG001 customer_code = '.$array_imp_data_quotations[$i]["customer_code"]);
                    Log::debug('distributeG001 customer = '.$array_imp_data_quotations[$i]["customer"]);
                    Log::debug('distributeG001 printing = '.$array_imp_data_quotations[$i]["printing"]);
                    Log::debug('distributeG001 enduser = '.$array_imp_data_quotations[$i]["enduser"]);
                    Log::debug('distributeG001 product = '.$array_imp_data_quotations[$i]["product"]);
                    Log::debug('distributeG001 production_setnum = '.$array_imp_data_quotations[$i]["production_setnum"]);
                    Log::debug('distributeG001 production_setnum_unit = '.$array_imp_data_quotations[$i]["production_setnum_unit"]);
                    Log::debug('distributeG001 production_volnum = '.$array_imp_data_quotations[$i]["production_volnum"]);
                    Log::debug('distributeG001 production_volnum_unit = '.$array_imp_data_quotations[$i]["production_volnum_unit"]);
                    Log::debug('distributeG001 production_all = '.$array_imp_data_quotations[$i]["production_all"]);
                    Log::debug('distributeG001 unit = '.$array_imp_data_quotations[$i]["unit"]);
                    // Log::debug('distributeG001 papertray = '.$array_imp_data_quotations[$i]["papertray"]);
                    // Log::debug('distributeG001 imposition_w = '.$array_imp_data_quotations[$i]["imposition_w"]);
                    // Log::debug('distributeG001 imposition_h = '.$array_imp_data_quotations[$i]["imposition_h"]);
                    // Log::debug('distributeG001 cylinder = '.$array_imp_data_quotations[$i]["cylinder"]);
                    // Log::debug('distributeG001 cylinder_num = '.$array_imp_data_quotations[$i]["cylinder_num"]);
                    // Log::debug('distributeG001 cylinder_set = '.$array_imp_data_quotations[$i]["cylinder_set"]);
                    // Log::debug('distributeG001 size_w = '.$array_imp_data_quotations[$i]["size_w"]);
                    // Log::debug('distributeG001 size_h = '.$array_imp_data_quotations[$i]["size_h"]);
                    // Log::debug('distributeG001 size_top = '.$array_imp_data_quotations[$i]["size_top"]);
                    // Log::debug('distributeG001 size_bottom = '.$array_imp_data_quotations[$i]["size_bottom"]);
                    // Log::debug('distributeG001 inch_fold = '.$array_imp_data_quotations[$i]["inch_fold"]);
                    // Log::debug('distributeG001 parts_num = '.$array_imp_data_quotations[$i]["parts_num"]);
                    // Log::debug('distributeG001 all_through = '.$array_imp_data_quotations[$i]["all_through"]);
                    // Log::debug('distributeG001 paper_amount = '.$array_imp_data_quotations[$i]["paper_amount"]);
                    // Log::debug('distributeG001 wages_amount = '.$array_imp_data_quotations[$i]["wages_amount"]);
                    // Log::debug('distributeG001 cost_amount = '.$array_imp_data_quotations[$i]["cost_amount"]);
                    Log::debug('distributeG001 estimate_amount = '.$array_imp_data_quotations[$i]["estimate_amount"]);
                    // Log::debug('distributeG001 comment = '.$array_imp_data_quotations[$i]["comment"]);
                    // Log::debug('distributeG001 offered_amount = '.$array_imp_data_quotations[$i]["offered_amount"]);
                    // Log::debug('distributeG001 print_cost_max = '.$array_imp_data_quotations[$i]["print_cost_max"]);
                    // Log::debug('distributeG001 paper_cost = '.$array_imp_data_quotations[$i]["paper_cost"]);
                    // Log::debug('distributeG001 created_user = '.$array_imp_data_quotations[$i]["created_user"]);
                    // Log::debug('distributeG001 created_at = '.$array_imp_data_quotations[$i]["created_at"]);
                    // Log::debug('distributeG001 is_deleted = '.$array_imp_data_quotations[$i]["is_deleted"]);
                }
                DB::beginTransaction();
                $convert =  mb_convert_variables('UTF-8','UTF-8',$array_imp_data_quotations);
                Log::debug('distributeG001 table_wrk_quotations insert start');
                $insert_data = collect($array_imp_data_quotations);
                $insert_cnt = 0;
                foreach ($insert_data->chunk(1000) as $chunk) {
                    $insert_cnt++;
                    Log::debug('distributeG001 table_wrk_quotations insert_cnt = '.$insert_cnt);
                    DB::table($this->table_wrk_quotations)->insert( $chunk->toArray());
                }
                Log::debug('distributeG001 table_wrk_quotations insert end');
                DB::commit();
                break;
            case Config::get('const.G001.distribute_quotations_binding'):
                DB::table($this->table_wrk_quotations_binding)->truncate();
                DB::beginTransaction();
                $convert =  mb_convert_variables('UTF-8','UTF-8',$array_imp_data_quotations_binding);
                Log::debug('distributeG001 table_wrk_quotations_binding insert start');
                $insert_data = collect($array_imp_data_quotations_binding);
                $insert_cnt = 0;
                foreach ($insert_data->chunk(1000) as $chunk) {
                    $insert_cnt++;
                    Log::debug('distributeG001 table_wrk_quotations_binding insert_cnt = '.$insert_cnt);
                    DB::table($this->table_wrk_quotations_binding)->insert( $chunk->toArray());
                }
                Log::debug('distributeG001 table_wrk_quotations_binding insert end');
                DB::commit();
                break;
            case Config::get('const.G001.distribute_quotations_cost'):
                DB::table($this->table_wrk_quotations_cost)->truncate();
                Log::debug('distributeG001 array_imp_data_quotations_cost count = '.count($array_imp_data_quotations_cost));
                for ($i=0; $i<count($array_imp_data_quotations_cost); $i++) {
                    Log::debug('distributeG001 $i = '.$i);
                    Log::debug('distributeG001 m_code = '.$array_imp_data_quotations_cost[$i]["m_code"]);
                    // Log::debug('distributeG001 send_city = '.$table_wrk_quotations_cost[$i]["send_city"]);
                    // Log::debug('distributeG001 send_in_dou = '.$table_wrk_quotations_cost[$i]["send_in_dou"]);
                    // Log::debug('distributeG001 send_out_dou = '.$table_wrk_quotations_cost[$i]["send_out_dou"]);
                    // Log::debug('distributeG001 send_out_dou_yen = '.$table_wrk_quotations_cost[$i]["send_out_dou_yen"]);
                    // Log::debug('distributeG001 send_all = '.$table_wrk_quotations_cost[$i]["send_all"]);
                    // Log::debug('distributeG001 send_subtotal = '.$table_wrk_quotations_cost[$i]["send_subtotal"]);
                    // Log::debug('distributeG001 inside_hand_work = '.$table_wrk_quotations_cost[$i]["inside_hand_work"]);
                    // Log::debug('distributeG001 inside_insourcing_cost = '.$table_wrk_quotations_cost[$i]["inside_insourcing_cost"]);
                    Log::debug('distributeG001 outside_job1 = '.$array_imp_data_quotations_cost[$i]["outside_job1"]);
                    Log::debug('distributeG001 outside_job1_outsou = '.$array_imp_data_quotations_cost[$i]["outside_job1_outsou"]);
                    Log::debug('distributeG001 outside_job1_outsou_cost = '.$array_imp_data_quotations_cost[$i]["outside_job1_outsou_cost"]);
                }
                DB::beginTransaction();
                $convert =  mb_convert_variables('UTF-8','UTF-8',$array_imp_data_quotations_cost);
                Log::debug('distributeG001 table_wrk_quotations_cost insert start');
                $insert_data = collect($array_imp_data_quotations_cost);
                $insert_cnt = 0;
                foreach ($insert_data->chunk(1000) as $chunk) {
                    $insert_cnt++;
                    Log::debug('distributeG001 table_wrk_quotations_cost insert_cnt = '.$insert_cnt);
                    DB::table($this->table_wrk_quotations_cost)->insert( $chunk->toArray());
                }
                Log::debug('distributeG001 table_wrk_quotations_cost insert end');
                DB::commit();
                break;
            case Config::get('const.G001.distribute_quotations_department'):
                DB::table($this->table_wrk_quotations_department)->truncate();
                Log::debug('distributeG001 array_imp_data_quotations_department count = '.count($array_imp_data_quotations_department));
                for ($i=0; $i<count($array_imp_data_quotations_department); $i++) {
                    Log::debug('distributeG001 $i = '.$i);
                    Log::debug('distributeG001 m_code = '.$array_imp_data_quotations_department[$i]["m_code"]);
                    // Log::debug('distributeG001 wkake = '.$array_imp_data_quotations_department[$i]["wkake"]);
                    // Log::debug('distributeG001 daenpin = '.$array_imp_data_quotations_department[$i]["daenpin"]);
                    // Log::debug('distributeG001 ana2 = '.$array_imp_data_quotations_department[$i]["ana2"]);
                    // Log::debug('distributeG001 ana6 = '.$array_imp_data_quotations_department[$i]["ana6"]);
                    // Log::debug('distributeG001 donko = '.$array_imp_data_quotations_department[$i]["donko"]);
                    // Log::debug('distributeG001 katanuki = '.$array_imp_data_quotations_department[$i]["katanuki"]);
                    // Log::debug('distributeG001 katanuki_outsou = '.$array_imp_data_quotations_department[$i]["katanuki_outsou"]);
                    // Log::debug('distributeG001 katanuki_outsou_cost = '.$array_imp_data_quotations_department[$i]["katanuki_outsou_cost"]);
                    // Log::debug('distributeG001 kasutori = '.$array_imp_data_quotations_department[$i]["kasutori"]);
                    // Log::debug('distributeG001 kasutori_outsou = '.$array_imp_data_quotations_department[$i]["kasutori_outsou"]);
                    // Log::debug('distributeG001 kasutori_outsou_cost = '.$array_imp_data_quotations_department[$i]["kasutori_outsou_cost"]);
                    // Log::debug('distributeG001 nisu = '.$array_imp_data_quotations_department[$i]["nisu"]);
                    // Log::debug('distributeG001 nisu_through = '.$array_imp_data_quotations_department[$i]["nisu_through"]);
                    // Log::debug('distributeG001 tsr_times = '.$array_imp_data_quotations_department[$i]["tsr_times"]);
                    // Log::debug('distributeG001 tsr_through = '.$array_imp_data_quotations_department[$i]["tsr_through"]);
                    // Log::debug('distributeG001 form_color_change = '.$array_imp_data_quotations_department[$i]["form_color_change"]);
                    // Log::debug('distributeG001 form_carbon_mold = '.$array_imp_data_quotations_department[$i]["form_carbon_mold"]);
                    // Log::debug('distributeG001 form_all_outsou = '.$array_imp_data_quotations_department[$i]["form_all_outsou"]);
                    // Log::debug('distributeG001 form_all_outsou_cost = '.$array_imp_data_quotations_department[$i]["form_all_outsou_cost"]);
                    // Log::debug('distributeG001 form_subtotal = '.$array_imp_data_quotations_department[$i]["form_subtotal"]);
                    // Log::debug('distributeG001 offset_color_change = '.$array_imp_data_quotations_department[$i]["offset_color_change"]);
                    // Log::debug('distributeG001 offset_carbon_mold = '.$array_imp_data_quotations_department[$i]["offset_carbon_mold"]);
                    // Log::debug('distributeG001 offset_subtotal = '.$array_imp_data_quotations_department[$i]["offset_subtotal"]);
                    // Log::debug('distributeG001 block_copy = '.$array_imp_data_quotations_department[$i]["block_copy"]);
                    // Log::debug('distributeG001 kinds = '.$array_imp_data_quotations_department[$i]["kinds"]);
                    // Log::debug('distributeG001 difficulty = '.$array_imp_data_quotations_department[$i]["difficulty"]);
                    // Log::debug('distributeG001 plate_making_outsou = '.$array_imp_data_quotations_department[$i]["plate_making_outsou"]);
                    // Log::debug('distributeG001 plate_making_outsou_cost = '.$array_imp_data_quotations_department[$i]["plate_making_outsou_cost"]);
                    // Log::debug('distributeG001 ctp = '.$array_imp_data_quotations_department[$i]["ctp"]);
                    // Log::debug('distributeG001 inkjet = '.$array_imp_data_quotations_department[$i]["inkjet"]);
                    // Log::debug('distributeG001 inkjet_sheet = '.$array_imp_data_quotations_department[$i]["inkjet_sheet"]);
                    // Log::debug('distributeG001 ondemand_color_front = '.$array_imp_data_quotations_department[$i]["ondemand_color_front"]);
                    // Log::debug('distributeG001 ondemand_color_back = '.$array_imp_data_quotations_department[$i]["ondemand_color_back"]);
                    // Log::debug('distributeG001 ondemand_through_front = '.$array_imp_data_quotations_department[$i]["ondemand_through_front"]);
                    // Log::debug('distributeG001 ondemand_through_back = '.$array_imp_data_quotations_department[$i]["ondemand_through_back"]);
                    // Log::debug('distributeG001 plate_subtotal = '.$array_imp_data_quotations_department[$i]["plate_subtotal"]);
                    // Log::debug('distributeG001 collator = '.$array_imp_data_quotations_department[$i]["collator"]);
                    // Log::debug('distributeG001 bebe = '.$array_imp_data_quotations_department[$i]["bebe"]);
                    // Log::debug('distributeG001 envelope_process = '.$array_imp_data_quotations_department[$i]["envelope_process"]);
                    // Log::debug('distributeG001 peel = '.$array_imp_data_quotations_department[$i]["peel"]);
                    // Log::debug('distributeG001 press = '.$array_imp_data_quotations_department[$i]["press"]);
                    // Log::debug('distributeG001 sheetcut = '.$array_imp_data_quotations_department[$i]["sheetcut"]);
                    // Log::debug('distributeG001 collator_cno = '.$array_imp_data_quotations_department[$i]["collator_cno"]);
                    // Log::debug('distributeG001 collator_ana = '.$array_imp_data_quotations_department[$i]["collator_ana"]);
                    // Log::debug('distributeG001 collator_all_outsou = '.$array_imp_data_quotations_department[$i]["collator_all_outsou"]);
                    // Log::debug('distributeG001 collator_all_outsou_cost = '.$array_imp_data_quotations_department[$i]["collator_all_outsou_cost"]);
                    // Log::debug('distributeG001 collator_subtotal = '.$array_imp_data_quotations_department[$i]["collator_subtotal"]);
                    // Log::debug('distributeG001 collator_basic_fee = '.$array_imp_data_quotations_department[$i]["collator_basic_fee"]);
                    // Log::debug('distributeG001 nl_color = '.$array_imp_data_quotations_department[$i]["nl_color"]);
                    // Log::debug('distributeG001 nl_hagaki = '.$array_imp_data_quotations_department[$i]["nl_hagaki"]);
                    // Log::debug('distributeG001 nl_hagaki_color = '.$array_imp_data_quotations_department[$i]["nl_hagaki_color"]);
                    // Log::debug('distributeG001 nl_envelope_color = '.$array_imp_data_quotations_department[$i]["nl_envelope_color"]);
                    // Log::debug('distributeG001 nl_number_part = '.$array_imp_data_quotations_department[$i]["nl_number_part"]);
                    // Log::debug('distributeG001 nl_subtotal = '.$array_imp_data_quotations_department[$i]["nl_subtotal"]);
                }
                Log::debug('distributeG001 table_wrk_quotations_department insert start');
                DB::beginTransaction();
                $convert =  mb_convert_variables('UTF-8','UTF-8',$array_imp_data_quotations_department);
                Log::debug('distributeG001 table_wrk_quotations_department insert start');
                $insert_data = collect($array_imp_data_quotations_department);
                $insert_cnt = 0;
                foreach ($insert_data->chunk(1000) as $chunk) {
                    $insert_cnt++;
                    Log::debug('distributeG001 table_wrk_quotations_department insert_cnt = '.$insert_cnt);
                    DB::table($this->table_wrk_quotations_department)->insert( $chunk->toArray());
                }
                Log::debug('distributeG001 table_wrk_quotations_department insert end');
                DB::commit();
                break;
            case Config::get('const.G001.distribute_quotations_parts'):
                DB::table($this->table_wrk_quotations_parts)->truncate();
                Log::debug('distributeG001 array_imp_data_quotations_parts count = '.count($array_imp_data_quotations_parts));
                for ($i=0; $i<count($array_imp_data_quotations_parts); $i++) {
                    Log::debug('distributeG001 $i = '.$i);
                    Log::debug('distributeG001 user_code = '.$array_imp_data_quotations_parts[$i]["user_code"]);
                    Log::debug('distributeG001 m_code = '.$array_imp_data_quotations_parts[$i]["m_code"]);
                    Log::debug('distributeG001 seq = '.$array_imp_data_quotations_parts[$i]["seq"]);
                    Log::debug('distributeG001 parts_code = '.$array_imp_data_quotations_parts[$i]["parts_code"]);
                    // Log::debug('distributeG001 paper_code = '.$array_imp_data_quotations_parts[$i]["paper_code"]);
                    // Log::debug('distributeG001 paper_name = '.$array_imp_data_quotations_parts[$i]["paper_name"]);
                    // Log::debug('distributeG001 p_supply = '.$array_imp_data_quotations_parts[$i]["p_supply"]);
                    // Log::debug('distributeG001 size_w = '.$array_imp_data_quotations_parts[$i]["size_w"]);
                    // Log::debug('distributeG001 size_h = '.$array_imp_data_quotations_parts[$i]["size_h"]);
                    // Log::debug('distributeG001 size_top = '.$array_imp_data_quotations_parts[$i]["size_top"]);
                    // Log::debug('distributeG001 size_bottom = '.$array_imp_data_quotations_parts[$i]["size_bottom"]);
                    // Log::debug('distributeG001 papertray = '.$array_imp_data_quotations_parts[$i]["papertray"]);
                    // Log::debug('distributeG001 imposition_w = '.$array_imp_data_quotations_parts[$i]["imposition_w"]);
                    // Log::debug('distributeG001 imposition_h = '.$array_imp_data_quotations_parts[$i]["imposition_h"]);
                    // Log::debug('distributeG001 p_color_front = '.$array_imp_data_quotations_parts[$i]["p_color_front"]);
                    // Log::debug('distributeG001 p_color_back = '.$array_imp_data_quotations_parts[$i]["p_color_back"]);
                    // Log::debug('distributeG001 p_desensitization = '.$array_imp_data_quotations_parts[$i]["p_desensitization"]);
                    // Log::debug('distributeG001 p_carbon = '.$array_imp_data_quotations_parts[$i]["p_carbon"]);
                    // Log::debug('distributeG001 p_white = '.$array_imp_data_quotations_parts[$i]["p_white"]);
                    Log::debug('distributeG001 p_separate = '.$array_imp_data_quotations_parts[$i]["p_separate"]);
                    Log::debug('distributeG001 p_through = '.$array_imp_data_quotations_parts[$i]["p_through"]);
                    Log::debug('distributeG001 p_sheet = '.$array_imp_data_quotations_parts[$i]["p_sheet"]);
                    // Log::debug('distributeG001 p_mm_apply = '.$array_imp_data_quotations_parts[$i]["p_mm_apply"]);
                    // Log::debug('distributeG001 p_mm_dispose = '.$array_imp_data_quotations_parts[$i]["p_mm_dispose"]);
                    // Log::debug('distributeG001 p_mm_unit = '.$array_imp_data_quotations_parts[$i]["p_mm_unit"]);
                    // Log::debug('distributeG001 p_printing_cost = '.$array_imp_data_quotations_parts[$i]["p_printing_cost"]);
                    // Log::debug('distributeG001 p_necessary_sheet = '.$array_imp_data_quotations_parts[$i]["p_necessary_sheet"]);
                    // Log::debug('distributeG001 p_paper_price = '.$array_imp_data_quotations_parts[$i]["p_paper_price"]);
                    // Log::debug('distributeG001 p_form_sewingmachine_w = '.$array_imp_data_quotations_parts[$i]["p_form_sewingmachine_w"]);
                    // Log::debug('distributeG001 p_form_sewingmachine_h = '.$array_imp_data_quotations_parts[$i]["p_form_sewingmachine_h"]);
                    // Log::debug('distributeG001 p_form_jump_sewingmachine_w = '.$array_imp_data_quotations_parts[$i]["p_form_jump_sewingmachine_w"]);
                    // Log::debug('distributeG001 p_form_jump_sewingmachine_h = '.$array_imp_data_quotations_parts[$i]["p_form_jump_sewingmachine_h"]);
                    // Log::debug('distributeG001 p_form_micro_sewingmachine_w = '.$array_imp_data_quotations_parts[$i]["p_form_micro_sewingmachine_w"]);
                    // Log::debug('distributeG001 p_form_micro_sewingmachine_h = '.$array_imp_data_quotations_parts[$i]["p_form_micro_sewingmachine_h"]);
                    // Log::debug('distributeG001 p_form_jump_micro_sewingmachine_w = '.$array_imp_data_quotations_parts[$i]["p_form_jump_micro_sewingmachine_w"]);
                    // Log::debug('distributeG001 p_form_jump_micro_sewingmachine_h = '.$array_imp_data_quotations_parts[$i]["p_form_jump_micro_sewingmachine_h"]);
                    // Log::debug('distributeG001 p_form_linein_w = '.$array_imp_data_quotations_parts[$i]["p_form_linein_w"]);
                    // Log::debug('distributeG001 p_form_linein_h = '.$array_imp_data_quotations_parts[$i]["p_form_linein_h"]);
                    // Log::debug('distributeG001 p_form_slitter_w = '.$array_imp_data_quotations_parts[$i]["p_form_slitter_w"]);
                    // Log::debug('distributeG001 p_form_slitter_h = '.$array_imp_data_quotations_parts[$i]["p_form_slitter_h"]);
                    // Log::debug('distributeG001 p_form_no = '.$array_imp_data_quotations_parts[$i]["p_form_no"]);
                    // Log::debug('distributeG001 p_form_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_form_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_form_jump_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_form_jump_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_form_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_form_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_form_jump_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_form_jump_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_form_linein_ks = '.$array_imp_data_quotations_parts[$i]["p_form_linein_ks"]);
                    // Log::debug('distributeG001 p_form_slitter_ks = '.$array_imp_data_quotations_parts[$i]["p_form_slitter_ks"]);
                    // Log::debug('distributeG001 p_form_no_ks = '.$array_imp_data_quotations_parts[$i]["p_form_no_ks"]);
                    // Log::debug('distributeG001 p_form_subtotal = '.$array_imp_data_quotations_parts[$i]["p_form_subtotal"]);
                    // Log::debug('distributeG001 p_offset_sewingmachine_w = '.$array_imp_data_quotations_parts[$i]["p_offset_sewingmachine_w"]);
                    // Log::debug('distributeG001 p_offset_no = '.$array_imp_data_quotations_parts[$i]["p_offset_no"]);
                    // Log::debug('distributeG001 p_offset_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_offset_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_offset_no_ks = '.$array_imp_data_quotations_parts[$i]["p_offset_no_ks"]);
                    // Log::debug('distributeG001 p_offset_subtotal = '.$array_imp_data_quotations_parts[$i]["p_offset_subtotal"]);
                    // Log::debug('distributeG001 p_letterpress_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_letterpress_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_letterpress_jump_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_letterpress_jump_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_letterpress_micro_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_micro_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_letterpress_micro_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_micro_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_letterpress_jump_micro_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_micro_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_letterpress_jump_micro_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_micro_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_letterpress_linein_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_linein_hon"]);
                    // Log::debug('distributeG001 p_letterpress_linein_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_linein_dai"]);
                    // Log::debug('distributeG001 p_letterpress_slitter_hon = '.$array_imp_data_quotations_parts[$i]["p_letterpress_slitter_hon"]);
                    // Log::debug('distributeG001 p_letterpress_slitter_dai = '.$array_imp_data_quotations_parts[$i]["p_letterpress_slitter_dai"]);
                    // Log::debug('distributeG001 p_letterpress_diecut = '.$array_imp_data_quotations_parts[$i]["p_letterpress_diecut"]);
                    // Log::debug('distributeG001 p_letterpress_pcno = '.$array_imp_data_quotations_parts[$i]["p_letterpress_pcno"]);
                    // Log::debug('distributeG001 p_letterpress_no = '.$array_imp_data_quotations_parts[$i]["p_letterpress_no"]);
                    // Log::debug('distributeG001 p_letterpress_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_letterpress_jump_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_letterpress_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_letterpress_jump_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_jump_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_letterpress_linein_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_linein_ks"]);
                    // Log::debug('distributeG001 p_letterpress_slitter_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_slitter_ks"]);
                    // Log::debug('distributeG001 p_letterpress_diecut_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_diecut_ks"]);
                    // Log::debug('distributeG001 p_letterpress_pcno_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_pcno_ks"]);
                    // Log::debug('distributeG001 p_letterpress_no_ks = '.$array_imp_data_quotations_parts[$i]["p_letterpress_no_ks"]);
                    // Log::debug('distributeG001 p_letterpress_subtotal = '.$array_imp_data_quotations_parts[$i]["p_letterpress_subtotal"]);
                    // Log::debug('distributeG001 p_info_toray = '.$array_imp_data_quotations_parts[$i]["p_info_toray"]);
                    // Log::debug('distributeG001 p_info_ijp = '.$array_imp_data_quotations_parts[$i]["p_info_ijp"]);
                    // Log::debug('distributeG001 p_info_dot_line = '.$array_imp_data_quotations_parts[$i]["p_info_dot_line"]);
                    // Log::debug('distributeG001 p_info_dot_dai = '.$array_imp_data_quotations_parts[$i]["p_info_dot_dai"]);
                    // Log::debug('distributeG001 p_info_basic_fee = '.$array_imp_data_quotations_parts[$i]["p_info_basic_fee"]);
                    // Log::debug('distributeG001 p_info_output = '.$array_imp_data_quotations_parts[$i]["p_info_output"]);
                    // Log::debug('distributeG001 p_info_punching = '.$array_imp_data_quotations_parts[$i]["p_info_punching"]);
                    // Log::debug('distributeG001 p_info_subtotal = '.$array_imp_data_quotations_parts[$i]["p_info_subtotal"]);
                    // Log::debug('distributeG001 p_diecutter_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_diecutter_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_diecutter_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_diecutter_jump_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_diecutter_jump_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_diecutter_micro_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_diecutter_micro_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_diecutter_micro_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_micro_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_diecutter_jump_micro_sewingmachine_hon = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_micro_sewingmachine_hon"]);
                    // Log::debug('distributeG001 p_diecutter_jump_micro_sewingmachine_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_micro_sewingmachine_dai"]);
                    // Log::debug('distributeG001 p_diecutter_ana_hon = '.$array_imp_data_quotations_parts[$i]["p_diecutter_ana_hon"]);
                    // Log::debug('distributeG001 p_diecutter_ana_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_ana_dai"]);
                    // Log::debug('distributeG001 p_diecutter_cornercut = '.$array_imp_data_quotations_parts[$i]["p_diecutter_cornercut"]);
                    // Log::debug('distributeG001 p_diecutter_cornercut_dai = '.$array_imp_data_quotations_parts[$i]["p_diecutter_cornercut_dai"]);
                    // Log::debug('distributeG001 p_diecutter_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_diecutter_jump_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_diecutter_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_diecutter_jump_micro_sewingmachine_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_jump_micro_sewingmachine_ks"]);
                    // Log::debug('distributeG001 p_diecutter_ana_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_ana_ks"]);
                    // Log::debug('distributeG001 p_diecutter_cornercut_ks = '.$array_imp_data_quotations_parts[$i]["p_diecutter_cornercut_ks"]);
                    // Log::debug('distributeG001 p_diecutter_subtotal = '.$array_imp_data_quotations_parts[$i]["p_diecutter_subtotal"]);
                    // Log::debug('distributeG001 outsource_paper = '.$array_imp_data_quotations_parts[$i]["outsource_paper"]);
                    // Log::debug('distributeG001 outsource_paper_cost = '.$array_imp_data_quotations_parts[$i]["outsource_paper_cost"]);
                    // Log::debug('distributeG001 outsource_paper_all = '.$array_imp_data_quotations_parts[$i]["outsource_paper_all"]);
                    // Log::debug('distributeG001 outsource_paper_all_cost = '.$array_imp_data_quotations_parts[$i]["outsource_paper_all_cost"]);
                    // Log::debug('distributeG001 p_form_cornercut = '.$array_imp_data_quotations_parts[$i]["p_form_cornercut"]);
                    // Log::debug('distributeG001 p_form_replace = '.$array_imp_data_quotations_parts[$i]["p_form_replace"]);
                    // Log::debug('distributeG001 p_form_replace_color = '.$array_imp_data_quotations_parts[$i]["p_form_replace_color"]);
                    // Log::debug('distributeG001 p_envelope = '.$array_imp_data_quotations_parts[$i]["p_envelope"]);
                }
                DB::beginTransaction();
                $convert =  mb_convert_variables('UTF-8','UTF-8',$array_imp_data_quotations_parts);
                Log::debug('distributeG001 table_wrk_quotations_parts insert start');
                $insert_data = collect($array_imp_data_quotations_parts);
                $insert_cnt = 0;
                foreach ($insert_data->chunk(500) as $chunk) {
                    $insert_cnt++;
                    Log::debug('distributeG001 table_wrk_quotations_parts insert_cnt = '.$insert_cnt);
                    DB::table($this->table_wrk_quotations_parts)->insert( $chunk->toArray());
                }
                Log::debug('distributeG001 table_wrk_quotations_parts insert end');
                DB::commit();
                break;
            }


        } catch (ProcessFailedException $pe) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }
        
    }

    //
    //  見積スムースデータ振分
    //
    private function getImportData($params)
    {
        Log::debug('getImportData in ');
        $apicommon = new ApiCommonController();
        $imp_m_model = new ImpMitumoridat();
        $quotations_model = new Quotations();
        $quotationsbinding_model = new QuotationsBinding();
        $quotationscost_model = new QuotationsCost();
        $quotationsdepartment_model = new QuotationsDepartment();
        $quotationsparts_model = new QuotationsParts();
        $login_user_code = $params['login_user_code'];
        $array_imp_data = array();
        $array_imp_data_quotations = array();
        $array_imp_data_quotations_binding = array();
        $array_imp_data_quotations_cost = array();
        $array_imp_data_quotations_department = array();
        $array_imp_data_quotations_parts = array();
        
        try {
            // 見積もりimportdata取得
            //   旧スムース見積もりデータは　REC-ID=00 ・・・・ REC-ID=99 で１件の見積構成
            //   　REC-ID=00と99は各1件
            //   　REC-ID=01 ~ 15 は複数件
            //   新スムース見積もりデータ
            //   　quotations 見積テーブル　                  REC-ID=00と99の内容で作成
            //   　quotations_binding 見積製本テーブル　      REC-ID=99の内容で作成
            //   　quotations_cost 見積金額テーブル　         REC-ID=99の内容で作成
            //   　quotations_department 見積金額テーブル　   REC-ID=00と99の内容で作成
            //   　quotations_parts 見積パーツテーブル　      REC-ID=01 ~ 15の内容で作成
            Log::debug('getImportData imp_mitumori_dat 読込 start ');
            $get_imp_data = $imp_m_model->getItem(593300, 100000);
            Log::debug('getImportData imp_mitumori_dat 読込 end ');
            $rec_cnt = 0;
            $seq_cnt = 0;
            $strat_flg = false;
            Log::debug('getImportData ループ開始 '.$rec_cnt);
            foreach ($get_imp_data as $item) {
                $rec_cnt += 1;
                $array_imp_data = explode("|", $item->imp_data);
                switch ($array_imp_data[(int)Config::get('const.MITUMORI_DAT_POS_COMMON.rec_id')]){
                // quotations
                case Config::get('const.SMOOTH_RECID.dummy'):
                    $strat_flg = true;
                    $this->setQuotationsItem00($params, $array_imp_data
                                                , $quotations_model
                                                , $quotationsdepartment_model);
                    $seq_cnt = 0;
                    break;
                case Config::get('const.SMOOTH_RECID.tail'):
                    // 　quotations 　quotations_binding 　quotations_cost 　quotations_department
                    if ($strat_flg) {
                        $this->setQuotationsItem99($params, $array_imp_data
                                                , $quotations_model
                                                , $quotationsbinding_model
                                                , $quotationscost_model
                                                , $quotationsdepartment_model);
                        $array_imp_data_quotations[] = $this->setArrayQuotations($quotations_model);
                        $array_imp_data_quotations_binding[] = $this->setArrayQuotationBinding($quotationsbinding_model);
                        $array_imp_data_quotations_cost[] = $this->setArrayQuotationCost($quotationscost_model);
                        $array_imp_data_quotations_department[] = $this->setArrayQuotationDepartment($quotationsdepartment_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts01'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts02'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts03'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts04'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts05'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts06'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts07'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts08'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts09'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts10'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts11'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts12'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts13'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts14'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                case Config::get('const.SMOOTH_RECID.parts15'):
                    if ($strat_flg) {
                        $seq_cnt += 1;
                        $this->setQuotationsItemparts($params, $array_imp_data
                                                    , $quotationsparts_model, $seq_cnt);
                        $array_imp_data_quotations_parts[] = $this->setArrayQuotationParts($quotationsparts_model);
                    }
                    break;
                default:
                    break;
                }
            }
            Log::debug('getImportData ループ終了 '.$rec_cnt);
            return array($array_imp_data_quotations
                        , $array_imp_data_quotations_binding
                        , $array_imp_data_quotations_cost
                        , $array_imp_data_quotations_department
                        , $array_imp_data_quotations_parts);
    
        } catch (ProcessFailedException $pe) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }
    }

    //
    //  recid=00 項目設定
    //
    private function setQuotationsItem00($params, $array_item, $quotations_model, $quotationsdepartment_model)
    {
        $login_user_code = $params['login_user_code'];
        $arrange_index = 0;     // 必ず｜があるとはかぎらないので indexを調整する数値
        try {
            $quotations_model->setUsercodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.user_code') - $arrange_index]);
            $quotations_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.m_code') - $arrange_index]);
            $quotationsdepartment_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.m_code') - $arrange_index]);
            // $quotations_model->setWmcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setWmsubAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            $quotations_model->setReferencenumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.refrencd_m_code') - $arrange_index]);
            $quotations_model->setCreatedateAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.create_date') - $arrange_index]);
            $quotations_model->setLastorderdateAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.lastorder_date') - $arrange_index]);
            $quotations_model->setNumberorderAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.number_order') - $arrange_index]);
            $quotations_model->setManagercodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.manager_code') - $arrange_index]);
            $quotations_model->setManagerAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.manager') - $arrange_index]);
            $quotations_model->setCustomercodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.customer_code') - $arrange_index]);
            // 全角文字のためSJIS変換して長さチェック
            $convert =  mb_convert_encoding ($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.customer') - $arrange_index], 'SJIS', 'UTF-8');
            if (strlen($convert) > 44) {
                $quotations_model->setCustomerAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.customer') - $arrange_index],0,44));
                $arrange_index++;
                $quotations_model->setPrintingAttribute('');
                $quotations_model->setEnduserAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.enduser') - $arrange_index],44,40));
            } else {
                $quotations_model->setCustomerAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.customer') - $arrange_index]);
                $quotations_model->setPrintingAttribute('');
                $quotations_model->setEnduserAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.enduser') - $arrange_index]);
            }
            $quotations_model->setProductAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.product') - $arrange_index]);
            $quotations_model->setProductionsetnumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.production_setnum') - $arrange_index]);
            $quotations_model->setProductionsetnumunitAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.production_setnum_unit') - $arrange_index]);
            $quotations_model->setProductionvolnumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.production_volnum') - $arrange_index]);
            $quotations_model->setProductionvolnumunitAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.production_volnum_unit') - $arrange_index]);
            $quotations_model->setProductionallAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.production_all') - $arrange_index]);
            $quotations_model->setUnitAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.unit') - $arrange_index]);
            // $quotations_model->setPapertrayAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setImpositionwAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setImpositionhAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            $quotations_model->setCylinderAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.cylinder') - $arrange_index]);
            $quotations_model->setCylindernumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.cylinder_num') - $arrange_index]);
            $quotations_model->setCylindersetAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.cylinder_set') - $arrange_index]);
            // $quotations_model->setSizewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setSizehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setSizetopAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setSizebottomAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            $quotations_model->setInchfoldAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.inch_fold') - $arrange_index]);
            $quotations_model->setPartsnumAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.parts_num') - $arrange_index],0,2));
            if (strlen($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.all_through') - $arrange_index]) > 7) {
                $quotations_model->setAllthroughAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.all_through') - $arrange_index],0,7));
                $arrange_index++;
                $quotationsdepartment_model->setWkakeAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],8,1));
                $quotationsdepartment_model->setDaenpinAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],9,1));
                $quotationsdepartment_model->setAna2Attribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],10,1));
                $quotationsdepartment_model->setAna6Attribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],11,1));
                $quotationsdepartment_model->setDonkoAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],12,1));
            } else {
                $quotations_model->setAllthroughAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.all_through') - $arrange_index]);
                $quotationsdepartment_model->setWkakeAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],0,1));
                $quotationsdepartment_model->setDaenpinAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],1,1));
                $quotationsdepartment_model->setAna2Attribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],2,1));
                $quotationsdepartment_model->setAna6Attribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],3,1));
                $quotationsdepartment_model->setDonkoAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.markflg_table') - $arrange_index],4,1));
            }
            // $quotations_model->setOfferedamountAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setPrintcostmaxAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            // $quotations_model->setPapercostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.rec_id') - $arrange_index]);
            $quotations_model->setCreateduserAttribute($login_user_code);
            $quotations_model->setCreatedatAttribute(Carbon::now());

            $quotationsdepartment_model->setKatanukiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.model_pullout_mark') - $arrange_index]);
            $quotationsdepartment_model->setKatanukioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.model_pullout_outsourcing') - $arrange_index]);
            $quotationsdepartment_model->setKatanukioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.model_pullout_outsourcing_cost') - $arrange_index]);
            $quotationsdepartment_model->setKasutoriAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.kasutori') - $arrange_index]);
            $quotationsdepartment_model->setKasutorioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.kasutori_outsou') - $arrange_index]);
            $quotationsdepartment_model->setKasutorioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.kasutori_outsou_cost') - $arrange_index]);
            $quotationsdepartment_model->setNisuAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.nisu_single') - $arrange_index]);
            $quotationsdepartment_model->setTsrtimesAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tsr_times') - $arrange_index]);
            $quotationsdepartment_model->setTsrthroughAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tsr_through') - $arrange_index]);
            $quotationsdepartment_model->setFormcolorchangeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.form_color_change') - $arrange_index]);
            $quotationsdepartment_model->setFormcarbonmoldAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.form_carbon_mold') - $arrange_index]);
            $quotationsdepartment_model->setFormalloutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.form_all_outsou') - $arrange_index]);
            $quotationsdepartment_model->setFormalloutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.form_all_outsou_cost') - $arrange_index]);
            $quotationsdepartment_model->setFormsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.form_subtotal') - $arrange_index]);
            $quotationsdepartment_model->setOffsetcolorchangeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.offset_color_change') - $arrange_index]);
            $quotationsdepartment_model->setOffsetcarbonmoldAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.offset_carbon_mold') - $arrange_index]);
            $quotationsdepartment_model->setOffsetsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.offset_subtotal') - $arrange_index]);
            $quotationsdepartment_model->setBlockcopyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.block_copy') - $arrange_index]);
            $quotationsdepartment_model->setKindsAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.kinds') - $arrange_index]);
            $quotationsdepartment_model->setDifficultyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.difficulty') - $arrange_index]);
            $quotationsdepartment_model->setPlatemakingoutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.plate_making_outsou') - $arrange_index]);
            $quotationsdepartment_model->setPlatemakingoutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.plate_making_outsou_cost') - $arrange_index]);
            $quotationsdepartment_model->setCtpAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.ctp') - $arrange_index]);
            $quotationsdepartment_model->setInkjetAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.inkjet') - $arrange_index]);
            $quotationsdepartment_model->setInkjetsheetAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.inkjet_sheet') - $arrange_index]);
            $quotationsdepartment_model->setOndemandcolorfrontAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.ondemand_color_front') - $arrange_index]);
            $quotationsdepartment_model->setOndemandcolorbackAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.ondemand_color_back') - $arrange_index]);
            $quotationsdepartment_model->setOndemandthroughfrontAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.ondemand_through_front') - $arrange_index]);
            $quotationsdepartment_model->setOndemandthroughbackAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.ondemand_through_back') - $arrange_index]);
            $quotationsdepartment_model->setPlatesubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.plate_subtotal') - $arrange_index]);
            $quotationsdepartment_model->setCollatorAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator') - $arrange_index]);
            $quotationsdepartment_model->setBebeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.bebe') - $arrange_index]);
            // Log::debug('setQuotationsItem00 $array_item collator'.$array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator') - $arrange_index]);
            // Log::debug('setQuotationsItem00 $array_item bebe'.$array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.bebe') - $arrange_index]);
            // Log::debug('setQuotationsItem00 $array_item tape_process'.$array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index]);
            $quotationsdepartment_model->setEnvelopeprocessAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index],0,1));
            $quotationsdepartment_model->setTapeprocessAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index],1,1));
            $quotationsdepartment_model->setPeelAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index],2,1));
            $quotationsdepartment_model->setPressAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index],3,1));
            $quotationsdepartment_model->setDonko2Attribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.tape_process') - $arrange_index],4,1));
            $quotationsdepartment_model->setCollatorcnoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_cno') - $arrange_index]);
            $quotationsdepartment_model->setCollatoranaAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_ana') - $arrange_index]);
            $quotationsdepartment_model->setCollatoralloutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_all_outsou') - $arrange_index]);
            $quotationsdepartment_model->setCollatoralloutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_all_outsou_cost') - $arrange_index]);
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_POS_00.collator_subtotal')) {
                $quotationsdepartment_model->setCollatorsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_subtotal') - $arrange_index]);
            }
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_POS_00.collator_basic_fee')) {
                $quotationsdepartment_model->setCollatorbasicfeeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.collator_basic_fee') - $arrange_index]);
            }
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_POS_00.sheetcut')) {
                $quotationsdepartment_model->setSheetcutAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_00.sheetcut') - $arrange_index]);
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  recid=99 項目設定
    //
    private function setQuotationsItem99($params, $array_item
                                        , $quotations_model
                                        , $quotationsbinding_model
                                        , $quotationscost_model
                                        , $quotationsdepartment_model)
    {
        $arrange_index = 0;     // 必ず｜があるとはかぎらないので indexを調整する数値
        try {
            // quotationsdepartment
            $quotationsdepartment_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.m_code') - $arrange_index]);
            $quotationsdepartment_model->setNlcolorAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_color') - $arrange_index]);
            $quotationsdepartment_model->setNlhagakiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_hagaki') - $arrange_index]);
            $quotationsdepartment_model->setNlhagakicolorAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_hagaki_color') - $arrange_index]);
            $quotationsdepartment_model->setNlenvelopecolorAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_envelope_color') - $arrange_index]);
            $quotationsdepartment_model->setNlnumberpartAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_number_part') - $arrange_index]);
            $quotationsdepartment_model->setNlsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.nl_subtotal') - $arrange_index]);
            // quotationsbinding_model
            $quotationsbinding_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.m_code') - $arrange_index]);
            $quotationsbinding_model->setSeitimeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_time') - $arrange_index]);
            $quotationsbinding_model->setSeichouaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_chouai') - $arrange_index]);
            $quotationsbinding_model->setSeichouaioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_chouai_outsou') - $arrange_index]);
            $quotationsbinding_model->setSeichouaioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_chouai_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeidansaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_dansai') - $arrange_index]);
            $quotationsbinding_model->setSeidansaioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_dansai_outsou') - $arrange_index]);
            $quotationsbinding_model->setSeidansaioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_dansai_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeimarbleAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_marble') - $arrange_index],0,1));
            $quotationsbinding_model->setSeicrossAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_cross') - $arrange_index],1,1));
            $quotationsbinding_model->setSeimatmakicardboardAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_mat_maki_cardboard') - $arrange_index],2,1));
            $quotationsbinding_model->setSeimatcardboardAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_mat_cardboard') - $arrange_index],3,1));
            $quotationsbinding_model->setSeinoriAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_nori') - $arrange_index]);
            $quotationsbinding_model->setSeitsuduriAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_tsuduri') - $arrange_index]);
            $quotationsbinding_model->setSeikurumiAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_kurumi') - $arrange_index],0,1));
            $quotationsbinding_model->setSeibusterAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_buster') - $arrange_index],1,1));
            $quotationsbinding_model->setSeicrimpingAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_crimping') - $arrange_index],2,1));
            $quotationsbinding_model->setSeilaminateAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_laminate') - $arrange_index]);
            $quotationsbinding_model->setSeilaminatethroughAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_laminate_through') - $arrange_index]);
            $quotationsbinding_model->setSeimusentoziAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_musen_tozi') - $arrange_index]);
            $quotationsbinding_model->setSeimusentozioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_musen_tozi_outsou') - $arrange_index]);
            $quotationsbinding_model->setSeimusentozioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_musen_tozi_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeinakatoziAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_naka_tozi') - $arrange_index],0,1));
            $quotationsbinding_model->setSeinakatozioutsouAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_naka_tozi_outsou') - $arrange_index],2,34));
            $quotationsbinding_model->setSeinakatozioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_naka_tozi_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeisashikomiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_sashikomi') - $arrange_index]);
            $quotationsbinding_model->setSeisashikomioutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_sashikomi_outsou') - $arrange_index]);
            $quotationsbinding_model->setSeisashikomioutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_sashikomi_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeianaAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_ana') - $arrange_index]);
            $quotationsbinding_model->setSeipartAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_part') - $arrange_index]);
            $quotationsbinding_model->setSeidonkoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_donko') - $arrange_index]);
            $quotationsbinding_model->setSeioriwAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_ori_w') - $arrange_index]);
            $quotationsbinding_model->setSeiorihAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_ori_h') - $arrange_index]);
            $quotationsbinding_model->setSeiobiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_obi') - $arrange_index]);
            $quotationsbinding_model->setSeibaraAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_bara') - $arrange_index],0,1));
            $quotationsbinding_model->setSeionesetAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_oneset') - $arrange_index],1,1));
            $quotationsbinding_model->setSeiobakeAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_obake') - $arrange_index],2,1));
            // $quotationsbinding_model->setSeiotoshiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_otoshi') - $arrange_index]);
            // $quotationsbinding_model->setSeiotoshipartAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_otoshi_part') - $arrange_index]);
            $quotationsbinding_model->setSeipackageAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_package') - $arrange_index]);
            $quotationsbinding_model->setSeipackagenumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_package_num') - $arrange_index]);
            $quotationsbinding_model->setSeiboxAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_box') - $arrange_index]);
            $quotationsbinding_model->setSeiboxnumAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_box_num') - $arrange_index]);
            $quotationsbinding_model->setSeiasystemAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_a_system') - $arrange_index],0,1));
            $quotationsbinding_model->setSeicsystemAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_c_system') - $arrange_index],1,1));
            $quotationsbinding_model->setSeivinylAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_vinyl') - $arrange_index],2,1));
            $quotationsbinding_model->setSeialloutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_all_outsou') - $arrange_index]);
            $quotationsbinding_model->setSeialloutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_all_outsou_cost') - $arrange_index]);
            $quotationsbinding_model->setSeisubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.sei_subtotal') - $arrange_index]);
            // quotationscost_model
            $quotationscost_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.m_code') - $arrange_index]);
            $quotationscost_model->setSendcityAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_city') - $arrange_index]);
            $quotationscost_model->setSendindouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_in_dou') - $arrange_index]);
            $quotationscost_model->setSendoutdouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_out_dou') - $arrange_index]);
            $quotationscost_model->setSendoutdouyenAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_out_dou_yen') - $arrange_index]);
            $quotationscost_model->setSendallAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_all') - $arrange_index]);
            $quotationscost_model->setSendsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.send_subtotal') - $arrange_index]);
            $quotationscost_model->setInsidehandworkAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.inside_hand_work') - $arrange_index]);
            $quotationscost_model->setInsideinsourcingcostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.inside_insourcing_cost') - $arrange_index]);
            $quotationscost_model->setOutsidejob1Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job1') - $arrange_index]);
            $quotationscost_model->setOutsidejob1OutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job1_outsou') - $arrange_index]);
            $quotationscost_model->setOutsidejob1OutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job1_outsou_cost') - $arrange_index]);
            $quotationscost_model->setOutsidejob2Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job2') - $arrange_index]);
            $quotationscost_model->setOutsidejob2OutsouAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job2_outsou') - $arrange_index]);
            $quotationscost_model->setOutsidejob2OutsoucostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_job2_outsou_cost') - $arrange_index]);
            $quotationscost_model->setOutsidesubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.outside_subtotal') - $arrange_index]);
            $quotationscost_model->setAdditioncost1Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost1') - $arrange_index]);
            $quotationscost_model->setAdditioncost1BuyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost1_buy') - $arrange_index]);
            $quotationscost_model->setAdditioncost2Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost2') - $arrange_index]);
            $quotationscost_model->setAdditioncost2BuyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost2_buy') - $arrange_index]);
            $quotationscost_model->setAdditioncost3Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost3') - $arrange_index]);
            $quotationscost_model->setAdditioncost3BuyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost3_buy') - $arrange_index]);
            $quotationscost_model->setAdditioncost4Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost4') - $arrange_index]);
            $quotationscost_model->setAdditioncost4BuyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost4_buy') - $arrange_index]);
            $quotationscost_model->setAdditioncost5Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost5') - $arrange_index]);
            $quotationscost_model->setAdditioncost5BuyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_cost5_buy') - $arrange_index]);
            $quotationscost_model->setAdditionsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.addition_subtotal') - $arrange_index]);
            $quotationscost_model->setProductalloutsou1Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou1') - $arrange_index]);
            $quotationscost_model->setProductalloutsou1CostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou1_cost') - $arrange_index]);
            $quotationscost_model->setProductalloutsou2Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou2') - $arrange_index]);
            $quotationscost_model->setProductalloutsou2CostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou2_cost') - $arrange_index]);
            $quotationscost_model->setProductalloutsou3Attribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou3') - $arrange_index]);
            $quotationscost_model->setProductalloutsou3CostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_outsou3_cost') - $arrange_index]);
            $quotationscost_model->setProductallsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.product_all_subtotal') - $arrange_index]);
            // quotations_model
            $quotations_model->setPaperamountAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.paper_amount') - $arrange_index]);
            $quotations_model->setWagesamountAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.wages_amount') - $arrange_index]);
            $quotations_model->setCostamountAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.cost_amount') - $arrange_index]);
            $quotations_model->setEstimateamountAttribute(
                str_replace("%0d","",str_replace("%0a","",$array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.estimate_amount') - $arrange_index])));
            $quotations_model->setCommentAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_POS_99.comment') - $arrange_index]);
        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  recid=01-15 項目設定
    //
    private function setQuotationsItemparts($params, $array_item, $quotationsparts_model, $seq)
    {
        $arrange_index = 0;     // 必ず｜があるとはかぎらないので indexを調整する数値
        try {
            $quotationsparts_model->setUsercodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.user_code') - $arrange_index]);
            $quotationsparts_model->setMcodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.m_code') - $arrange_index]);
            $quotationsparts_model->setSeqAttribute($seq);
            $quotationsparts_model->setPartscodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.rec_id') - $arrange_index]);
            $quotationsparts_model->setPapercodeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.paper_code') - $arrange_index]);
            $quotationsparts_model->setPapernameAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.paper_name') - $arrange_index]);
            $quotationsparts_model->setPsupplyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_supply') - $arrange_index]);
            $quotationsparts_model->setSizewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.size_w') - $arrange_index]);
            $quotationsparts_model->setSizehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.size_h') - $arrange_index]);
            $quotationsparts_model->setSizetopAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.size_top') - $arrange_index]);
            $quotationsparts_model->setSizebottomAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.size_bottom') - $arrange_index]);
            $quotationsparts_model->setPapertrayAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.papertray') - $arrange_index]);
            $quotationsparts_model->setImpositionwAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.imposition_w') - $arrange_index]);
            $quotationsparts_model->setImpositionhAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.imposition_h') - $arrange_index]);
            $quotationsparts_model->setPcolorfrontAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_color_front') - $arrange_index]);
            $quotationsparts_model->setPcolorbackAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_color_back') - $arrange_index]);
            $quotationsparts_model->setPdesensitizationAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_desensitization') - $arrange_index],0,1));
            $quotationsparts_model->setPcarbonAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_carbon') - $arrange_index],1,1));
            $quotationsparts_model->setPwhiteAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_white') - $arrange_index],2,1));
            $quotationsparts_model->setPseparateAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_separate') - $arrange_index],3,1));
            if (strlen($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index]) > 7) {
                $quotationsparts_model->setPthroughAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index],0,7));
                $quotationsparts_model->setPsheetAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index],8,7));
                if (strlen($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index]) > 16) {
                    $quotationsparts_model->setPmmapplyAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index],16,6));
                    $arrange_index++;
                    $arrange_index++;
                } else {
                    $arrange_index++;
                    $quotationsparts_model->setPmmapplyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_mm_apply') - $arrange_index]);
                }
            } else {
                $quotationsparts_model->setPthroughAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_through') - $arrange_index]);
                $quotationsparts_model->setPsheetAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_sheet') - $arrange_index]);
                $quotationsparts_model->setPmmapplyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_mm_apply') - $arrange_index]);
            }
            $quotationsparts_model->setPmmdisposeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_mm_dispose') - $arrange_index]);
            $quotationsparts_model->setPmmunitAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_mm_unit') - $arrange_index]);
            if (strlen($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index]) > 6) {
                $quotationsparts_model->setPprintingcostAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index],0,6));
                $quotationsparts_model->setPnecessarysheetAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index],8,7));
                if (strlen($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index]) > 15) {
                    $quotationsparts_model->setPpaperpriceAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index],15,8));
                    $arrange_index++;
                    $arrange_index++;
                } else {
                    $arrange_index++;
                    $quotationsparts_model->setPmmapplyAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_mm_apply') - $arrange_index]);
                }
            } else {
                $quotationsparts_model->setPprintingcostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_printing_cost') - $arrange_index]);
                $quotationsparts_model->setPnecessarysheetAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_necessary_sheet') - $arrange_index]);
                $quotationsparts_model->setPpaperpriceAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_paper_price') - $arrange_index]);
            }
            $quotationsparts_model->setPformsewingmachinewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_sewingmachine_w') - $arrange_index]);
            $quotationsparts_model->setPformsewingmachinehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_sewingmachine_h') - $arrange_index]);
            $quotationsparts_model->setPformjumpsewingmachinewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_sewingmachine_w') - $arrange_index]);
            $quotationsparts_model->setPformjumpsewingmachinehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_sewingmachine_h') - $arrange_index]);
            $quotationsparts_model->setPformmicrosewingmachinewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_micro_sewingmachine_w') - $arrange_index]);
            $quotationsparts_model->setPformmicrosewingmachinehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_micro_sewingmachine_h') - $arrange_index]);
            $quotationsparts_model->setPformjumpmicrosewingmachinewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_micro_sewingmachine_w') - $arrange_index]);
            $quotationsparts_model->setPformjumpmicrosewingmachinehAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_micro_sewingmachine_h') - $arrange_index]);
            $quotationsparts_model->setPformlineinwAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_linein_w') - $arrange_index]);
            $quotationsparts_model->setPformlineinhAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_linein_h') - $arrange_index]);
            $quotationsparts_model->setPformslitterwAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_slitter_w') - $arrange_index]);
            $quotationsparts_model->setPformslitterhAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_slitter_h') - $arrange_index]);
            $quotationsparts_model->setPformnoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_no') - $arrange_index]);
            $quotationsparts_model->setPformsewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_sewingmachine_ks') - $arrange_index],0,1));
            $quotationsparts_model->setPformjumpsewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_sewingmachine_ks') - $arrange_index],1,1));
            $quotationsparts_model->setPformmicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_micro_sewingmachine_ks') - $arrange_index],2,1));
            $quotationsparts_model->setPformjumpmicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_jump_micro_sewingmachine_ks') - $arrange_index],3,1));
            $quotationsparts_model->setPformlineinksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_linein_ks') - $arrange_index],4,1));
            $quotationsparts_model->setPformslitterksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_slitter_ks') - $arrange_index],5,1));
            $quotationsparts_model->setPformnoksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_no_ks') - $arrange_index],6,1));
            $quotationsparts_model->setPformsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_subtotal') - $arrange_index]);
            $quotationsparts_model->setPoffsetsewingmachinewAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_offset_sewingmachine_w') - $arrange_index]);
            $quotationsparts_model->setPoffsetnoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_offset_no') - $arrange_index]);
            $quotationsparts_model->setPoffsetsewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_offset_sewingmachine_ks') - $arrange_index],0,1));
            $quotationsparts_model->setPoffsetnoksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_offset_no_ks') - $arrange_index],1,1));
            $quotationsparts_model->setPoffsetsubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_offset_subtotal') - $arrange_index]);
            $quotationsparts_model->setPletterpresssewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpresssewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpressjumpsewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpressjumpsewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpressmicrosewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_micro_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpressmicrosewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_micro_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpressjumpmicrosewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_micro_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpressjumpmicrosewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_micro_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpresslineinhonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_linein_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpresslineindaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_linein_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpressslitterhonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_slitter_hon') - $arrange_index]);
            $quotationsparts_model->setPletterpressslitterdaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_slitter_dai') - $arrange_index]);
            $quotationsparts_model->setPletterpressdiecutAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_diecut') - $arrange_index]);
            $quotationsparts_model->setPletterpresspcnoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_pcno') - $arrange_index]);
            $quotationsparts_model->setPletterpressnoAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_no') - $arrange_index]);
            $quotationsparts_model->setPletterpresssewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_sewingmachine_ks') - $arrange_index],0,1));
            $quotationsparts_model->setPletterpressjumpsewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_sewingmachine_ks') - $arrange_index],1,1));
            $quotationsparts_model->setPletterpressmicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_micro_sewingmachine_ks') - $arrange_index],2,1));
            $quotationsparts_model->setPletterpressjumpmicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_jump_micro_sewingmachine_ks') - $arrange_index],3,1));
            $quotationsparts_model->setPletterpresslineinksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_linein_ks') - $arrange_index],4,1));
            $quotationsparts_model->setPletterpressslitterksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_slitter_ks') - $arrange_index],5,1));
            $quotationsparts_model->setPletterpressdiecutksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_diecut_ks') - $arrange_index],6,1));
            $quotationsparts_model->setPletterpresspcnoksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_pcno_ks') - $arrange_index],7,1));
            $quotationsparts_model->setPletterpressnoksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_no_ks') - $arrange_index],8,1));
            $quotationsparts_model->setPletterpresssubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_letterpress_subtotal') - $arrange_index]);
            $quotationsparts_model->setPinfotorayAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_toray') - $arrange_index]);
            $quotationsparts_model->setPinfoijpAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_ijp') - $arrange_index]);
            $quotationsparts_model->setPinfodotlineAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_dot_line') - $arrange_index]);
            $quotationsparts_model->setPinfodotdaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_dot_dai') - $arrange_index]);
            $quotationsparts_model->setPinfobasicfeeAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_basic_fee') - $arrange_index]);
            $quotationsparts_model->setPinfooutputAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_output') - $arrange_index]);
            $quotationsparts_model->setPinfopunchingAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_punching') - $arrange_index]);
            $quotationsparts_model->setPinfosubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_info_subtotal') - $arrange_index]);
            $quotationsparts_model->setPdiecuttersewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPdiecuttersewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecutterjumpsewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPdiecutterjumpsewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecuttermicrosewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_micro_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPdiecuttermicrosewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_micro_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecutterjumpmicrosewingmachinehonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_micro_sewingmachine_hon') - $arrange_index]);
            $quotationsparts_model->setPdiecutterjumpmicrosewingmachinedaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_micro_sewingmachine_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecutteranahonAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_ana_hon') - $arrange_index]);
            $quotationsparts_model->setPdiecutteranadaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_ana_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecuttercornercutAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_cornercut') - $arrange_index]);
            $quotationsparts_model->setPdiecuttercornercutdaiAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_cornercut_dai') - $arrange_index]);
            $quotationsparts_model->setPdiecuttersewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_sewingmachine_ks') - $arrange_index],0,1));
            $quotationsparts_model->setPdiecutterjumpsewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_sewingmachine_ks') - $arrange_index],1,1));
            $quotationsparts_model->setPdiecuttermicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_micro_sewingmachine_ks') - $arrange_index],2,1));
            $quotationsparts_model->setPdiecutterjumpmicrosewingmachineksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_jump_micro_sewingmachine_ks') - $arrange_index],3,1));
            $quotationsparts_model->setPdiecutteranaksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_ana_ks') - $arrange_index],4,1));
            $quotationsparts_model->setPdiecuttercornercutksAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_cornercut_ks') - $arrange_index],5,1));
            $quotationsparts_model->setPdiecuttersubtotalAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_diecutter_subtotal') - $arrange_index]);
            $quotationsparts_model->setOutsourcepaperAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.outsource_paper') - $arrange_index]);
            $quotationsparts_model->setOutsourcepapercostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.outsource_paper_cost') - $arrange_index]);
            $quotationsparts_model->setOutsourcepaperallAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.outsource_paper_all') - $arrange_index]);
            $quotationsparts_model->setOutsourcepaperallcostAttribute($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.outsource_paper_all_cost') - $arrange_index]);
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_cornercut') - $arrange_index) {
                $quotationsparts_model->setPformcornercutAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_cornercut') - $arrange_index],0,1));
            }
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_replace') - $arrange_index) {
                $quotationsparts_model->setPformreplaceAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_replace') - $arrange_index],1,1));
            }
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_replace_color') - $arrange_index) {
                $quotationsparts_model->setPformreplacecolorAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_form_replace_color') - $arrange_index],2,1));
            }
            if (count($array_item) > (int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_envelope') - $arrange_index) {
                $quotationsparts_model->setPenvelopeAttribute(substr($array_item[(int)Config::get('const.MITUMORI_DAT_LEN_PARTS.p_envelope') - $arrange_index],2,1));
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  quotations項目設定
    //
    private function setArrayQuotations($quotations_model)
    {
        try {
            return array (
                'user_code' => $quotations_model->getUsercodeAttribute(),
                'm_code' => $quotations_model->getMcodeAttribute(),
                'wm_code' => $quotations_model->getWmcodeAttribute(),
                'wm_sub' => $quotations_model->getWmsubAttribute(),
                'reference_num' => $quotations_model->getReferencenumAttribute(),
                'create_date' => $quotations_model->getCreatedateAttribute(),
                'lastorder_date' => $quotations_model->getLastorderdateAttribute(),
                'number_order' => $quotations_model->getNumberorderAttribute(),
                'manager_code' => $quotations_model->getManagercodeAttribute(),
                'manager' => $quotations_model->getManagerAttribute(),
                'customer_code' => $quotations_model->getCustomercodeAttribute(),
                'customer' => $quotations_model->getCustomerAttribute(),
                'printing' => $quotations_model->getPrintingAttribute(),
                'enduser' => $quotations_model->getEnduserAttribute(),
                'product' => $quotations_model->getProductAttribute(),
                'production_setnum' => $quotations_model->getProductionsetnumAttribute(),
                'production_setnum_unit' => $quotations_model->getProductionsetnumunitAttribute(),
                'production_volnum' => $quotations_model->getProductionvolnumAttribute(),
                'production_volnum_unit' => $quotations_model->getProductionvolnumunitAttribute(),
                'production_all' => $quotations_model->getProductionallAttribute(),
                'unit' => $quotations_model->getUnitAttribute(),
                'papertray' => $quotations_model->getPapertrayAttribute(),
                'imposition_w' => $quotations_model->getImpositionwAttribute(),
                'imposition_h' => $quotations_model->getImpositionhAttribute(),
                'cylinder' => $quotations_model->getCylinderAttribute(),
                'cylinder_num' => $quotations_model->getCylindernumAttribute(),
                'cylinder_set' => $quotations_model->getCylindersetAttribute(),
                'size_w' => $quotations_model->getSizewAttribute(),
                'size_h' => $quotations_model->getSizehAttribute(),
                'size_top' => $quotations_model->getSizetopAttribute(),
                'size_bottom' => $quotations_model->getSizebottomAttribute(),
                'inch_fold' => $quotations_model->getInchfoldAttribute(),
                'parts_num' => $quotations_model->getPartsnumAttribute(),
                'all_through' => $quotations_model->getAllthroughAttribute(),
                'paper_amount' => $quotations_model->getPaperamountAttribute(),
                'wages_amount' => $quotations_model->getWagesamountAttribute(),
                'cost_amount' => $quotations_model->getCostamountAttribute(),
                'estimate_amount' => $quotations_model->getEstimateamountAttribute(),
                'comment' => $quotations_model->getCommentAttribute(),
                'offered_amount' => $quotations_model->getOfferedamountAttribute(),
                'print_cost_max' => $quotations_model->getPrintcostmaxAttribute(),
                'paper_cost' => $quotations_model->getPapercostAttribute(),
                'created_user' => $quotations_model->getCreateduserAttribute(),
                'created_at' => $quotations_model->getCreatedatAttribute(),
                'is_deleted' => 0
            );
        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  setArrayQuotationBinding項目設定
    //
    private function setArrayQuotationBinding($quotationsbinding_model)
    {
        try {
            return array (
                'm_code' => $quotationsbinding_model->getMcodeAttribute(),
                'sei_time' => $quotationsbinding_model->getSeitimeAttribute(),
                'sei_chouai' => $quotationsbinding_model->getSeichouaiAttribute(),
                'sei_chouai_outsou' => $quotationsbinding_model->getSeichouaioutsouAttribute(),
                'sei_chouai_outsou_cost' => $quotationsbinding_model->getSeichouaioutsoucostAttribute(),
                'sei_dansai' => $quotationsbinding_model->getSeidansaiAttribute(),
                'sei_dansai_outsou' => $quotationsbinding_model->getSeidansaioutsouAttribute(),
                'sei_dansai_outsou_cost' => $quotationsbinding_model->getSeidansaioutsoucostAttribute(),
                'sei_marble' => $quotationsbinding_model->getSeimarbleAttribute(),
                'sei_cross' => $quotationsbinding_model->getSeicrossAttribute(),
                'sei_mat_maki_cardboard' => $quotationsbinding_model->getSeimatmakicardboardAttribute(),
                'sei_mat_cardboard' => $quotationsbinding_model->getSeimatcardboardAttribute(),
                'sei_nori' => $quotationsbinding_model->getSeinoriAttribute(),
                'sei_tsuduri' => $quotationsbinding_model->getSeitsuduriAttribute(),
                'sei_kurumi' => $quotationsbinding_model->getSeikurumiAttribute(),
                'sei_laminate' => $quotationsbinding_model->getSeilaminateAttribute(),
                'sei_laminate_through' => $quotationsbinding_model->getSeilaminatethroughAttribute(),
                'sei_buster' => $quotationsbinding_model->getSeibusterAttribute(),
                'sei_crimping' => $quotationsbinding_model->getSeicrimpingAttribute(),
                'sei_musen_tozi' => $quotationsbinding_model->getSeimusentoziAttribute(),
                'sei_musen_tozi_outsou' => $quotationsbinding_model->getSeimusentozioutsouAttribute(),
                'sei_musen_tozi_outsou_cost' => $quotationsbinding_model->getSeimusentozioutsoucostAttribute(),
                'sei_naka_tozi' => $quotationsbinding_model->getSeinakatoziAttribute(),
                'sei_naka_tozi_outsou' => $quotationsbinding_model->getSeinakatozioutsouAttribute(),
                'sei_naka_tozi_outsou_cost' => $quotationsbinding_model->getSeinakatozioutsoucostAttribute(),
                'sei_sashikomi' => $quotationsbinding_model->getSeisashikomiAttribute(),
                'sei_sashikomi_outsou' => $quotationsbinding_model->getSeisashikomioutsouAttribute(),
                'sei_sashikomi_outsou_cost' => $quotationsbinding_model->getSeisashikomioutsoucostAttribute(),
                'sei_ana' => $quotationsbinding_model->getSeianaAttribute(),
                'sei_part' => $quotationsbinding_model->getSeipartAttribute(),
                'sei_donko' => $quotationsbinding_model->getSeidonkoAttribute(),
                'sei_ori_w' => $quotationsbinding_model->getSeioriwAttribute(),
                'sei_ori_h' => $quotationsbinding_model->getSeiorihAttribute(),
                'sei_obi' => $quotationsbinding_model->getSeiobiAttribute(),
                'sei_bara' => $quotationsbinding_model->getSeibaraAttribute(),
                'sei_oneset' => $quotationsbinding_model->getSeionesetAttribute(),
                'sei_obake' => $quotationsbinding_model->getSeiobakeAttribute(),
                'sei_otoshi' => $quotationsbinding_model->getSeiotoshiAttribute(),
                'sei_otoshi_part' => $quotationsbinding_model->getSeiotoshipartAttribute(),
                'sei_package' => $quotationsbinding_model->getSeipackageAttribute(),
                'sei_package_num' => $quotationsbinding_model->getSeipackagenumAttribute(),
                'sei_box' => $quotationsbinding_model->getSeiboxAttribute(),
                'sei_box_num' => $quotationsbinding_model->getSeiboxnumAttribute(),
                'sei_a_system' => $quotationsbinding_model->getSeiasystemAttribute(),
                'sei_c_system' => $quotationsbinding_model->getSeicsystemAttribute(),
                'sei_vinyl' => $quotationsbinding_model->getSeivinylAttribute(),
                'sei_all_outsou' => $quotationsbinding_model->getSeialloutsouAttribute(),
                'sei_all_outsou_cost' => $quotationsbinding_model->getSeialloutsoucostAttribute(),
                'sei_subtotal' => $quotationsbinding_model->getSeisubtotalAttribute(),
                'created_user' => $quotationsbinding_model->getCreateduserAttribute(),
                'created_at' => $quotationsbinding_model->getCreatedatAttribute(),
                'is_deleted' => 0
            );

        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  quotations_cost 見積金額 項目設定
    //
    private function setArrayQuotationCost($quotationscost_model)
    {
        try {
            return array (
                'm_code' => $quotationscost_model->getMcodeAttribute(),
                'send_city' => $quotationscost_model->getSendcityAttribute(),
                'send_in_dou' => $quotationscost_model->getSendindouAttribute(),
                'send_out_dou' => $quotationscost_model->getSendoutdouAttribute(),
                'send_out_dou_yen' => $quotationscost_model->getSendoutdouyenAttribute(),
                'send_all' => $quotationscost_model->getSendallAttribute(),
                'send_subtotal' => $quotationscost_model->getSendsubtotalAttribute(),
                'inside_hand_work' => $quotationscost_model->getInsidehandworkAttribute(),
                'inside_insourcing_cost' => $quotationscost_model->getInsideinsourcingcostAttribute(),
                'outside_job1' => $quotationscost_model->getOutsidejob1Attribute(),
                'outside_job1_outsou' => $quotationscost_model->getOutsidejob1OutsouAttribute(),
                'outside_job1_outsou_cost' => $quotationscost_model->getOutsidejob1OutsoucostAttribute(),
                'outside_job2' => $quotationscost_model->getOutsidejob2Attribute(),
                'outside_job2_outsou' => $quotationscost_model->getOutsidejob2OutsouAttribute(),
                'outside_job2_outsou_cost' => $quotationscost_model->getOutsidejob2OutsoucostAttribute(),
                'outside_subtotal' => $quotationscost_model->getOutsidesubtotalAttribute(),
                'addition_cost1' => $quotationscost_model->getAdditioncost1Attribute(),
                'addition_cost1_buy' => $quotationscost_model->getAdditioncost1BuyAttribute(),
                'addition_cost2' => $quotationscost_model->getAdditioncost2Attribute(),
                'addition_cost2_buy' => $quotationscost_model->getAdditioncost2BuyAttribute(),
                'addition_cost3' => $quotationscost_model->getAdditioncost3Attribute(),
                'addition_cost3_buy' => $quotationscost_model->getAdditioncost3BuyAttribute(),
                'addition_cost4' => $quotationscost_model->getAdditioncost4Attribute(),
                'addition_cost4_buy' => $quotationscost_model->getAdditioncost4BuyAttribute(),
                'addition_cost5' => $quotationscost_model->getAdditioncost5Attribute(),
                'addition_cost5_buy' => $quotationscost_model->getAdditioncost5BuyAttribute(),
                'addition_subtotal' => $quotationscost_model->getAdditionsubtotalAttribute(),
                'product_all_outsou1' => $quotationscost_model->getProductalloutsou1Attribute(),
                'product_all_outsou1_cost' => $quotationscost_model->getProductalloutsou1CostAttribute(),
                'product_all_outsou2' => $quotationscost_model->getProductalloutsou2Attribute(),
                'product_all_outsou2_cost' => $quotationscost_model->getProductalloutsou2CostAttribute(),
                'product_all_outsou3' => $quotationscost_model->getProductalloutsou3Attribute(),
                'product_all_outsou3_cost' => $quotationscost_model->getProductalloutsou3CostAttribute(),
                'product_all_subtotal' => $quotationscost_model->getProductallsubtotalAttribute(),
                'created_user' => $quotationscost_model->getCreateduserAttribute(),
                'created_at' => $quotationscost_model->getCreatedatAttribute(),
                'is_deleted' => 0
            );

        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  quotations_cost 見積金額 項目設定
    //
    private function setArrayQuotationDepartment($quotationsdepartment_model)
    {
        try {
            return array (
                'm_code' => $quotationsdepartment_model->getMcodeAttribute(),
                'wkake' => $quotationsdepartment_model->getWkakeAttribute(),
                'daenpin' => $quotationsdepartment_model->getDaenpinAttribute(),
                'ana2' => $quotationsdepartment_model->getAna2Attribute(),
                'ana6' => $quotationsdepartment_model->getAna6Attribute(),
                'donko' => $quotationsdepartment_model->getDonkoAttribute(),
                'katanuki' => $quotationsdepartment_model->getKatanukiAttribute(),
                'katanuki_outsou' => $quotationsdepartment_model->getKatanukioutsouAttribute(),
                'katanuki_outsou_cost' => $quotationsdepartment_model->getKatanukioutsoucostAttribute(),
                'kasutori' => $quotationsdepartment_model->getKasutoriAttribute(),
                'kasutori_outsou' => $quotationsdepartment_model->getKasutorioutsouAttribute(),
                'kasutori_outsou_cost' => $quotationsdepartment_model->getKasutorioutsoucostAttribute(),
                'nisu' => $quotationsdepartment_model->getNisuAttribute(),
                'nisu_through' => $quotationsdepartment_model->getNisuthroughAttribute(),
                'tsr_times' => $quotationsdepartment_model->getTsrtimesAttribute(),
                'tsr_through' => $quotationsdepartment_model->getTsrthroughAttribute(),
                'form_color_change' => $quotationsdepartment_model->getFormcolorchangeAttribute(),
                'form_carbon_mold' => $quotationsdepartment_model->getFormcarbonmoldAttribute(),
                'form_all_outsou' => $quotationsdepartment_model->getFormalloutsouAttribute(),
                'form_all_outsou_cost' => $quotationsdepartment_model->getFormalloutsoucostAttribute(),
                'form_subtotal' => $quotationsdepartment_model->getFormsubtotalAttribute(),
                'offset_color_change' => $quotationsdepartment_model->getOffsetcolorchangeAttribute(),
                'offset_carbon_mold' => $quotationsdepartment_model->getOffsetcarbonmoldAttribute(),
                'offset_subtotal' => $quotationsdepartment_model->getOffsetsubtotalAttribute(),
                'block_copy' => $quotationsdepartment_model->getBlockcopyAttribute(),
                'kinds' => $quotationsdepartment_model->getKindsAttribute(),
                'difficulty' => $quotationsdepartment_model->getDifficultyAttribute(),
                'plate_making_outsou' => $quotationsdepartment_model->getPlatemakingoutsouAttribute(),
                'plate_making_outsou_cost' => $quotationsdepartment_model->getPlatemakingoutsoucostAttribute(),
                'ctp' => $quotationsdepartment_model->getCtpAttribute(),
                'inkjet' => $quotationsdepartment_model->getInkjetAttribute(),
                'inkjet_sheet' => $quotationsdepartment_model->getInkjetsheetAttribute(),
                'ondemand_color_front' => $quotationsdepartment_model->getOndemandcolorfrontAttribute(),
                'ondemand_color_back' => $quotationsdepartment_model->getOndemandcolorbackAttribute(),
                'ondemand_through_front' => $quotationsdepartment_model->getOndemandthroughfrontAttribute(),
                'ondemand_through_back' => $quotationsdepartment_model->getOndemandthroughbackAttribute(),
                'plate_subtotal' => $quotationsdepartment_model->getPlatesubtotalAttribute(),
                'collator' => $quotationsdepartment_model->getCollatorAttribute(),
                'bebe' => $quotationsdepartment_model->getBebeAttribute(),
                'envelope_process' => $quotationsdepartment_model->getEnvelopeprocessAttribute(),
                'tape_process' => $quotationsdepartment_model->getTapeprocessAttribute(),
                'peel' => $quotationsdepartment_model->getPeelAttribute(),
                'press' => $quotationsdepartment_model->getPressAttribute(),
                'sheetcut' => $quotationsdepartment_model->getSheetcutAttribute(),
                'collator_cno' => $quotationsdepartment_model->getCollatorcnoAttribute(),
                'collator_ana' => $quotationsdepartment_model->getCollatoranaAttribute(),
                'collator_all_outsou' => $quotationsdepartment_model->getCollatoralloutsouAttribute(),
                'collator_all_outsou_cost' => $quotationsdepartment_model->getCollatoralloutsoucostAttribute(),
                'collator_subtotal' => $quotationsdepartment_model->getCollatorsubtotalAttribute(),
                'collator_basic_fee' => $quotationsdepartment_model->getCollatorbasicfeeAttribute(),
                'nl_color' => $quotationsdepartment_model->getNlcolorAttribute(),
                'nl_hagaki' => $quotationsdepartment_model->getNlhagakiAttribute(),
                'nl_hagaki_color' => $quotationsdepartment_model->getNlhagakicolorAttribute(),
                'nl_envelope_color' => $quotationsdepartment_model->getNlenvelopecolorAttribute(),
                'nl_number_part' => $quotationsdepartment_model->getNlnumberpartAttribute(),
                'nl_subtotal' => $quotationsdepartment_model->getNlsubtotalAttribute(),
                'created_user' => $quotationsdepartment_model->getCreateduserAttribute(),
                'created_at' => $quotationsdepartment_model->getCreatedatAttribute(),
                'is_deleted' => 0
            );

        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  setArrayQuotationParts項目設定
    //
    private function setArrayQuotationParts($quotationsparts_model)
    {
        try {
            return array (
                'user_code' => $quotationsparts_model->getUsercodeAttribute(),
                'm_code' => $quotationsparts_model->getMcodeAttribute(),
                'seq' => $quotationsparts_model->getSeqAttribute(),
                'parts_code' => $quotationsparts_model->getPartscodeAttribute(),
                'paper_code'  => $quotationsparts_model->getPapercodeAttribute(),
                'paper_name' => $quotationsparts_model->getPapernameAttribute(),
                'p_supply'  => $quotationsparts_model->getPsupplyAttribute(),
                'size_w' => $quotationsparts_model->getSizewAttribute(),
                'size_h' => $quotationsparts_model->getSizehAttribute(),
                'size_top' => $quotationsparts_model->getSizetopAttribute(),
                'size_bottom' => $quotationsparts_model->getSizebottomAttribute(),
                'papertray' => $quotationsparts_model->getPapertrayAttribute(),
                'imposition_w' => $quotationsparts_model->getImpositionwAttribute(),
                'imposition_h' => $quotationsparts_model->getImpositionhAttribute(),
                'p_color_front' => $quotationsparts_model->getPcolorfrontAttribute(),
                'p_color_back' => $quotationsparts_model->getPcolorbackAttribute(),
                'p_desensitization' => $quotationsparts_model->getPdesensitizationAttribute(),
                'p_carbon' => $quotationsparts_model->getPcarbonAttribute(),
                'p_white' => $quotationsparts_model->getPwhiteAttribute(),
                'p_separate' => $quotationsparts_model->getPseparateAttribute(),
                'p_through' => $quotationsparts_model->getPthroughAttribute(),
                'p_sheet' => $quotationsparts_model->getPsheetAttribute(),
                'p_mm_apply' => $quotationsparts_model->getPmmapplyAttribute(),
                'p_mm_dispose' => $quotationsparts_model->getPmmdisposeAttribute(),
                'p_mm_unit' => $quotationsparts_model->getPmmunitAttribute(),
                'p_printing_cost' => $quotationsparts_model->getPprintingcostAttribute(),
                'p_necessary_sheet' => $quotationsparts_model->getPnecessarysheetAttribute(),
                'p_paper_price' => $quotationsparts_model->getPpaperpriceAttribute(),
                'p_form_sewingmachine_w' => $quotationsparts_model->getPformsewingmachinewAttribute(),
                'p_form_sewingmachine_h' => $quotationsparts_model->getPformsewingmachinehAttribute(),
                'p_form_jump_sewingmachine_w' => $quotationsparts_model->getPformjumpsewingmachinewAttribute(),
                'p_form_jump_sewingmachine_h' => $quotationsparts_model->getPformjumpsewingmachinehAttribute(),
                'p_form_micro_sewingmachine_w' => $quotationsparts_model->getPformmicrosewingmachinewAttribute(),
                'p_form_micro_sewingmachine_h' => $quotationsparts_model->getPformmicrosewingmachinehAttribute(),
                'p_form_jump_micro_sewingmachine_w' => $quotationsparts_model->getPformjumpmicrosewingmachinewAttribute(),
                'p_form_jump_micro_sewingmachine_h' => $quotationsparts_model->getPformjumpmicrosewingmachinehAttribute(),
                'p_form_linein_w' => $quotationsparts_model->getPformlineinwAttribute(),
                'p_form_linein_h' => $quotationsparts_model->getPformlineinhAttribute(),
                'p_form_slitter_w' => $quotationsparts_model->getPformslitterwAttribute(),
                'p_form_slitter_h' => $quotationsparts_model->getPformslitterhAttribute(),
                'p_form_no' => $quotationsparts_model->getPformnoAttribute(),
                'p_form_sewingmachine_ks' => $quotationsparts_model->getPformsewingmachineksAttribute(),
                'p_form_jump_sewingmachine_ks' => $quotationsparts_model->getPformjumpsewingmachineksAttribute(),
                'p_form_micro_sewingmachine_ks' => $quotationsparts_model->getPformmicrosewingmachineksAttribute(),
                'p_form_jump_micro_sewingmachine_ks' => $quotationsparts_model->getPformjumpmicrosewingmachineksAttribute(),
                'p_form_linein_ks' => $quotationsparts_model->getPformlineinksAttribute(),
                'p_form_slitter_ks'  => $quotationsparts_model->getPformslitterksAttribute(),
                'p_form_no_ks' => $quotationsparts_model->getPformnoksAttribute(),
                'p_form_subtotal' => $quotationsparts_model->getPformsubtotalAttribute(),
                'p_offset_sewingmachine_w' => $quotationsparts_model->getPoffsetsewingmachinewAttribute(),
                'p_offset_no' => $quotationsparts_model->getPoffsetnoAttribute(),
                'p_offset_sewingmachine_ks' => $quotationsparts_model->getPoffsetsewingmachineksAttribute(),
                'p_offset_no_ks' => $quotationsparts_model->getPoffsetnoksAttribute(),
                'p_offset_subtotal' => $quotationsparts_model->getPoffsetsubtotalAttribute(),
                'p_letterpress_sewingmachine_hon' => $quotationsparts_model->getPletterpresssewingmachinehonAttribute(),
                'p_letterpress_sewingmachine_dai' => $quotationsparts_model->getPletterpresssewingmachinedaiAttribute(),
                'p_letterpress_jump_sewingmachine_hon' => $quotationsparts_model->getPletterpressjumpsewingmachinehonAttribute(),
                'p_letterpress_jump_sewingmachine_dai' => $quotationsparts_model->getPletterpressjumpsewingmachinedaiAttribute(),
                'p_letterpress_micro_sewingmachine_hon' => $quotationsparts_model->getPletterpressmicrosewingmachinehonAttribute(),
                'p_letterpress_micro_sewingmachine_dai' => $quotationsparts_model->getPletterpressmicrosewingmachinedaiAttribute(),
                'p_letterpress_jump_micro_sewingmachine_hon' => $quotationsparts_model->getPletterpressjumpmicrosewingmachinehonAttribute(),
                'p_letterpress_jump_micro_sewingmachine_dai' => $quotationsparts_model->getPletterpressjumpmicrosewingmachinedaiAttribute(),
                'p_letterpress_linein_hon' => $quotationsparts_model->getPletterpresslineinhonAttribute(),
                'p_letterpress_linein_dai' => $quotationsparts_model->getPletterpresslineindaiAttribute(),
                'p_letterpress_slitter_hon' => $quotationsparts_model->getPletterpressslitterhonAttribute(),
                'p_letterpress_slitter_dai' => $quotationsparts_model->getPletterpressslitterdaiAttribute(),
                'p_letterpress_diecut' => $quotationsparts_model->getPletterpressdiecutAttribute(),
                'p_letterpress_pcno' => $quotationsparts_model->getPletterpresspcnoAttribute(),
                'p_letterpress_no' => $quotationsparts_model->getPletterpressnoAttribute(),
                'p_letterpress_sewingmachine_ks' => $quotationsparts_model->getPletterpresssewingmachineksAttribute(),
                'p_letterpress_jump_sewingmachine_ks' => $quotationsparts_model->getPletterpressjumpsewingmachineksAttribute(),
                'p_letterpress_micro_sewingmachine_ks' => $quotationsparts_model->getPletterpressmicrosewingmachineksAttribute(),
                'p_letterpress_jump_micro_sewingmachine_ks' => $quotationsparts_model->getPletterpressjumpmicrosewingmachineksAttribute(),
                'p_letterpress_linein_ks' => $quotationsparts_model->getPletterpresslineinksAttribute(),
                'p_letterpress_slitter_ks' => $quotationsparts_model->getPletterpressslitterksAttribute(),
                'p_letterpress_diecut_ks' => $quotationsparts_model->getPletterpressdiecutksAttribute(),
                'p_letterpress_pcno_ks'  => $quotationsparts_model->getPletterpresspcnoksAttribute(),
                'p_letterpress_no_ks' => $quotationsparts_model->getPletterpressnoksAttribute(),
                'p_letterpress_subtotal' => $quotationsparts_model->getPletterpresssubtotalAttribute(),
                'p_info_toray' => $quotationsparts_model->getPinfotorayAttribute(),
                'p_info_ijp' => $quotationsparts_model->getPinfoijpAttribute(),
                'p_info_dot_line' => $quotationsparts_model->getPinfodotlineAttribute(),
                'p_info_dot_dai' => $quotationsparts_model->getPinfodotdaiAttribute(),
                'p_info_basic_fee' => $quotationsparts_model->getPinfobasicfeeAttribute(),
                'p_info_output' => $quotationsparts_model->getPinfooutputAttribute(),
                'p_info_punching' => $quotationsparts_model->getPinfopunchingAttribute(),
                'p_info_subtotal' => $quotationsparts_model->getPinfosubtotalAttribute(),
                'p_diecutter_sewingmachine_hon' => $quotationsparts_model->getPdiecuttersewingmachinehonAttribute(),
                'p_diecutter_sewingmachine_dai' => $quotationsparts_model->getPdiecuttersewingmachinedaiAttribute(),
                'p_diecutter_jump_sewingmachine_hon'  => $quotationsparts_model->getPdiecutterjumpsewingmachinehonAttribute(),
                'p_diecutter_jump_sewingmachine_dai'  => $quotationsparts_model->getPdiecutterjumpsewingmachinedaiAttribute(),
                'p_diecutter_micro_sewingmachine_hon' => $quotationsparts_model->getPdiecuttermicrosewingmachinehonAttribute(),
                'p_diecutter_micro_sewingmachine_dai' => $quotationsparts_model->getPdiecuttermicrosewingmachinedaiAttribute(),
                'p_diecutter_jump_micro_sewingmachine_hon' => $quotationsparts_model->getPdiecutterjumpmicrosewingmachinehonAttribute(),
                'p_diecutter_jump_micro_sewingmachine_dai' => $quotationsparts_model->getPdiecutterjumpmicrosewingmachinedaiAttribute(),
                'p_diecutter_ana_hon' => $quotationsparts_model->getPdiecutteranahonAttribute(),
                'p_diecutter_ana_dai' => $quotationsparts_model->getPdiecutteranadaiAttribute(),
                'p_diecutter_cornercut' => $quotationsparts_model->getPdiecuttercornercutAttribute(),
                'p_diecutter_cornercut_dai'  => $quotationsparts_model->getPdiecuttercornercutdaiAttribute(),
                'p_diecutter_sewingmachine_ks' => $quotationsparts_model->getPdiecuttersewingmachineksAttribute(),
                'p_diecutter_jump_sewingmachine_ks' => $quotationsparts_model->getPdiecutterjumpsewingmachineksAttribute(),
                'p_diecutter_micro_sewingmachine_ks' => $quotationsparts_model->getPdiecuttermicrosewingmachineksAttribute(),
                'p_diecutter_jump_micro_sewingmachine_ks' => $quotationsparts_model->getPdiecutterjumpmicrosewingmachineksAttribute(),
                'p_diecutter_ana_ks' => $quotationsparts_model->getPdiecutteranaksAttribute(),
                'p_diecutter_cornercut_ks' => $quotationsparts_model->getPdiecuttercornercutksAttribute(),
                'p_diecutter_subtotal'  => $quotationsparts_model->getPdiecuttersubtotalAttribute(),
                'outsource_paper' => $quotationsparts_model->getOutsourcepaperAttribute(),
                'outsource_paper_cost' => $quotationsparts_model->getOutsourcepapercostAttribute(),
                'outsource_paper_all' => $quotationsparts_model->getOutsourcepaperallAttribute(),
                'outsource_paper_all_cost' => $quotationsparts_model->getOutsourcepaperallcostAttribute(),
                'p_form_cornercut' => $quotationsparts_model->getPformcornercutAttribute(),
                'p_form_replace' => $quotationsparts_model->getPformreplaceAttribute(),
                'p_form_replace_color' => $quotationsparts_model->getPformreplacecolorAttribute(),
                'p_envelope' => $quotationsparts_model->getPenvelopeAttribute(),
                'created_user' => $quotationsparts_model->getCreateduserAttribute(),
                'created_at' => $quotationsparts_model->getCreatedatAttribute(),
                'is_deleted' => 0
            );

        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }


    //
    //  バックアップログ
    //
    private function putBackupResult($params)
    {
        $item = $params['item'];
        if (isset($item->status) && $item->status == Config::get('const.STATUS.end')) {
            return true;
        }
        try {
            DB::beginTransaction();
            // バックアップ属性
            $result = $this->putBackupAtt($params);
            // バックアップログ
            if ($params['proc'] == Config::get('const.STATUS.end')) {
                $result = $this->putBackupLog($params);
            }
            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  バックアップ属性設定
    //
    private function putBackupAtt($params)
    {
        $proc = $params['proc'];
        $item = $params['item'];
        $result = $params['result'];
        $login_user_code = $params['login_user_code'];

        $bkup_model = new BackupAttribute();
        try {
            // 存在チェック
            $bkup_model->setParamIdentificationidAttribute($item->identification_id);
            $bkup_model->setParamIdentificationcodeAttribute($item->identification_code);
            $result = $bkup_model->chkExist();
            $bkup_model->setWorktableAttribute($item->work_table);
            $bkup_model->setTargettableAttribute($item->target_table);
            if ($result) {
                $bkup_model->setStatusAttribute($proc);
            } else {
                $bkup_model->setStatusAttribute(Config::get('const.STATUS.failed'));
            }
            $bkup_model->setIsdeletedAttribute(0);

            if ($result) {
                $bkup_model->setUpdateduserAttribute($login_user_code);
                $bkup_model->setUpdatedatAttribute(Carbon::now());
                $result = $bkup_model->updData();
            } else {
                $bkup_model->setCreateduserAttribute($login_user_code);
                $bkup_model->setCreatedatAttribute(Carbon::now());
                $result = $bkup_model->store();
            }

        } catch (Exception $e) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

    //
    //  バックアップログ作成
    //
    private function putBackupLog($params)
    {
        $proc = $params['proc'];
        $dt_start = $params['dt_start'];
        $dt_end = $params['dt_end'];
        $item = $params['item'];
        $result = $params['result'];
        $login_user_code = $params['login_user_code'];
        $apicommon = new ApiCommonController();
        $bkuplog_model = new BackupLogs();

        try {
            // バックアップログ作成
            $bkuplog_model->setWorktableAttribute($item->work_table);
            $bkuplog_model->setTargettableAttribute($item->target_table);
            switch ($item->identification_code){
            // 見積スムースデータ複写
            case Config::get('const.G001.copy'):
                $bkuplog_model->setKindAttribute(Config::get('const.G001_WORD.copy'));
                break;
            // 見積スムースデータ展開
            case Config::get('const.G001.deploy'):
                $bkuplog_model->setKindAttribute(Config::get('const.G001_WORD.deploy'));
                break;
            default:
                $bkuplog_model->setKindAttribute(Config::get('const.G001_WORD.unknown'));
                break;
            }
            if ($result) {
                $bkuplog_model->setStatusAttribute($proc);
            } else {
                $bkuplog_model->setStatusAttribute(Config::get('const.STATUS.failed'));
            }
            $bkuplog_model->setStartDateAttribute($dt_start);
            $bkuplog_model->setStarttimeAttribute($dt_start);
            $bkuplog_model->setEndDateAttribute($dt_end);
            $bkuplog_model->setEndtimeAttribute($dt_end);
            $bkuplog_model->setTimerequiredAttribute($apicommon->diffTimeTime($dt_start, $dt_end));
            $bkuplog_model->setCreateduserAttribute($login_user_code);
            $bkuplog_model->setCreatedatAttribute($dt_end);
            $result = $apicommon->upBackupLog($bkuplog_model);
            return $result;
        } catch (Exception $e) {
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $shname, Config::get('const.LOG_MSG.failed_import')).'$e');
            Log::error($e->getMessage());
            throw $pe;
        }
    }
}
