<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class QuotationsDepartment extends Model
{
    use HasFactory;

    protected $table = 'quotations_department';
	protected $table_wrk_quotations_department = 'wrk_quotations_department';


	private $id;							// ID
	private $m_code;						// 見積番号
	private $wkake;							// Ｗ掛け
	private $daenpin;						// 楕円ピン
	private $ana2;							// ２穴
	private $ana6;							// ６穴
	private $donko;							// ドンコ
	private $katanuki;						// 型ヌキ
	private $katanuki_outsou;				// 外注先
	private $katanuki_outsou_cost;			// 外注費
	private $kasutori;						// カス取
	private $kasutori_outsou;				// 外注先
	private $kasutori_outsou_cost;			// 外注費
	private $nisu;							// ニス
	private $nisu_through;					// ニス通し
	private $tsr_times;						// ＴＳＲスキップ回
	private $tsr_through;					// ＴＳＲスキップ通
	private $form_color_change;				// 色替
	private $form_carbon_mold;				// カーボン型
	private $form_all_outsou;				// 外注先
	private $form_all_outsou_cost;			// 外注費
	private $form_subtotal;					// フォーム部工賃小計
	private $offset_color_change;			// 色替
	private $offset_carbon_mold;			// カーボン型
	private $offset_subtotal;				// オフセット部工賃小計
	private $block_copy;					// 版下
	private $kinds;							// 種別
	private $difficulty;					// 難度
	private $plate_making_outsou;			// 外注先
	private $plate_making_outsou_cost;		// 外注費
	private $ctp;							// ＣＴＰ
	private $inkjet;						// インクジェット
	private $inkjet_sheet;					// インクジェット枚
	private $ondemand_color_front;			// オンデマンド 色数表
	private $ondemand_color_back;			// オンデマンド 色数裏
	private $ondemand_through_front;		// オンデマンド 通し表
	private $ondemand_through_back;			// オンデマンド 通し裏
	private $plate_subtotal;				// 組版・製版工賃小計
	private $collator;						// コレーター
	private $bebe;							// ベーベ
	private $envelope_process;				// 封筒加工
	private $tape_process;					// テープ加工
	private $peel;							// 剥離糊
	private $press;							// プレス
	private $donko2;							// ドンコ
	private $collator_cno;					// クラッシュNo.
	private $collator_ana;					// 穴
	private $collator_all_outsou;			// 外注先
	private $collator_all_outsou_cost;		// 外注費
	private $collator_subtotal;				// コレータ部工賃小計
	private $collator_basic_fee;			// コレータ部基本料金
	private $sheetcut;						// シートカット
	private $nl_color;						// 名刺色
	private $nl_hagaki;						// ハガキ
	private $nl_hagaki_color;				// ハガキ色
	private $nl_envelope_color;				// 封筒色
	private $nl_number_part;				// No.
	private $nl_subtotal;					// ネームライナー工賃小計
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

	//見積番号
	public function getMcodeAttribute()
	{
		return $this->m_code;
	}
	public function setMcodeAttribute($value)
	{
		$this->m_code = $value;
	}

	//Ｗ掛け
	public function getWkakeAttribute()
	{
		return $this->wkake;
	}
	public function setWkakeAttribute($value)
	{
		$this->wkake = $value;
	}

	//楕円ピン
	public function getDaenpinAttribute()
	{
		return $this->daenpin;
	}
	public function setDaenpinAttribute($value)
	{
		$this->daenpin = $value;
	}

	//２穴
	public function getAna2Attribute()
	{
		return $this->ana2;
	}
	public function setAna2Attribute($value)
	{
		$this->ana2 = $value;
	}

	//６穴
	public function getAna6Attribute()
	{
		return $this->ana6;
	}
	public function setAna6Attribute($value)
	{
		$this->ana6 = $value;
	}

	//ドンコ
	public function getDonkoAttribute()
	{
		return $this->donko;
	}
	public function setDonkoAttribute($value)
	{
		$this->donko = $value;
	}

	//型ヌキ
	public function getKatanukiAttribute()
	{
		return $this->katanuki;
	}
	public function setKatanukiAttribute($value)
	{
		$this->katanuki = $value;
	}

	//外注先
	public function getKatanukioutsouAttribute()
	{
		return $this->katanuki_outsou;
	}
	public function setKatanukioutsouAttribute($value)
	{
		$this->katanuki_outsou = $value;
	}

	//外注費
	public function getKatanukioutsoucostAttribute()
	{
		return $this->katanuki_outsou_cost;
	}
	public function setKatanukioutsoucostAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->katanuki_outsou_cost = (int)trim($value);
		} else {
			$this->katanuki_outsou_cost = null;
		}
	}

	//カス取
	public function getKasutoriAttribute()
	{
		return $this->kasutori;
	}
	public function setKasutoriAttribute($value)
	{
		$this->kasutori = $value;
	}

	//外注先
	public function getKasutorioutsouAttribute()
	{
		return $this->kasutori_outsou;
	}
	public function setKasutorioutsouAttribute($value)
	{
		$this->kasutori_outsou = $value;
	}

	//外注費
	public function getKasutorioutsoucostAttribute()
	{
		return $this->kasutori_outsou_cost;
	}
	public function setKasutorioutsoucostAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->kasutori_outsou_cost = (int)trim($value);
		} else {
			$this->kasutori_outsou_cost = null;
		}
	}

	//ニス
	public function getNisuAttribute()
	{
		return $this->nisu;
	}
	public function setNisuAttribute($value)
	{
		$this->nisu = $value;
	}

	//ニス通し
	public function getNisuthroughAttribute()
	{
		return $this->nisu_through;
	}
	public function setNisuthroughAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nisu_through = (int)trim($value);
		} else {
			$this->nisu_through = null;
		}
	}

	//ＴＳＲスキップ回
	public function getTsrtimesAttribute()
	{
		return $this->tsr_times;
	}
	public function setTsrtimesAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->tsr_times = (int)trim($value);
		} else {
			$this->tsr_times = null;
		}
	}

	//ＴＳＲスキップ通
	public function getTsrthroughAttribute()
	{
		return $this->tsr_through;
	}
	public function setTsrthroughAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->tsr_through = (int)trim($value);
		} else {
			$this->tsr_through = null;
		}
	}

	//色替
	public function getFormcolorchangeAttribute()
	{
		return $this->form_color_change;
	}
	public function setFormcolorchangeAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->form_color_change = (int)trim($value);
		} else {
			$this->form_color_change = null;
		}
	}

	//カーボン型
	public function getFormcarbonmoldAttribute()
	{
		return $this->form_carbon_mold;
	}
	public function setFormcarbonmoldAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->form_carbon_mold = (int)trim($value);
		} else {
			$this->form_carbon_mold = null;
		}
	}

	//外注先
	public function getFormalloutsouAttribute()
	{
		return $this->form_all_outsou;
	}
	public function setFormalloutsouAttribute($value)
	{
		$this->form_all_outsou = $value;
	}

	//外注費
	public function getFormalloutsoucostAttribute()
	{
		return $this->form_all_outsou_cost;
	}
	public function setFormalloutsoucostAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->form_all_outsou_cost = (int)trim($value);
		} else {
			$this->form_all_outsou_cost = null;
		}
	}

	//フォーム部工賃小計
	public function getFormsubtotalAttribute()
	{
		return $this->form_subtotal;
	}
	public function setFormsubtotalAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->form_subtotal = (int)trim($value);
		} else {
			$this->form_subtotal = null;
		}
	}

	//色替
	public function getOffsetcolorchangeAttribute()
	{
		return $this->offset_color_change;
	}
	public function setOffsetcolorchangeAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->offset_color_change = (int)trim($value);
		} else {
			$this->offset_color_change = null;
		}
	}

	//カーボン型
	public function getOffsetcarbonmoldAttribute()
	{
		return $this->offset_carbon_mold;
	}
	public function setOffsetcarbonmoldAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->offset_carbon_mold = (int)trim($value);
		} else {
			$this->offset_carbon_mold = null;
		}
	}

	//オフセット部工賃小計
	public function getOffsetsubtotalAttribute()
	{
		return $this->offset_subtotal;
	}
	public function setOffsetsubtotalAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->offset_subtotal = (int)trim($value);
		} else {
			$this->offset_subtotal = null;
		}
	}

	//版下
	public function getBlockcopyAttribute()
	{
		return $this->block_copy;
	}
	public function setBlockcopyAttribute($value)
	{
		$this->block_copy = $value;
	}

	//種別
	public function getKindsAttribute()
	{
		return $this->kinds;
	}
	public function setKindsAttribute($value)
	{
		$this->kinds = $value;
	}

	//難度
	public function getDifficultyAttribute()
	{
		return $this->difficulty;
	}
	public function setDifficultyAttribute($value)
	{
		$this->difficulty = $value;
	}

	//外注先
	public function getPlatemakingoutsouAttribute()
	{
		return $this->plate_making_outsou;
	}
	public function setPlatemakingoutsouAttribute($value)
	{
		$this->plate_making_outsou = $value;
	}

	//外注費
	public function getPlatemakingoutsoucostAttribute()
	{
		return $this->plate_making_outsou_cost;
	}
	public function setPlatemakingoutsoucostAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->plate_making_outsou_cost = (int)trim($value);
		} else {
			$this->plate_making_outsou_cost = null;
		}
	}

	//ＣＴＰ
	public function getCtpAttribute()
	{
		return $this->ctp;
	}
	public function setCtpAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->ctp = (int)trim($value);
		} else {
			$this->ctp = null;
		}
	}

	//インクジェット
	public function getInkjetAttribute()
	{
		return $this->inkjet;
	}
	public function setInkjetAttribute($value)
	{
		$this->inkjet = $value;
	}

	//インクジェット枚
	public function getInkjetsheetAttribute()
	{
		return $this->inkjet_sheet;
	}
	public function setInkjetsheetAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->inkjet_sheet = (int)trim($value);
		} else {
			$this->inkjet_sheet = null;
		}
	}

	//オンデマンド 色数表
	public function getOndemandcolorfrontAttribute()
	{
		return $this->ondemand_color_front;
	}
	public function setOndemandcolorfrontAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->ondemand_color_front = (int)trim($value);
		} else {
			$this->ondemand_color_front = null;
		}
	}

	//オンデマンド 色数裏
	public function getOndemandcolorbackAttribute()
	{
		return $this->ondemand_color_back;
	}
	public function setOndemandcolorbackAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->ondemand_color_back = (int)trim($value);
		} else {
			$this->ondemand_color_back = null;
		}
	}

	//オンデマンド 通し表
	public function getOndemandthroughfrontAttribute()
	{
		return $this->ondemand_through_front;
	}
	public function setOndemandthroughfrontAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->ondemand_through_front = (int)trim($value);
		} else {
			$this->ondemand_through_front = null;
		}
	}

	//オンデマンド 通し裏
	public function getOndemandthroughbackAttribute()
	{
		return $this->ondemand_through_back;
	}
	public function setOndemandthroughbackAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->ondemand_through_back = (int)trim($value);
		} else {
			$this->ondemand_through_back = null;
		}
	}

	//組版・製版工賃小計
	public function getPlatesubtotalAttribute()
	{
		return $this->plate_subtotal;
	}
	public function setPlatesubtotalAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->plate_subtotal = (int)trim($value);
		} else {
			$this->plate_subtotal = null;
		}
	}

	//コレーター
	public function getCollatorAttribute()
	{
		return $this->collator;
	}
	public function setCollatorAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator = (int)trim($value);
		} else {
			$this->collator = null;
		}
	}

	//ベーベ
	public function getBebeAttribute()
	{
		return $this->bebe;
	}
	public function setBebeAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->bebe = (int)trim($value);
		} else {
			$this->bebe = null;
		}
	}

	//封筒加工
	public function getEnvelopeprocessAttribute()
	{
		return $this->envelope_process;
	}
	public function setEnvelopeprocessAttribute($value)
	{
		$this->envelope_process = $value;
	}

	//テープ加工
	public function getTapeprocessAttribute()
	{
		return $this->tape_process;
	}
	public function setTapeprocessAttribute($value)
	{
		$this->tape_process = $value;
	}

	//剥離糊
	public function getPeelAttribute()
	{
		return $this->peel;
	}
	public function setPeelAttribute($value)
	{
		$this->peel = $value;
	}

	//プレス
	public function getPressAttribute()
	{
		return $this->press;
	}
	public function setPressAttribute($value)
	{
		$this->press = $value;
	}

	//ドンコ
	public function getDonko2Attribute()
	{
		return $this->donko2;
	}
	public function setDonko2Attribute($value)
	{
		$this->donko2 = $value;
	}

	//クラッシュNo.
	public function getCollatorcnoAttribute()
	{
		return $this->collator_cno;
	}
	public function setCollatorcnoAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator_cno = (int)trim($value);
		} else {
			$this->collator_cno = null;
		}
	}

	//穴
	public function getCollatoranaAttribute()
	{
		return $this->collator_ana;
	}
	public function setCollatoranaAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator_ana = (int)trim($value);
		} else {
			$this->collator_ana = null;
		}
	}

	//外注先
	public function getCollatoralloutsouAttribute()
	{
		return $this->collator_all_outsou;
	}
	public function setCollatoralloutsouAttribute($value)
	{
		$this->collator_all_outsou = $value;
	}

	//外注費
	public function getCollatoralloutsoucostAttribute()
	{
		return $this->collator_all_outsou_cost;
	}
	public function setCollatoralloutsoucostAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator_all_outsou_cost = (int)trim($value);
		} else {
			$this->collator_all_outsou_cost = null;
		}
	}

	//コレータ部工賃小計
	public function getCollatorsubtotalAttribute()
	{
		return $this->collator_subtotal;
	}
	public function setCollatorsubtotalAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator_subtotal = (int)trim($value);
		} else {
			$this->collator_subtotal = null;
		}
	}

	//コレータ部基本料金
	public function getCollatorbasicfeeAttribute()
	{
		return $this->collator_basic_fee;
	}
	public function setCollatorbasicfeeAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->collator_basic_fee = (int)trim($value);
		} else {
			$this->collator_basic_fee = null;
		}
	}

	//シートカット
	public function getSheetcutAttribute()
	{
		return $this->sheetcut;
	}
	public function setSheetcutAttribute($value)
	{
		$this->sheetcut = $value;
	}

	//名刺色
	public function getNlcolorAttribute()
	{
		return $this->nl_color;
	}
	public function setNlcolorAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nl_color = (int)trim($value);
		} else {
			$this->nl_color = null;
		}
	}

	//ハガキ
	public function getNlhagakiAttribute()
	{
		return $this->nl_hagaki;
	}
	public function setNlhagakiAttribute($value)
	{
		$this->nl_hagaki = $value;
	}

	//ハガキ色
	public function getNlhagakicolorAttribute()
	{
		return $this->nl_hagaki_color;
	}
	public function setNlhagakicolorAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nl_hagaki_color = (int)trim($value);
		} else {
			$this->nl_hagaki_color = null;
		}
	}

	//封筒色
	public function getNlenvelopecolorAttribute()
	{
		return $this->nl_envelope_color;
	}
	public function setNlenvelopecolorAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nl_envelope_color = (int)trim($value);
		} else {
			$this->nl_envelope_color = null;
		}
	}

	//No.
	public function getNlnumberpartAttribute()
	{
		return $this->nl_number_part;
	}
	public function setNlnumberpartAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nl_number_part = (int)trim($value);
		} else {
			$this->nl_number_part = null;
		}
	}

	//ネームライナー工賃小計
	public function getNlsubtotalAttribute()
	{
		return $this->nl_subtotal;
	}
	public function setNlsubtotalAttribute($value)
	{
		if (strlen(trim($value) > 0)) {
			$this->nl_subtotal = (int)trim($value);
		} else {
			$this->nl_subtotal = null;
		}
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


	// ----------------------  メソッド ---------------------------------

    // 見積番号
    private $param_m_code;
    public function getParamM_codeAttribute(){ return $this->param_m_code;}
    public function setParamM_codeAttribute($value){  $this->param_m_code = $value;}
	

	/**
     * import
     *
     * @return void
     */
    public function distributeIns(){
			$message = "ログ出力 distributeIns";
			try {
				$sqlString = "";
				$sqlString .= "insert into ".$this->table;
				$sqlString .= "  select * ";
				$sqlString .= "  from ".$this->table_wrk_quotations_department." t1 ";
				$sqlString .= "  where not exists (";
				$sqlString .= "    select 1 ";
				$sqlString .= "    from  ".$this->table." t2 ";
				$sqlString .= "    where ";
				$sqlString .= "      t1.m_code = t2.m_code ";
				$sqlString .= "  ) ";
				$array_setBindingsStr = array();
				$result = DB::insert($sqlString, $array_setBindingsStr);
				return true;

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


	/**
     * 部門（フォーム・オフセット・組版・コレーター・ネームライナー）取得
     *
     * @return void
     */
    public function getSearch(){

        $searchgo = false;
        if(!empty($this->param_m_code)) $searchgo = true;

        try {
            $result = "";
            $data = DB::table($this->table)
            ->select(

				'id',
				'm_code',
				'wkake',
				'daenpin',
				'ana2',
				'ana6',
				'donko',
				'katanuki',
				'katanuki_outsou',
				'katanuki_outsou_cost',
				'kasutori',
				'kasutori_outsou',
				'kasutori_outsou_cost',
				'nisu',
				'nisu_through',
				'tsr_times',
				'tsr_through',
				'form_color_change',
				'form_carbon_mold',
				'form_all_outsou',
				'form_all_outsou_cost',
				'form_subtotal',
				'offset_color_change',
				'offset_carbon_mold',
				'offset_subtotal',
				'block_copy',
				'kinds',
				'difficulty',
				'plate_making_outsou',
				'plate_making_outsou_cost',
				'ctp',
				'inkjet',
				'inkjet_sheet',
				'ondemand_color_front',
				'ondemand_color_back',
				'ondemand_through_front',
				'ondemand_through_back',
				'plate_subtotal',
				'collator',
				'bebe',
				'envelope_process',
				'tape_process',
				'peel',
				'press',
				'sheetcut',
				'collator_cno',
				'collator_ana',
				'collator_all_outsou',
				'collator_all_outsou_cost',
				'collator_subtotal',
				'collator_basic_fee',
				'nl_color',
				'nl_hagaki',
				'nl_hagaki_color',
				'nl_envelope_color',
				'nl_number_part',
				'nl_subtotal',
				'created_user',
				'updated_user',
				'created_at',
				'updated_at',
				'is_deleted'

            )
            //->selectRaw('DATE_FORMAT(create_date, "%Y年%m月%d日") AS f_create_date')
            //->selectRaw('DATE_FORMAT(lastorder_date, "%Y年%m月%d日") AS f_lastorder_date')
            //->selectRaw('FORMAT(production_volnum, 0) AS f_production_volnum')
            //->selectRaw('FORMAT(estimate_amount, 0) AS f_estimate_amount')
            ;
            if(!empty($this->param_m_code)){
                //Log::info("getSearch this->param_m_code -- ".$this->param_m_code);
                $data->where('m_code', $this->param_m_code)
                ->orderBy('id', 'DESC');
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
