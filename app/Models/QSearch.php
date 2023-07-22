<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class QSearch extends Model
{
    use HasFactory;

    protected $table = 'quotations';

    private $id;							// ID
    private $user_code;						// オペレータＩＤ
    private $m_code;						// 見積番号
    private $wm_code;						// 見積書番号
    private $wm_sub;						// 見積書補完番号
    private $reference_num;					// 参照番号
    private $create_date;					// 作成日
    private $lastorder_date;				// 最終受注日
    private $number_order;					// 受注回数
    private $manager_code;					// 担当者コード
    private $manager;						// 担当者
    private $customer_code;					// 得意先コード
    private $customer;						// 得意先
    private $printing;						// 印刷無しマーク
    private $enduser;						// エンドユーザー
    private $product;						// 製品名
    private $production_setnum;				// 制作組数（束ね内数）
    private $production_setnum_unit;		// 組/帯の区分
    private $production_volnum;				// 制作冊数
    private $production_volnum_unit;		// 制作形態
    private $production_all;				// 総数量（組×冊）
    private $unit;							// 単位区分（インチ/ミリ）
    private $papertray;						// 紙取
    private $imposition_w;					// 面付け横
    private $imposition_h;					// 面付け縦
    private $cylinder;						// シリンダー種
    private $cylinder_num;					// シリンダー本
    private $cylinder_set;					// シリンダーセット代金
    private $size_w;						// サイズ横
    private $size_h;						// サイズ縦
    private $size_top;						// サイズ分子
    private $size_bottom;					// サイズ分母
    private $inch_fold;						// インチ折
    private $parts_num;						// パーツ数
    private $all_through;					// 総通し数
    private $paper_amount;					// 用紙代総額
    private $wages_amount;					// 工賃他総額
    private $cost_amount;					// 実質原価総額
    private $estimate_amount;				// 見積予定金額
    private $comment;						// コメント
    private $offered_amount;				// 提示額
    private $print_cost_max;				// 印刷原価最高額
    private $paper_cost;					// 総用紙原価
    private $created_user;					// 作成ユーザー
    private $updated_user;					// 修正ユーザー
    private $created_at;					// 作成時間
    private $updated_at;					// 修正時間
    private $is_deleted;					// 削除フラグ
    

    //ID
    public function getIdAttribute()
    {
        return $this->id;
    }
    public function setIdAttribute($value)
    {
        $this->id = $value;
    }

    //オペレータＩＤ
    public function getUsercodeAttribute()
    {
        return $this->user_code;
    }
    public function setUsercodeAttribute($value)
    {
        $this->user_code = $value;
    }

    //見積番号
    public function getMcodeAttribute()
    {
        return $this->m_code;
    }
    public function setMcodeAttribute($value)
    {
        $this->m_code = $value;
    }

    //見積書番号
    public function getWmcodeAttribute()
    {
        return $this->wm_code;
    }
    public function setWmcodeAttribute($value)
    {
        $this->wm_code = $value;
    }

    //見積書補完番号
    public function getWmsubAttribute()
    {
        return $this->wm_sub;
    }
    public function setWmsubAttribute($value)
    {
        $this->wm_sub = $value;
    }

    //参照番号
    public function getReferencenumAttribute()
    {
        return $this->reference_num;
    }
    public function setReferencenumAttribute($value)
    {
        $this->reference_num = $value;
    }

    //作成日
    public function getCreatedateAttribute()
    {
        return $this->create_date;
    }
    public function setCreatedateAttribute($value)
    {
        $this->create_date = $value;
    }

    //最終受注日
    public function getLastorderdateAttribute()
    {
        return $this->lastorder_date;
    }
    public function setLastorderdateAttribute($value)
    {
        $this->lastorder_date = $value;
    }

    //受注回数
    public function getNumberorderAttribute()
    {
        return $this->number_order;
    }
    public function setNumberorderAttribute($value)
    {
        $this->number_order = $value;
    }

    //担当者コード
    public function getManagercodeAttribute()
    {
        return $this->manager_code;
    }
    public function setManagercodeAttribute($value)
    {
        $this->manager_code = $value;
    }

    //担当者
    public function getManagerAttribute()
    {
        return $this->manager;
    }
    public function setManagerAttribute($value)
    {
        $this->manager = $value;
    }

    //得意先コード
    public function getCustomercodeAttribute()
    {
        return $this->customer_code;
    }
    public function setCustomercodeAttribute($value)
    {
        $this->customer_code = $value;
    }

    //得意先
    public function getCustomerAttribute()
    {
        return $this->customer;
    }
    public function setCustomerAttribute($value)
    {
        $this->customer = $value;
    }

    //印刷無しマーク
    public function getPrintingAttribute()
    {
        return $this->printing;
    }
    public function setPrintingAttribute($value)
    {
        $this->printing = $value;
    }

    //エンドユーザー
    public function getEnduserAttribute()
    {
        return $this->enduser;
    }
    public function setEnduserAttribute($value)
    {
        $this->enduser = $value;
    }

    //製品名
    public function getProductAttribute()
    {
        return $this->product;
    }
    public function setProductAttribute($value)
    {
        $this->product = $value;
    }

    //制作組数（束ね内数）
    public function getProductionsetnumAttribute()
    {
        return $this->production_setnum;
    }
    public function setProductionsetnumAttribute($value)
    {
        $this->production_setnum = $value;
    }

    //組/帯の区分
    public function getProductionsetnumunitAttribute()
    {
        return $this->production_setnum_unit;
    }
    public function setProductionsetnumunitAttribute($value)
    {
        $this->production_setnum_unit = $value;
    }

    //制作冊数
    public function getProductionvolnumAttribute()
    {
        return $this->production_volnum;
    }
    public function setProductionvolnumAttribute($value)
    {
        $this->production_volnum = $value;
    }

    //制作形態
    public function getProductionvolnumunitAttribute()
    {
        return $this->production_volnum_unit;
    }
    public function setProductionvolnumunitAttribute($value)
    {
        $this->production_volnum_unit = $value;
    }

    //総数量（組×冊）
    public function getProductionallAttribute()
    {
        return $this->production_all;
    }
    public function setProductionallAttribute($value)
    {
        $this->production_all = $value;
    }

    //単位区分（インチ/ミリ）
    public function getUnitAttribute()
    {
        return $this->unit;
    }
    public function setUnitAttribute($value)
    {
        $this->unit = $value;
    }

    //紙取
    public function getPapertrayAttribute()
    {
        return $this->papertray;
    }
    public function setPapertrayAttribute($value)
    {
        $this->papertray = $value;
    }

    //面付け横
    public function getImpositionwAttribute()
    {
        return $this->imposition_w;
    }
    public function setImpositionwAttribute($value)
    {
        $this->imposition_w = $value;
    }

    //面付け縦
    public function getImpositionhAttribute()
    {
        return $this->imposition_h;
    }
    public function setImpositionhAttribute($value)
    {
        $this->imposition_h = $value;
    }

    //シリンダー種
    public function getCylinderAttribute()
    {
        return $this->cylinder;
    }
    public function setCylinderAttribute($value)
    {
        $this->cylinder = $value;
    }

    //シリンダー本
    public function getCylindernumAttribute()
    {
        return $this->cylinder_num;
    }
    public function setCylindernumAttribute($value)
    {
        $this->cylinder_num = $value;
    }

    //シリンダーセット代金
    public function getCylindersetAttribute()
    {
        return $this->cylinder_set;
    }
    public function setCylindersetAttribute($value)
    {
        $this->cylinder_set = $value;
    }

    //サイズ横
    public function getSizewAttribute()
    {
        return $this->size_w;
    }
    public function setSizewAttribute($value)
    {
        $this->size_w = $value;
    }

    //サイズ縦
    public function getSizehAttribute()
    {
        return $this->size_h;
    }
    public function setSizehAttribute($value)
    {
        $this->size_h = $value;
    }

    //サイズ分子
    public function getSizetopAttribute()
    {
        return $this->size_top;
    }
    public function setSizetopAttribute($value)
    {
        $this->size_top = $value;
    }

    //サイズ分母
    public function getSizebottomAttribute()
    {
        return $this->size_bottom;
    }
    public function setSizebottomAttribute($value)
    {
        $this->size_bottom = $value;
    }

    //インチ折
    public function getInchfoldAttribute()
    {
        return $this->inch_fold;
    }
    public function setInchfoldAttribute($value)
    {
        $this->inch_fold = $value;
    }

    //パーツ数
    public function getPartsnumAttribute()
    {
        return $this->parts_num;
    }
    public function setPartsnumAttribute($value)
    {
        $this->parts_num = $value;
    }

    //総通し数
    public function getAllthroughAttribute()
    {
        return $this->all_through;
    }
    public function setAllthroughAttribute($value)
    {
        $this->all_through = $value;
    }

    //用紙代総額
    public function getPaperamountAttribute()
    {
        return $this->paper_amount;
    }
    public function setPaperamountAttribute($value)
    {
        $this->paper_amount = $value;
    }

    //工賃他総額
    public function getWagesamountAttribute()
    {
        return $this->wages_amount;
    }
    public function setWagesamountAttribute($value)
    {
        $this->wages_amount = $value;
    }

    //実質原価総額
    public function getCostamountAttribute()
    {
        return $this->cost_amount;
    }
    public function setCostamountAttribute($value)
    {
        $this->cost_amount = $value;
    }

    //見積予定金額
    public function getEstimateamountAttribute()
    {
        return $this->estimate_amount;
    }
    public function setEstimateamountAttribute($value)
    {
        $this->estimate_amount = $value;
    }

    //コメント
    public function getCommentAttribute()
    {
        return $this->comment;
    }
    public function setCommentAttribute($value)
    {
        $this->comment = $value;
    }

    //提示額
    public function getOfferedamountAttribute()
    {
        return $this->offered_amount;
    }
    public function setOfferedamountAttribute($value)
    {
        $this->offered_amount = $value;
    }

    //印刷原価最高額
    public function getPrintcostmaxAttribute()
    {
        return $this->print_cost_max;
    }
    public function setPrintcostmaxAttribute($value)
    {
        $this->print_cost_max = $value;
    }

    //総用紙原価
    public function getPapercostAttribute()
    {
        return $this->paper_cost;
    }
    public function setPapercostAttribute($value)
    {
        $this->paper_cost = $value;
    }

    //作成ユーザー
    public function getCreateduserAttribute()
    {
        return $this->created_user;
    }
    public function setCreateduserAttribute($value)
    {
        $this->created_user = $value;
    }

    //修正ユーザー
    public function getUpdateduserAttribute()
    {
        return $this->updated_user;
    }
    public function setUpdateduserAttribute($value)
    {
        $this->updated_user = $value;
    }

    //作成時間
    public function getCreatedatAttribute()
    {
        return $this->created_at;
    }
    public function setCreatedatAttribute($value)
    {
        $this->created_at = $value;
    }

    //修正時間
    public function getUpdatedatAttribute()
    {
        return $this->updated_at;
    }
    public function setUpdatedatAttribute($value)
    {
        $this->updated_at = $value;
    }

    //削除フラグ
    public function getIsdeletedAttribute()
    {
        return $this->is_deleted;
    }
    public function setIsdeletedAttribute($value)
    {
        $this->is_deleted = $value;
    }



    // ------------- 検索 --------------

    // 見積番号
    private $param_m_code;
    public function getParamM_codeAttribute(){ return $this->param_m_code;}
    public function setParamM_codeAttribute($value){  $this->param_m_code = $value;}
    // 得意先コード
    private $param_customer_code;
    public function getParamCustomer_codeAttribute(){ return $this->param_customer_code;}
    public function setParamCustomer_codeAttribute($value){  $this->param_customer_code = $value;}
    // 得意先名
    private $param_customer;
    public function getParamCustomerAttribute(){ return $this->param_customer;}
    public function setParamCustomerAttribute($value){  $this->param_customer = $value;}
    // エンドユーザー
    private $param_enduser;
    public function getParamEnduserAttribute(){ return $this->param_enduser;}
    public function setParamEnduserAttribute($value){  $this->param_enduser = $value;}
    // 製品名
    private $param_product;
    public function getParamProductAttribute(){ return $this->param_product;}
    public function setParamProductAttribute($value){  $this->param_product = $value;}
    // 作成年月（期間）開始
    private $param_date_start;
    public function getParamDate_startAttribute(){ return $this->param_date_start;}
    public function setParamDate_startAttribute($value){  $this->param_date_start = $value;}
    // 作成年月（期間）終了
    private $param_date_end;
    public function getParamDate_endAttribute(){ return $this->param_date_end;}
    public function setParamDate_endAttribute($value){  $this->param_date_end = $value;}
    // 
    //private $param_;
    //public function getParamAttribute(){ return $this->param_;}
    //public function setParamAttribute($value){  $this->param_ = $value;}


     /**
     * 検索SEARCH取得
     *
     * @return void
     */
    public function getSearch(){

        $searchgo = false;
        if(!empty($this->param_m_code)) $searchgo = true;
        if(!empty($this->param_customer_code)) $searchgo = true;
        if(!empty($this->param_customer)) $searchgo = true;
        if(!empty($this->param_enduser)) $searchgo = true;
        if(!empty($this->param_product)) $searchgo = true;
        if(!empty($this->param_date_start)) $searchgo = true;
        if(!empty($this->param_date_end)) $searchgo = true;

        try {
            $result = "";
            $data = DB::table($this->table)
            ->select(

                'id',
                'user_code',
                'm_code',
                'wm_code',
                'wm_sub',
                'reference_num',
                'create_date',
                'lastorder_date',
                'number_order',
                'manager_code',
                'manager',
                'customer_code',
                'customer',
                'printing',
                'enduser',
                'product',
                'production_setnum',
                'production_setnum_unit',
                'production_volnum',
                'production_volnum_unit',
                'production_all',
                'unit',
                'papertray',
                'imposition_w',
                'imposition_h',
                'cylinder',
                'cylinder_num',
                'cylinder_set',
                'size_w',
                'size_h',
                'size_top',
                'size_bottom',
                'inch_fold',
                'parts_num',
                'all_through',
                'paper_amount',
                'wages_amount',
                'cost_amount',
                'estimate_amount',
                'comment',
                'offered_amount',
                'print_cost_max',
                'paper_cost',
                'created_user',
                'updated_user',
                'created_at',
                'updated_at',
                'is_deleted'

            )
            ->selectRaw('DATE_FORMAT(create_date, "%Y年%m月%d日") AS f_create_date')
            ->selectRaw('DATE_FORMAT(lastorder_date, "%Y年%m月%d日") AS f_lastorder_date')
            ->selectRaw('FORMAT(production_volnum, 0) AS f_production_volnum')
            ->selectRaw('FORMAT(estimate_amount, 0) AS f_estimate_amount')
            ;
            if(!empty($this->param_m_code)){
                //Log::info("getSearchA this->params_order_no -- ".$this->params_order_no);
                //Log::info("getSearchA this->param_order_no -- ".$this->param_order_no);
                $data->where('m_code', $this->param_m_code)
                //->where('status','newest')
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_customer_code)){
                $data->where('customer_code', $this->param_customer_code)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_customer)){
                $str = "%".$this->param_customer."%";
                $data->where('customer','LIKE', $str)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_enduser)){
                $str = "%".$this->param_enduser."%";
                $data->where('enduser','LIKE', $str)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_product)){
                $str = "%".$this->param_product."%";
                //Log::info("getSearchA this->param_company_name -- ".$str);
                $data->where('product','LIKE', $str)
                //->where('status','newest')
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_date_start)){
                $data->where('create_date', '>=', $this->param_date_start)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_date_end)){
                $data->where('create_date', '<=', $this->param_date_end)
                ->orderBy('create_date', 'DESC');
            }

            if($searchgo) {
                $result = $data
                ->get();

            }

            /*
            if ($result->isEmpty()) {
                $result = "";
            } 
            */
            return $result;

        }catch(\PDOException $pe){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_select_error')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_select_error')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }

    }

    public function getPvu(){

        $searchgo = false;
        if(!empty($this->param_m_code)) $searchgo = true;
        if(!empty($this->param_customer_code)) $searchgo = true;
        if(!empty($this->param_customer)) $searchgo = true;
        if(!empty($this->param_enduser)) $searchgo = true;
        if(!empty($this->param_product)) $searchgo = true;
        if(!empty($this->param_date_start)) $searchgo = true;
        if(!empty($this->param_date_end)) $searchgo = true;

        try {
            $result = "";
            $data = DB::table($this->table)
            ->select('production_volnum_unit');
            //->pluck('production_volnum_unit');
            if(!empty($this->param_m_code)){
                //Log::info("getSearchA this->params_order_no -- ".$this->params_order_no);
                //Log::info("getSearchA this->param_order_no -- ".$this->param_order_no);
                $data->where('m_code', $this->param_m_code)
                //->where('status','newest')
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_customer_code)){
                $data->where('customer_code', $this->param_customer_code)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_customer)){
                $str = "%".$this->param_customer."%";
                $data->where('customer','LIKE', $str)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_enduser)){
                $str = "%".$this->param_enduser."%";
                $data->where('enduser','LIKE', $str)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_product)){
                $str = "%".$this->param_product."%";
                //Log::info("getSearchA this->param_company_name -- ".$str);
                $data->where('product','LIKE', $str)
                //->where('status','newest')
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_date_start)){
                $data->where('create_date', '>=', $this->param_date_start)
                ->orderBy('create_date', 'DESC');
            }
            if(!empty($this->param_date_end)){
                $data->where('create_date', '<=', $this->param_date_end)
                ->orderBy('create_date', 'DESC');
            }

            if($searchgo) {
                $result = $data
                ->get();

            }

            /*
            if ($result->isEmpty()) {
                $result = "";
            } 
            */
            return $result;

        }catch(\PDOException $pe){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_select_error')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_select_error')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }

    }



}
