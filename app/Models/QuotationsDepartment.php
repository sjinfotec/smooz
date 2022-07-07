<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuotationsDepartment extends Model
{
    use HasFactory;

    protected $table = 'quotations_department';

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
    private $nisu_single;					// ニス片面
    private $nisu_double;					// ニス両面
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
    private $sheetcut;						// シートカット
    private $collator_cno;					// クラッシュNo.
    private $collator_ana;					// 穴
    private $collator_all_outsou;			// 外注先
    private $collator_all_outsou_cost;		// 外注費
    private $collator_subtotal;				// コレータ部工賃小計
    private $collator_basic_fee;			// コレータ部基本料金
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
		$this->katanuki_outsou_cost = $value;
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
		$this->kasutori_outsou_cost = $value;
	}
	//ニス片面
	public function getNisusingleAttribute()
	{
		return $this->nisu_single;
	}

	public function setNisusingleAttribute($value)
	{
		$this->nisu_single = $value;
	}
	//ニス両面
	public function getNisudoubleAttribute()
	{
		return $this->nisu_double;
	}

	public function setNisudoubleAttribute($value)
	{
		$this->nisu_double = $value;
	}
	//ＴＳＲスキップ回
	public function getTsrtimesAttribute()
	{
		return $this->tsr_times;
	}

	public function setTsrtimesAttribute($value)
	{
		$this->tsr_times = $value;
	}
	//ＴＳＲスキップ通
	public function getTsrthroughAttribute()
	{
		return $this->tsr_through;
	}

	public function setTsrthroughAttribute($value)
	{
		$this->tsr_through = $value;
	}
	//色替
	public function getFormcolorchangeAttribute()
	{
		return $this->form_color_change;
	}

	public function setFormcolorchangeAttribute($value)
	{
		$this->form_color_change = $value;
	}
	//カーボン型
	public function getFormcarbonmoldAttribute()
	{
		return $this->form_carbon_mold;
	}

	public function setFormcarbonmoldAttribute($value)
	{
		$this->form_carbon_mold = $value;
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
		$this->form_all_outsou_cost = $value;
	}
	//フォーム部工賃小計
	public function getFormsubtotalAttribute()
	{
		return $this->form_subtotal;
	}

	public function setFormsubtotalAttribute($value)
	{
		$this->form_subtotal = $value;
	}
	//色替
	public function getOffsetcolorchangeAttribute()
	{
		return $this->offset_color_change;
	}

	public function setOffsetcolorchangeAttribute($value)
	{
		$this->offset_color_change = $value;
	}
	//カーボン型
	public function getOffsetcarbonmoldAttribute()
	{
		return $this->offset_carbon_mold;
	}

	public function setOffsetcarbonmoldAttribute($value)
	{
		$this->offset_carbon_mold = $value;
	}
	//オフセット部工賃小計
	public function getOffsetsubtotalAttribute()
	{
		return $this->offset_subtotal;
	}

	public function setOffsetsubtotalAttribute($value)
	{
		$this->offset_subtotal = $value;
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
		$this->plate_making_outsou_cost = $value;
	}
	//ＣＴＰ
	public function getCtpAttribute()
	{
		return $this->ctp;
	}

	public function setCtpAttribute($value)
	{
		$this->ctp = $value;
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
		$this->inkjet_sheet = $value;
	}
	//オンデマンド 色数表
	public function getOndemandcolorfrontAttribute()
	{
		return $this->ondemand_color_front;
	}

	public function setOndemandcolorfrontAttribute($value)
	{
		$this->ondemand_color_front = $value;
	}
	//オンデマンド 色数裏
	public function getOndemandcolorbackAttribute()
	{
		return $this->ondemand_color_back;
	}

	public function setOndemandcolorbackAttribute($value)
	{
		$this->ondemand_color_back = $value;
	}
	//オンデマンド 通し表
	public function getOndemandthroughfrontAttribute()
	{
		return $this->ondemand_through_front;
	}

	public function setOndemandthroughfrontAttribute($value)
	{
		$this->ondemand_through_front = $value;
	}
	//オンデマンド 通し裏
	public function getOndemandthroughbackAttribute()
	{
		return $this->ondemand_through_back;
	}

	public function setOndemandthroughbackAttribute($value)
	{
		$this->ondemand_through_back = $value;
	}
	//組版・製版工賃小計
	public function getPlatesubtotalAttribute()
	{
		return $this->plate_subtotal;
	}

	public function setPlatesubtotalAttribute($value)
	{
		$this->plate_subtotal = $value;
	}
	//コレーター
	public function getCollatorAttribute()
	{
		return $this->collator;
	}

	public function setCollatorAttribute($value)
	{
		$this->collator = $value;
	}
	//ベーベ
	public function getBebeAttribute()
	{
		return $this->bebe;
	}

	public function setBebeAttribute($value)
	{
		$this->bebe = $value;
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
	//シートカット
	public function getSheetcutAttribute()
	{
		return $this->sheetcut;
	}

	public function setSheetcutAttribute($value)
	{
		$this->sheetcut = $value;
	}
	//クラッシュNo.
	public function getCollatorcnoAttribute()
	{
		return $this->collator_cno;
	}

	public function setCollatorcnoAttribute($value)
	{
		$this->collator_cno = $value;
	}
	//穴
	public function getCollatoranaAttribute()
	{
		return $this->collator_ana;
	}

	public function setCollatoranaAttribute($value)
	{
		$this->collator_ana = $value;
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
		$this->collator_all_outsou_cost = $value;
	}
	//コレータ部工賃小計
	public function getCollatorsubtotalAttribute()
	{
		return $this->collator_subtotal;
	}

	public function setCollatorsubtotalAttribute($value)
	{
		$this->collator_subtotal = $value;
	}
	//コレータ部基本料金
	public function getCollatorbasicfeeAttribute()
	{
		return $this->collator_basic_fee;
	}

	public function setCollatorbasicfeeAttribute($value)
	{
		$this->collator_basic_fee = $value;
	}
	//名刺色
	public function getNlcolorAttribute()
	{
		return $this->nl_color;
	}

	public function setNlcolorAttribute($value)
	{
		$this->nl_color = $value;
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
		$this->nl_hagaki_color = $value;
	}
	//封筒色
	public function getNlenvelopecolorAttribute()
	{
		return $this->nl_envelope_color;
	}

	public function setNlenvelopecolorAttribute($value)
	{
		$this->nl_envelope_color = $value;
	}
	//No.
	public function getNlnumberpartAttribute()
	{
		return $this->nl_number_part;
	}

	public function setNlnumberpartAttribute($value)
	{
		$this->nl_number_part = $value;
	}
	//ネームライナー工賃小計
	public function getNlsubtotalAttribute()
	{
		return $this->nl_subtotal;
	}

	public function setNlsubtotalAttribute($value)
	{
		$this->nl_subtotal = $value;
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




}
