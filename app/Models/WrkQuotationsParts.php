<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrkQuotationsParts extends Model
{
    use HasFactory;

    protected $table = 'wrk_quotations_parts';

	private $id;												// ID
	private $user_code;											// オペレータＩＤ
	private $m_code;											// 見積番号
	private $seq;												// 行番号
	private $parts_code;										// パーツコード
	private $paper_code;										// 用紙コード
	private $paper_name;										// 用紙名
	private $size_w;											// サイズ横
	private $size_h;											// サイズ縦
	private $size_top;											// サイズ分子
	private $size_bottom;										// サイズ分母
	private $papertray;											// 紙取
	private $imposition_w;										// 面付け横
	private $imposition_h;										// 面付け縦
	private $p_envelope;										// 封筒
	private $p_supply;											// 支給受
	private $p_desensitization;									// 減感
	private $p_carbon;											// カーボン
	private $p_white;											// ホワイト
	private $p_separate;										// セパレート
	private $p_color_front;										// 色数表
	private $p_color_back;										// 色数裏
	private $p_through;											// 通し数
	private $p_sheet;											// 実質・ｍ／枚・数
	private $p_mm_apply;										// 巻・丸め摘要単位Ｍ数
	private $p_mm_dispose;										// 巻・丸め処置後のＭ数
	private $p_mm_unit;											// 巻・丸め品目ｍ単価
	private $p_printing_cost;									// 印刷原価
	private $p_necessary_sheet;									// 総必要　枚数orＭ数
	private $p_paper_price;										// 用紙代金
	private $p_form_sewingmachine_w;							// ミシン横
	private $p_form_sewingmachine_h;							// ミシン縦
	private $p_form_sewingmachine_ks;							// ミシン基・セ
	private $p_form_jump_sewingmachine_w;						// ジャンプミシン横
	private $p_form_jump_sewingmachine_h;						// ジャンプミシン縦
	private $p_form_jump_sewingmachine_ks;						// ジャンプミシン基・セ
	private $p_form_micro_sewingmachine_w;						// マイクロミシン横
	private $p_form_micro_sewingmachine_h;						// マイクロミシン縦
	private $p_form_micro_sewingmachine_ks;						// マイクロミシン基・セ
	private $p_form_jump_micro_sewingmachine_w;					// ジャンプマイクロミシン横
	private $p_form_jump_micro_sewingmachine_h;					// ジャンプマイクロミシン縦
	private $p_form_jump_micro_sewingmachine_ks;				// ジャンプマイクロミシン基・セ
	private $p_form_linein_w;									// スジ入れ横
	private $p_form_linein_h;									// スジ入れ縦
	private $p_form_linein_ks;									// スジ入れ基・セ
	private $p_form_slitter_w;									// スリッター横
	private $p_form_slitter_h;									// スリッター縦
	private $p_form_slitter_ks;									// スリッター基・セ
	private $p_form_no;											// No.
	private $p_form_no_ks;										// No.基・セ
	private $p_form_cornercut;									// コーナーカット
	private $p_form_replace;									// 差替
	private $p_form_replace_color;								// カラー
	private $p_form_subtotal;									// フォーム部工賃小計
	private $p_offset_sewingmachine_w;							// ミシン
	private $p_offset_sewingmachine_ks;							// 基・セ
	private $p_offset_no;										// No.
	private $p_offset_no_ks;									// 基・セ
	private $p_offset_subtotal;									// オフセット部工賃小計
	private $p_letterpress_sewingmachine_hon;					// ミシン本
	private $p_letterpress_sewingmachine_dai;					// ミシン台
	private $p_letterpress_sewingmachine_ks;					// ミシン基・セ
	private $p_letterpress_jump_sewingmachine_hon;				// ジャンプミシン本
	private $p_letterpress_jump_sewingmachine_dai;				// ジャンプミシン台
	private $p_letterpress_jump_sewingmachine_ks;				// ジャンプミシン基・セ
	private $p_letterpress_micro_sewingmachine_hon;				// マイクロミシン本
	private $p_letterpress_micro_sewingmachine_dai;				// マイクロミシン台
	private $p_letterpress_micro_sewingmachine_ks;				// マイクロミシン基・セ
	private $p_letterpress_jump_micro_sewingmachine_hon;		// ジャンプマイクロミシン本
	private $p_letterpress_jump_micro_sewingmachine_dai;		// ジャンプマイクロミシン台
	private $p_letterpress_jump_micro_sewingmachine_ks;			// ジャンプマイクロミシン基・セ
	private $p_letterpress_linein_hon;							// スジ入れ本
	private $p_letterpress_linein_dai;							// スジ入れ台
	private $p_letterpress_linein_ks;							// スジ入れ基・セ
	private $p_letterpress_slitter_hon;							// スリッター本
	private $p_letterpress_slitter_dai;							// スリッター台
	private $p_letterpress_slitter_ks;							// スリッター基・セ
	private $p_letterpress_diecut;								// 型ヌキ
	private $p_letterpress_diecut_ks;							// 型ヌキ基・セ
	private $p_letterpress_pcno;								// 親子No.
	private $p_letterpress_pcno_ks;								// 親子No.基・セ
	private $p_letterpress_no;									// No.
	private $p_letterpress_no_ks;								// No.基・セ
	private $p_letterpress_subtotal;							// 活版部工賃小計
	private $p_info_toray;										// 東レ
	private $p_info_dot_line;									// ドットライン
	private $p_info_dot_dai;									// ドット台
	private $p_info_ijp;										// フォーム ＩＪＰ
	private $p_info_basic_fee;									// 基本料金
	private $p_info_output;										// 宛名等出力件数
	private $p_info_punching;									// パンチング
	private $p_info_subtotal;									// 情報処理工賃小計
	private $p_diecutter_sewingmachine_hon;						// ミシン本
	private $p_diecutter_sewingmachine_dai;						// ミシン台
	private $p_diecutter_sewingmachine_ks;						// ミシン基・セ
	private $p_diecutter_jump_sewingmachine_hon;				// ジャンプミシン本
	private $p_diecutter_jump_sewingmachine_dai;				// ジャンプミシン台
	private $p_diecutter_jump_sewingmachine_ks;					// ジャンプミシン基・セ
	private $p_diecutter_micro_sewingmachine_hon;				// マイクロミシン本
	private $p_diecutter_micro_sewingmachine_dai;				// マイクロミシン台
	private $p_diecutter_micro_sewingmachine_ks;				// マイクロミシン基・セ
	private $p_diecutter_jump_micro_sewingmachine_hon;			// ジャンプマイクロミシン本
	private $p_diecutter_jump_micro_sewingmachine_dai;			// ジャンプマイクロミシン台
	private $p_diecutter_jump_micro_sewingmachine_ks;			// ジャンプマイクロミシン基・セ
	private $p_diecutter_ana_hon;								// 穴本
	private $p_diecutter_ana_dai;								// 穴台
	private $p_diecutter_ana_ks;								// 穴基・セ
	private $p_diecutter_cornercut;								// コーナーカットヶ所
	private $p_diecutter_cornercut_dai;							// コーナーカット台
	private $p_diecutter_cornercut_ks;							// コーナーカット基・セ
	private $p_diecutter_subtotal;								// ダイカッタ工賃小計
	private $outsource_paper;									// 紙の外注先
	private $outsource_paper_cost;								// 外注費
	private $outsource_paper_all;								// このP全部の外注先
	private $outsource_paper_all_cost;							// 外注費
	private $created_user;										// 作成ユーザー
	private $updated_user;										// 修正ユーザー
	private $created_at;										// 作成時間
	private $updated_at;										// 修正時間
	private $is_deleted;										// 削除フラグ


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
	//行番号
	public function getSeqAttribute()
	{
		return $this->seq;
	}

	public function setSeqAttribute($value)
	{
		$this->seq = $value;
	}
	//パーツコード
	public function getPartscodeAttribute()
	{
		return $this->parts_code;
	}

	public function setPartscodeAttribute($value)
	{
		$this->parts_code = $value;
	}
	//用紙コード
	public function getPapercodeAttribute()
	{
		return $this->paper_code;
	}

	public function setPapercodeAttribute($value)
	{
		$this->paper_code = $value;
	}
	//用紙名
	public function getPapernameAttribute()
	{
		return $this->paper_name;
	}

	public function setPapernameAttribute($value)
	{
		$this->paper_name = $value;
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
	//封筒
	public function getPenvelopeAttribute()
	{
		return $this->p_envelope;
	}

	public function setPenvelopeAttribute($value)
	{
		$this->p_envelope = $value;
	}
	//支給受
	public function getPsupplyAttribute()
	{
		return $this->p_supply;
	}

	public function setPsupplyAttribute($value)
	{
		$this->p_supply = $value;
	}
	//減感
	public function getPdesensitizationAttribute()
	{
		return $this->p_desensitization;
	}

	public function setPdesensitizationAttribute($value)
	{
		$this->p_desensitization = $value;
	}
	//カーボン
	public function getPcarbonAttribute()
	{
		return $this->p_carbon;
	}

	public function setPcarbonAttribute($value)
	{
		$this->p_carbon = $value;
	}
	//ホワイト
	public function getPwhiteAttribute()
	{
		return $this->p_white;
	}

	public function setPwhiteAttribute($value)
	{
		$this->p_white = $value;
	}
	//セパレート
	public function getPseparateAttribute()
	{
		return $this->p_separate;
	}

	public function setPseparateAttribute($value)
	{
		$this->p_separate = $value;
	}
	//色数表
	public function getPcolorfrontAttribute()
	{
		return $this->p_color_front;
	}

	public function setPcolorfrontAttribute($value)
	{
		$this->p_color_front = $value;
	}
	//色数裏
	public function getPcolorbackAttribute()
	{
		return $this->p_color_back;
	}

	public function setPcolorbackAttribute($value)
	{
		$this->p_color_back = $value;
	}
	//通し数
	public function getPthroughAttribute()
	{
		return $this->p_through;
	}

	public function setPthroughAttribute($value)
	{
		$this->p_through = $value;
	}
	//実質・ｍ／枚・数
	public function getPsheetAttribute()
	{
		return $this->p_sheet;
	}

	public function setPsheetAttribute($value)
	{
		$this->p_sheet = $value;
	}
	//巻・丸め摘要単位Ｍ数
	public function getPmmapplyAttribute()
	{
		return $this->p_mm_apply;
	}

	public function setPmmapplyAttribute($value)
	{
		$this->p_mm_apply = $value;
	}
	//巻・丸め処置後のＭ数
	public function getPmmdisposeAttribute()
	{
		return $this->p_mm_dispose;
	}

	public function setPmmdisposeAttribute($value)
	{
		$this->p_mm_dispose = $value;
	}
	//巻・丸め品目ｍ単価
	public function getPmmunitAttribute()
	{
		return $this->p_mm_unit;
	}

	public function setPmmunitAttribute($value)
	{
		$this->p_mm_unit = $value;
	}
	//印刷原価
	public function getPprintingcostAttribute()
	{
		return $this->p_printing_cost;
	}

	public function setPprintingcostAttribute($value)
	{
		$this->p_printing_cost = $value;
	}
	//総必要　枚数orＭ数
	public function getPnecessarysheetAttribute()
	{
		return $this->p_necessary_sheet;
	}

	public function setPnecessarysheetAttribute($value)
	{
		$this->p_necessary_sheet = $value;
	}
	//用紙代金
	public function getPpaperpriceAttribute()
	{
		return $this->p_paper_price;
	}

	public function setPpaperpriceAttribute($value)
	{
		$this->p_paper_price = $value;
	}
	//ミシン横
	public function getPformsewingmachinewAttribute()
	{
		return $this->p_form_sewingmachine_w;
	}

	public function setPformsewingmachinewAttribute($value)
	{
		$this->p_form_sewingmachine_w = $value;
	}
	//ミシン縦
	public function getPformsewingmachinehAttribute()
	{
		return $this->p_form_sewingmachine_h;
	}

	public function setPformsewingmachinehAttribute($value)
	{
		$this->p_form_sewingmachine_h = $value;
	}
	//ミシン基・セ
	public function getPformsewingmachineksAttribute()
	{
		return $this->p_form_sewingmachine_ks;
	}

	public function setPformsewingmachineksAttribute($value)
	{
		$this->p_form_sewingmachine_ks = $value;
	}
	//ジャンプミシン横
	public function getPformjumpsewingmachinewAttribute()
	{
		return $this->p_form_jump_sewingmachine_w;
	}

	public function setPformjumpsewingmachinewAttribute($value)
	{
		$this->p_form_jump_sewingmachine_w = $value;
	}
	//ジャンプミシン縦
	public function getPformjumpsewingmachinehAttribute()
	{
		return $this->p_form_jump_sewingmachine_h;
	}

	public function setPformjumpsewingmachinehAttribute($value)
	{
		$this->p_form_jump_sewingmachine_h = $value;
	}
	//ジャンプミシン基・セ
	public function getPformjumpsewingmachineksAttribute()
	{
		return $this->p_form_jump_sewingmachine_ks;
	}

	public function setPformjumpsewingmachineksAttribute($value)
	{
		$this->p_form_jump_sewingmachine_ks = $value;
	}
	//マイクロミシン横
	public function getPformmicrosewingmachinewAttribute()
	{
		return $this->p_form_micro_sewingmachine_w;
	}

	public function setPformmicrosewingmachinewAttribute($value)
	{
		$this->p_form_micro_sewingmachine_w = $value;
	}
	//マイクロミシン縦
	public function getPformmicrosewingmachinehAttribute()
	{
		return $this->p_form_micro_sewingmachine_h;
	}

	public function setPformmicrosewingmachinehAttribute($value)
	{
		$this->p_form_micro_sewingmachine_h = $value;
	}
	//マイクロミシン基・セ
	public function getPformmicrosewingmachineksAttribute()
	{
		return $this->p_form_micro_sewingmachine_ks;
	}

	public function setPformmicrosewingmachineksAttribute($value)
	{
		$this->p_form_micro_sewingmachine_ks = $value;
	}
	//ジャンプマイクロミシン横
	public function getPformjumpmicrosewingmachinewAttribute()
	{
		return $this->p_form_jump_micro_sewingmachine_w;
	}

	public function setPformjumpmicrosewingmachinewAttribute($value)
	{
		$this->p_form_jump_micro_sewingmachine_w = $value;
	}
	//ジャンプマイクロミシン縦
	public function getPformjumpmicrosewingmachinehAttribute()
	{
		return $this->p_form_jump_micro_sewingmachine_h;
	}

	public function setPformjumpmicrosewingmachinehAttribute($value)
	{
		$this->p_form_jump_micro_sewingmachine_h = $value;
	}
	//ジャンプマイクロミシン基・セ
	public function getPformjumpmicrosewingmachineksAttribute()
	{
		return $this->p_form_jump_micro_sewingmachine_ks;
	}

	public function setPformjumpmicrosewingmachineksAttribute($value)
	{
		$this->p_form_jump_micro_sewingmachine_ks = $value;
	}
	//スジ入れ横
	public function getPformlineinwAttribute()
	{
		return $this->p_form_linein_w;
	}

	public function setPformlineinwAttribute($value)
	{
		$this->p_form_linein_w = $value;
	}
	//スジ入れ縦
	public function getPformlineinhAttribute()
	{
		return $this->p_form_linein_h;
	}

	public function setPformlineinhAttribute($value)
	{
		$this->p_form_linein_h = $value;
	}
	//スジ入れ基・セ
	public function getPformlineinksAttribute()
	{
		return $this->p_form_linein_ks;
	}

	public function setPformlineinksAttribute($value)
	{
		$this->p_form_linein_ks = $value;
	}
	//スリッター横
	public function getPformslitterwAttribute()
	{
		return $this->p_form_slitter_w;
	}

	public function setPformslitterwAttribute($value)
	{
		$this->p_form_slitter_w = $value;
	}
	//スリッター縦
	public function getPformslitterhAttribute()
	{
		return $this->p_form_slitter_h;
	}

	public function setPformslitterhAttribute($value)
	{
		$this->p_form_slitter_h = $value;
	}
	//スリッター基・セ
	public function getPformslitterksAttribute()
	{
		return $this->p_form_slitter_ks;
	}

	public function setPformslitterksAttribute($value)
	{
		$this->p_form_slitter_ks = $value;
	}
	//No.
	public function getPformnoAttribute()
	{
		return $this->p_form_no;
	}

	public function setPformnoAttribute($value)
	{
		$this->p_form_no = $value;
	}
	//No.基・セ
	public function getPformnoksAttribute()
	{
		return $this->p_form_no_ks;
	}

	public function setPformnoksAttribute($value)
	{
		$this->p_form_no_ks = $value;
	}
	//コーナーカット
	public function getPformcornercutAttribute()
	{
		return $this->p_form_cornercut;
	}

	public function setPformcornercutAttribute($value)
	{
		$this->p_form_cornercut = $value;
	}
	//差替
	public function getPformreplaceAttribute()
	{
		return $this->p_form_replace;
	}

	public function setPformreplaceAttribute($value)
	{
		$this->p_form_replace = $value;
	}
	//カラー
	public function getPformreplacecolorAttribute()
	{
		return $this->p_form_replace_color;
	}

	public function setPformreplacecolorAttribute($value)
	{
		$this->p_form_replace_color = $value;
	}
	//フォーム部工賃小計
	public function getPformsubtotalAttribute()
	{
		return $this->p_form_subtotal;
	}

	public function setPformsubtotalAttribute($value)
	{
		$this->p_form_subtotal = $value;
	}
	//ミシン
	public function getPoffsetsewingmachinewAttribute()
	{
		return $this->p_offset_sewingmachine_w;
	}

	public function setPoffsetsewingmachinewAttribute($value)
	{
		$this->p_offset_sewingmachine_w = $value;
	}
	//基・セ
	public function getPoffsetsewingmachineksAttribute()
	{
		return $this->p_offset_sewingmachine_ks;
	}

	public function setPoffsetsewingmachineksAttribute($value)
	{
		$this->p_offset_sewingmachine_ks = $value;
	}
	//No.
	public function getPoffsetnoAttribute()
	{
		return $this->p_offset_no;
	}

	public function setPoffsetnoAttribute($value)
	{
		$this->p_offset_no = $value;
	}
	//基・セ
	public function getPoffsetnoksAttribute()
	{
		return $this->p_offset_no_ks;
	}

	public function setPoffsetnoksAttribute($value)
	{
		$this->p_offset_no_ks = $value;
	}
	//オフセット部工賃小計
	public function getPoffsetsubtotalAttribute()
	{
		return $this->p_offset_subtotal;
	}

	public function setPoffsetsubtotalAttribute($value)
	{
		$this->p_offset_subtotal = $value;
	}
	//ミシン本
	public function getPletterpresssewingmachinehonAttribute()
	{
		return $this->p_letterpress_sewingmachine_hon;
	}

	public function setPletterpresssewingmachinehonAttribute($value)
	{
		$this->p_letterpress_sewingmachine_hon = $value;
	}
	//ミシン台
	public function getPletterpresssewingmachinedaiAttribute()
	{
		return $this->p_letterpress_sewingmachine_dai;
	}

	public function setPletterpresssewingmachinedaiAttribute($value)
	{
		$this->p_letterpress_sewingmachine_dai = $value;
	}
	//ミシン基・セ
	public function getPletterpresssewingmachineksAttribute()
	{
		return $this->p_letterpress_sewingmachine_ks;
	}

	public function setPletterpresssewingmachineksAttribute($value)
	{
		$this->p_letterpress_sewingmachine_ks = $value;
	}
	//ジャンプミシン本
	public function getPletterpressjumpsewingmachinehonAttribute()
	{
		return $this->p_letterpress_jump_sewingmachine_hon;
	}

	public function setPletterpressjumpsewingmachinehonAttribute($value)
	{
		$this->p_letterpress_jump_sewingmachine_hon = $value;
	}
	//ジャンプミシン台
	public function getPletterpressjumpsewingmachinedaiAttribute()
	{
		return $this->p_letterpress_jump_sewingmachine_dai;
	}

	public function setPletterpressjumpsewingmachinedaiAttribute($value)
	{
		$this->p_letterpress_jump_sewingmachine_dai = $value;
	}
	//ジャンプミシン基・セ
	public function getPletterpressjumpsewingmachineksAttribute()
	{
		return $this->p_letterpress_jump_sewingmachine_ks;
	}

	public function setPletterpressjumpsewingmachineksAttribute($value)
	{
		$this->p_letterpress_jump_sewingmachine_ks = $value;
	}
	//マイクロミシン本
	public function getPletterpressmicrosewingmachinehonAttribute()
	{
		return $this->p_letterpress_micro_sewingmachine_hon;
	}

	public function setPletterpressmicrosewingmachinehonAttribute($value)
	{
		$this->p_letterpress_micro_sewingmachine_hon = $value;
	}
	//マイクロミシン台
	public function getPletterpressmicrosewingmachinedaiAttribute()
	{
		return $this->p_letterpress_micro_sewingmachine_dai;
	}

	public function setPletterpressmicrosewingmachinedaiAttribute($value)
	{
		$this->p_letterpress_micro_sewingmachine_dai = $value;
	}
	//マイクロミシン基・セ
	public function getPletterpressmicrosewingmachineksAttribute()
	{
		return $this->p_letterpress_micro_sewingmachine_ks;
	}

	public function setPletterpressmicrosewingmachineksAttribute($value)
	{
		$this->p_letterpress_micro_sewingmachine_ks = $value;
	}
	//ジャンプマイクロミシン本
	public function getPletterpressjumpmicrosewingmachinehonAttribute()
	{
		return $this->p_letterpress_jump_micro_sewingmachine_hon;
	}

	public function setPletterpressjumpmicrosewingmachinehonAttribute($value)
	{
		$this->p_letterpress_jump_micro_sewingmachine_hon = $value;
	}
	//ジャンプマイクロミシン台
	public function getPletterpressjumpmicrosewingmachinedaiAttribute()
	{
		return $this->p_letterpress_jump_micro_sewingmachine_dai;
	}

	public function setPletterpressjumpmicrosewingmachinedaiAttribute($value)
	{
		$this->p_letterpress_jump_micro_sewingmachine_dai = $value;
	}
	//ジャンプマイクロミシン基・セ
	public function getPletterpressjumpmicrosewingmachineksAttribute()
	{
		return $this->p_letterpress_jump_micro_sewingmachine_ks;
	}

	public function setPletterpressjumpmicrosewingmachineksAttribute($value)
	{
		$this->p_letterpress_jump_micro_sewingmachine_ks = $value;
	}
	//スジ入れ本
	public function getPletterpresslineinhonAttribute()
	{
		return $this->p_letterpress_linein_hon;
	}

	public function setPletterpresslineinhonAttribute($value)
	{
		$this->p_letterpress_linein_hon = $value;
	}
	//スジ入れ台
	public function getPletterpresslineindaiAttribute()
	{
		return $this->p_letterpress_linein_dai;
	}

	public function setPletterpresslineindaiAttribute($value)
	{
		$this->p_letterpress_linein_dai = $value;
	}
	//スジ入れ基・セ
	public function getPletterpresslineinksAttribute()
	{
		return $this->p_letterpress_linein_ks;
	}

	public function setPletterpresslineinksAttribute($value)
	{
		$this->p_letterpress_linein_ks = $value;
	}
	//スリッター本
	public function getPletterpressslitterhonAttribute()
	{
		return $this->p_letterpress_slitter_hon;
	}

	public function setPletterpressslitterhonAttribute($value)
	{
		$this->p_letterpress_slitter_hon = $value;
	}
	//スリッター台
	public function getPletterpressslitterdaiAttribute()
	{
		return $this->p_letterpress_slitter_dai;
	}

	public function setPletterpressslitterdaiAttribute($value)
	{
		$this->p_letterpress_slitter_dai = $value;
	}
	//スリッター基・セ
	public function getPletterpressslitterksAttribute()
	{
		return $this->p_letterpress_slitter_ks;
	}

	public function setPletterpressslitterksAttribute($value)
	{
		$this->p_letterpress_slitter_ks = $value;
	}
	//型ヌキ
	public function getPletterpressdiecutAttribute()
	{
		return $this->p_letterpress_diecut;
	}

	public function setPletterpressdiecutAttribute($value)
	{
		$this->p_letterpress_diecut = $value;
	}
	//型ヌキ基・セ
	public function getPletterpressdiecutksAttribute()
	{
		return $this->p_letterpress_diecut_ks;
	}

	public function setPletterpressdiecutksAttribute($value)
	{
		$this->p_letterpress_diecut_ks = $value;
	}
	//親子No.
	public function getPletterpresspcnoAttribute()
	{
		return $this->p_letterpress_pcno;
	}

	public function setPletterpresspcnoAttribute($value)
	{
		$this->p_letterpress_pcno = $value;
	}
	//親子No.基・セ
	public function getPletterpresspcnoksAttribute()
	{
		return $this->p_letterpress_pcno_ks;
	}

	public function setPletterpresspcnoksAttribute($value)
	{
		$this->p_letterpress_pcno_ks = $value;
	}
	//No.
	public function getPletterpressnoAttribute()
	{
		return $this->p_letterpress_no;
	}

	public function setPletterpressnoAttribute($value)
	{
		$this->p_letterpress_no = $value;
	}
	//No.基・セ
	public function getPletterpressnoksAttribute()
	{
		return $this->p_letterpress_no_ks;
	}

	public function setPletterpressnoksAttribute($value)
	{
		$this->p_letterpress_no_ks = $value;
	}
	//活版部工賃小計
	public function getPletterpresssubtotalAttribute()
	{
		return $this->p_letterpress_subtotal;
	}

	public function setPletterpresssubtotalAttribute($value)
	{
		$this->p_letterpress_subtotal = $value;
	}
	//東レ
	public function getPinfotorayAttribute()
	{
		return $this->p_info_toray;
	}

	public function setPinfotorayAttribute($value)
	{
		$this->p_info_toray = $value;
	}
	//ドットライン
	public function getPinfodotlineAttribute()
	{
		return $this->p_info_dot_line;
	}

	public function setPinfodotlineAttribute($value)
	{
		$this->p_info_dot_line = $value;
	}
	//ドット台
	public function getPinfodotdaiAttribute()
	{
		return $this->p_info_dot_dai;
	}

	public function setPinfodotdaiAttribute($value)
	{
		$this->p_info_dot_dai = $value;
	}
	//フォーム ＩＪＰ
	public function getPinfoijpAttribute()
	{
		return $this->p_info_ijp;
	}

	public function setPinfoijpAttribute($value)
	{
		$this->p_info_ijp = $value;
	}
	//基本料金
	public function getPinfobasicfeeAttribute()
	{
		return $this->p_info_basic_fee;
	}

	public function setPinfobasicfeeAttribute($value)
	{
		$this->p_info_basic_fee = $value;
	}
	//宛名等出力件数
	public function getPinfooutputAttribute()
	{
		return $this->p_info_output;
	}

	public function setPinfooutputAttribute($value)
	{
		$this->p_info_output = $value;
	}
	//パンチング
	public function getPinfopunchingAttribute()
	{
		return $this->p_info_punching;
	}

	public function setPinfopunchingAttribute($value)
	{
		$this->p_info_punching = $value;
	}
	//情報処理工賃小計
	public function getPinfosubtotalAttribute()
	{
		return $this->p_info_subtotal;
	}

	public function setPinfosubtotalAttribute($value)
	{
		$this->p_info_subtotal = $value;
	}
	//ミシン本
	public function getPdiecuttersewingmachinehonAttribute()
	{
		return $this->p_diecutter_sewingmachine_hon;
	}

	public function setPdiecuttersewingmachinehonAttribute($value)
	{
		$this->p_diecutter_sewingmachine_hon = $value;
	}
	//ミシン台
	public function getPdiecuttersewingmachinedaiAttribute()
	{
		return $this->p_diecutter_sewingmachine_dai;
	}

	public function setPdiecuttersewingmachinedaiAttribute($value)
	{
		$this->p_diecutter_sewingmachine_dai = $value;
	}
	//ミシン基・セ
	public function getPdiecuttersewingmachineksAttribute()
	{
		return $this->p_diecutter_sewingmachine_ks;
	}

	public function setPdiecuttersewingmachineksAttribute($value)
	{
		$this->p_diecutter_sewingmachine_ks = $value;
	}
	//ジャンプミシン本
	public function getPdiecutterjumpsewingmachinehonAttribute()
	{
		return $this->p_diecutter_jump_sewingmachine_hon;
	}

	public function setPdiecutterjumpsewingmachinehonAttribute($value)
	{
		$this->p_diecutter_jump_sewingmachine_hon = $value;
	}
	//ジャンプミシン台
	public function getPdiecutterjumpsewingmachinedaiAttribute()
	{
		return $this->p_diecutter_jump_sewingmachine_dai;
	}

	public function setPdiecutterjumpsewingmachinedaiAttribute($value)
	{
		$this->p_diecutter_jump_sewingmachine_dai = $value;
	}
	//ジャンプミシン基・セ
	public function getPdiecutterjumpsewingmachineksAttribute()
	{
		return $this->p_diecutter_jump_sewingmachine_ks;
	}

	public function setPdiecutterjumpsewingmachineksAttribute($value)
	{
		$this->p_diecutter_jump_sewingmachine_ks = $value;
	}
	//マイクロミシン本
	public function getPdiecuttermicrosewingmachinehonAttribute()
	{
		return $this->p_diecutter_micro_sewingmachine_hon;
	}

	public function setPdiecuttermicrosewingmachinehonAttribute($value)
	{
		$this->p_diecutter_micro_sewingmachine_hon = $value;
	}
	//マイクロミシン台
	public function getPdiecuttermicrosewingmachinedaiAttribute()
	{
		return $this->p_diecutter_micro_sewingmachine_dai;
	}

	public function setPdiecuttermicrosewingmachinedaiAttribute($value)
	{
		$this->p_diecutter_micro_sewingmachine_dai = $value;
	}
	//マイクロミシン基・セ
	public function getPdiecuttermicrosewingmachineksAttribute()
	{
		return $this->p_diecutter_micro_sewingmachine_ks;
	}

	public function setPdiecuttermicrosewingmachineksAttribute($value)
	{
		$this->p_diecutter_micro_sewingmachine_ks = $value;
	}
	//ジャンプマイクロミシン本
	public function getPdiecutterjumpmicrosewingmachinehonAttribute()
	{
		return $this->p_diecutter_jump_micro_sewingmachine_hon;
	}

	public function setPdiecutterjumpmicrosewingmachinehonAttribute($value)
	{
		$this->p_diecutter_jump_micro_sewingmachine_hon = $value;
	}
	//ジャンプマイクロミシン台
	public function getPdiecutterjumpmicrosewingmachinedaiAttribute()
	{
		return $this->p_diecutter_jump_micro_sewingmachine_dai;
	}

	public function setPdiecutterjumpmicrosewingmachinedaiAttribute($value)
	{
		$this->p_diecutter_jump_micro_sewingmachine_dai = $value;
	}
	//ジャンプマイクロミシン基・セ
	public function getPdiecutterjumpmicrosewingmachineksAttribute()
	{
		return $this->p_diecutter_jump_micro_sewingmachine_ks;
	}

	public function setPdiecutterjumpmicrosewingmachineksAttribute($value)
	{
		$this->p_diecutter_jump_micro_sewingmachine_ks = $value;
	}
	//穴本
	public function getPdiecutteranahonAttribute()
	{
		return $this->p_diecutter_ana_hon;
	}

	public function setPdiecutteranahonAttribute($value)
	{
		$this->p_diecutter_ana_hon = $value;
	}
	//穴台
	public function getPdiecutteranadaiAttribute()
	{
		return $this->p_diecutter_ana_dai;
	}

	public function setPdiecutteranadaiAttribute($value)
	{
		$this->p_diecutter_ana_dai = $value;
	}
	//穴基・セ
	public function getPdiecutteranaksAttribute()
	{
		return $this->p_diecutter_ana_ks;
	}

	public function setPdiecutteranaksAttribute($value)
	{
		$this->p_diecutter_ana_ks = $value;
	}
	//コーナーカットヶ所
	public function getPdiecuttercornercutAttribute()
	{
		return $this->p_diecutter_cornercut;
	}

	public function setPdiecuttercornercutAttribute($value)
	{
		$this->p_diecutter_cornercut = $value;
	}
	//コーナーカット台
	public function getPdiecuttercornercutdaiAttribute()
	{
		return $this->p_diecutter_cornercut_dai;
	}

	public function setPdiecuttercornercutdaiAttribute($value)
	{
		$this->p_diecutter_cornercut_dai = $value;
	}
	//コーナーカット基・セ
	public function getPdiecuttercornercutksAttribute()
	{
		return $this->p_diecutter_cornercut_ks;
	}

	public function setPdiecuttercornercutksAttribute($value)
	{
		$this->p_diecutter_cornercut_ks = $value;
	}
	//ダイカッタ工賃小計
	public function getPdiecuttersubtotalAttribute()
	{
		return $this->p_diecutter_subtotal;
	}

	public function setPdiecuttersubtotalAttribute($value)
	{
		$this->p_diecutter_subtotal = $value;
	}
	//紙の外注先
	public function getOutsourcepaperAttribute()
	{
		return $this->outsource_paper;
	}

	public function setOutsourcepaperAttribute($value)
	{
		$this->outsource_paper = $value;
	}
	//外注費
	public function getOutsourcepapercostAttribute()
	{
		return $this->outsource_paper_cost;
	}

	public function setOutsourcepapercostAttribute($value)
	{
		$this->outsource_paper_cost = $value;
	}
	//このP全部の外注先
	public function getOutsourcepaperallAttribute()
	{
		return $this->outsource_paper_all;
	}

	public function setOutsourcepaperallAttribute($value)
	{
		$this->outsource_paper_all = $value;
	}
	//外注費
	public function getOutsourcepaperallcostAttribute()
	{
		return $this->outsource_paper_all_cost;
	}

	public function setOutsourcepaperallcostAttribute($value)
	{
		$this->outsource_paper_all_cost = $value;
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
