<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrkQuotationsBinding extends Model
{
    use HasFactory;

    protected $table = 'wrk_quotations_binding';

    private $id;                           // ID
	private $m_code;                       // 見積番号
	private $sei_time;                     // 完結時刻
	private $sei_chouai;                   // 丁合
	private $sei_chouai_outsou;            // 外注先
	private $sei_chouai_outsou_cost;       // 外注費
	private $sei_dansai;                   // 断裁
	private $sei_dansai_outsou;            // 外注先
	private $sei_dansai_outsou_cost;       // 外注費
	private $sei_marble;                   // マーブル
	private $sei_cross;                    // クロス
	private $sei_mat_maki_cardboard;       // 下敷巻ボール
	private $sei_mat_cardboard;            // 下敷ボール
	private $sei_nori;                     // 糊
	private $sei_tsuduri;                  // 綴
	private $sei_kurumi;                   // くるみ
	private $sei_laminate;                 // ラミネート
	private $sei_laminate_through;         // ラミネート通し
	private $sei_buster;                   // バスター
	private $sei_crimping;                 // 圧着
	private $sei_musen_tozi;               // 無線トジ
	private $sei_musen_tozi_outsou;        // 外注先
	private $sei_musen_tozi_outsou_cost;   // 外注費
	private $sei_naka_tozi;                // 中トジ
	private $sei_naka_tozi_outsou;         // 外注先
	private $sei_naka_tozi_outsou_cost;    // 外注費
	private $sei_sashikomi;                // 差込
	private $sei_sashikomi_outsou;         // 外注先
	private $sei_sashikomi_outsou_cost;    // 外注費
	private $sei_ana;                      // 穴数
	private $sei_part;                     // ヶ所
	private $sei_donko;                    // ドンコ
	private $sei_ori_w;                    // 折回数横
	private $sei_ori_h;                    // 折回数縦
	private $sei_obi;                      // 帯
	private $sei_bara;                     // バラ
	private $sei_oneset;                   // ワンセット
	private $sei_obake;                    // オバケ
	private $sei_otoshi;                   // 落とし
	private $sei_otoshi_part;              // 落としヶ所
	private $sei_package;                  // 梱装
	private $sei_package_num;              // 梱装個
	private $sei_box;                      // 箱
	private $sei_box_num;                  // 箱個
	private $sei_a_system;                 // A式
	private $sei_c_system;                 // C式
	private $sei_vinyl;                    // ビニール
	private $sei_all_outsou;               // 外注先
	private $sei_all_outsou_cost;          // 外注費
	private $sei_subtotal;                 // 製本部工賃小計
	private $created_user;                 // 作成ユーザー
	private $updated_user;                 // 修正ユーザー
	private $created_at;                   // 作成時間
	private $updated_at;                   // 修正時間
	private $is_deleted;                   // 削除フラグ


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
	//完結時刻
	public function getSeitimeAttribute()
	{
	    return $this->sei_time;
	}

	public function setSeitimeAttribute($value)
	{
	    $this->sei_time = $value;
	}
	//丁合
	public function getSeichouaiAttribute()
	{
	    return $this->sei_chouai;
	}

	public function setSeichouaiAttribute($value)
	{
	    $this->sei_chouai = $value;
	}
	//外注先
	public function getSeichouaioutsouAttribute()
	{
	    return $this->sei_chouai_outsou;
	}

	public function setSeichouaioutsouAttribute($value)
	{
	    $this->sei_chouai_outsou = $value;
	}
	//外注費
	public function getSeichouaioutsoucostAttribute()
	{
	    return $this->sei_chouai_outsou_cost;
	}

	public function setSeichouaioutsoucostAttribute($value)
	{
	    $this->sei_chouai_outsou_cost = $value;
	}
	//断裁
	public function getSeidansaiAttribute()
	{
	    return $this->sei_dansai;
	}

	public function setSeidansaiAttribute($value)
	{
	    $this->sei_dansai = $value;
	}
	//外注先
	public function getSeidansaioutsouAttribute()
	{
	    return $this->sei_dansai_outsou;
	}

	public function setSeidansaioutsouAttribute($value)
	{
	    $this->sei_dansai_outsou = $value;
	}
	//外注費
	public function getSeidansaioutsoucostAttribute()
	{
	    return $this->sei_dansai_outsou_cost;
	}

	public function setSeidansaioutsoucostAttribute($value)
	{
	    $this->sei_dansai_outsou_cost = $value;
	}
	//マーブル
	public function getSeimarbleAttribute()
	{
	    return $this->sei_marble;
	}

	public function setSeimarbleAttribute($value)
	{
	    $this->sei_marble = $value;
	}
	//クロス
	public function getSeicrossAttribute()
	{
	    return $this->sei_cross;
	}

	public function setSeicrossAttribute($value)
	{
	    $this->sei_cross = $value;
	}
	//下敷巻ボール
	public function getSeimatmakicardboardAttribute()
	{
	    return $this->sei_mat_maki_cardboard;
	}

	public function setSeimatmakicardboardAttribute($value)
	{
	    $this->sei_mat_maki_cardboard = $value;
	}
	//下敷ボール
	public function getSeimatcardboardAttribute()
	{
	    return $this->sei_mat_cardboard;
	}

	public function setSeimatcardboardAttribute($value)
	{
	    $this->sei_mat_cardboard = $value;
	}
	//糊
	public function getSeinoriAttribute()
	{
	    return $this->sei_nori;
	}

	public function setSeinoriAttribute($value)
	{
	    $this->sei_nori = $value;
	}
	//綴
	public function getSeitsuduriAttribute()
	{
	    return $this->sei_tsuduri;
	}

	public function setSeitsuduriAttribute($value)
	{
	    $this->sei_tsuduri = $value;
	}
	//くるみ
	public function getSeikurumiAttribute()
	{
	    return $this->sei_kurumi;
	}

	public function setSeikurumiAttribute($value)
	{
	    $this->sei_kurumi = $value;
	}
	//ラミネート
	public function getSeilaminateAttribute()
	{
	    return $this->sei_laminate;
	}

	public function setSeilaminateAttribute($value)
	{
	    $this->sei_laminate = $value;
	}
	//ラミネート通し
	public function getSeilaminatethroughAttribute()
	{
	    return $this->sei_laminate_through;
	}

	public function setSeilaminatethroughAttribute($value)
	{
	    $this->sei_laminate_through = $value;
	}
	//バスター
	public function getSeibusterAttribute()
	{
	    return $this->sei_buster;
	}

	public function setSeibusterAttribute($value)
	{
	    $this->sei_buster = $value;
	}
	//圧着
	public function getSeicrimpingAttribute()
	{
	    return $this->sei_crimping;
	}

	public function setSeicrimpingAttribute($value)
	{
	    $this->sei_crimping = $value;
	}
	//無線トジ
	public function getSeimusentoziAttribute()
	{
	    return $this->sei_musen_tozi;
	}

	public function setSeimusentoziAttribute($value)
	{
	    $this->sei_musen_tozi = $value;
	}
	//外注先
	public function getSeimusentozioutsouAttribute()
	{
	    return $this->sei_musen_tozi_outsou;
	}

	public function setSeimusentozioutsouAttribute($value)
	{
	    $this->sei_musen_tozi_outsou = $value;
	}
	//外注費
	public function getSeimusentozioutsoucostAttribute()
	{
	    return $this->sei_musen_tozi_outsou_cost;
	}

	public function setSeimusentozioutsoucostAttribute($value)
	{
	    $this->sei_musen_tozi_outsou_cost = $value;
	}
	//中トジ
	public function getSeinakatoziAttribute()
	{
	    return $this->sei_naka_tozi;
	}

	public function setSeinakatoziAttribute($value)
	{
	    $this->sei_naka_tozi = $value;
	}
	//外注先
	public function getSeinakatozioutsouAttribute()
	{
	    return $this->sei_naka_tozi_outsou;
	}

	public function setSeinakatozioutsouAttribute($value)
	{
	    $this->sei_naka_tozi_outsou = $value;
	}
	//外注費
	public function getSeinakatozioutsoucostAttribute()
	{
	    return $this->sei_naka_tozi_outsou_cost;
	}

	public function setSeinakatozioutsoucostAttribute($value)
	{
	    $this->sei_naka_tozi_outsou_cost = $value;
	}
	//差込
	public function getSeisashikomiAttribute()
	{
	    return $this->sei_sashikomi;
	}

	public function setSeisashikomiAttribute($value)
	{
	    $this->sei_sashikomi = $value;
	}
	//外注先
	public function getSeisashikomioutsouAttribute()
	{
	    return $this->sei_sashikomi_outsou;
	}

	public function setSeisashikomioutsouAttribute($value)
	{
	    $this->sei_sashikomi_outsou = $value;
	}
	//外注費
	public function getSeisashikomioutsoucostAttribute()
	{
	    return $this->sei_sashikomi_outsou_cost;
	}

	public function setSeisashikomioutsoucostAttribute($value)
	{
	    $this->sei_sashikomi_outsou_cost = $value;
	}
	//穴数
	public function getSeianaAttribute()
	{
	    return $this->sei_ana;
	}

	public function setSeianaAttribute($value)
	{
	    $this->sei_ana = $value;
	}
	//ヶ所
	public function getSeipartAttribute()
	{
	    return $this->sei_part;
	}

	public function setSeipartAttribute($value)
	{
	    $this->sei_part = $value;
	}
	//ドンコ
	public function getSeidonkoAttribute()
	{
	    return $this->sei_donko;
	}

	public function setSeidonkoAttribute($value)
	{
	    $this->sei_donko = $value;
	}
	//折回数横
	public function getSeioriwAttribute()
	{
	    return $this->sei_ori_w;
	}

	public function setSeioriwAttribute($value)
	{
	    $this->sei_ori_w = $value;
	}
	//折回数縦
	public function getSeiorihAttribute()
	{
	    return $this->sei_ori_h;
	}

	public function setSeiorihAttribute($value)
	{
	    $this->sei_ori_h = $value;
	}
	//帯
	public function getSeiobiAttribute()
	{
	    return $this->sei_obi;
	}

	public function setSeiobiAttribute($value)
	{
	    $this->sei_obi = $value;
	}
	//バラ
	public function getSeibaraAttribute()
	{
	    return $this->sei_bara;
	}

	public function setSeibaraAttribute($value)
	{
	    $this->sei_bara = $value;
	}
	//ワンセット
	public function getSeionesetAttribute()
	{
	    return $this->sei_oneset;
	}

	public function setSeionesetAttribute($value)
	{
	    $this->sei_oneset = $value;
	}
	//オバケ
	public function getSeiobakeAttribute()
	{
	    return $this->sei_obake;
	}

	public function setSeiobakeAttribute($value)
	{
	    $this->sei_obake = $value;
	}
	//落とし
	public function getSeiotoshiAttribute()
	{
	    return $this->sei_otoshi;
	}

	public function setSeiotoshiAttribute($value)
	{
	    $this->sei_otoshi = $value;
	}
	//落としヶ所
	public function getSeiotoshipartAttribute()
	{
	    return $this->sei_otoshi_part;
	}

	public function setSeiotoshipartAttribute($value)
	{
	    $this->sei_otoshi_part = $value;
	}
	//梱装
	public function getSeipackageAttribute()
	{
	    return $this->sei_package;
	}

	public function setSeipackageAttribute($value)
	{
	    $this->sei_package = $value;
	}
	//梱装個
	public function getSeipackagenumAttribute()
	{
	    return $this->sei_package_num;
	}

	public function setSeipackagenumAttribute($value)
	{
	    $this->sei_package_num = $value;
	}
	//箱
	public function getSeiboxAttribute()
	{
	    return $this->sei_box;
	}

	public function setSeiboxAttribute($value)
	{
	    $this->sei_box = $value;
	}
	//箱個
	public function getSeiboxnumAttribute()
	{
	    return $this->sei_box_num;
	}

	public function setSeiboxnumAttribute($value)
	{
	    $this->sei_box_num = $value;
	}
	//A式
	public function getSeiasystemAttribute()
	{
	    return $this->sei_a_system;
	}

	public function setSeiasystemAttribute($value)
	{
	    $this->sei_a_system = $value;
	}
	//C式
	public function getSeicsystemAttribute()
	{
	    return $this->sei_c_system;
	}

	public function setSeicsystemAttribute($value)
	{
	    $this->sei_c_system = $value;
	}
	//ビニール
	public function getSeivinylAttribute()
	{
	    return $this->sei_vinyl;
	}

	public function setSeivinylAttribute($value)
	{
	    $this->sei_vinyl = $value;
	}
	//外注先
	public function getSeialloutsouAttribute()
	{
	    return $this->sei_all_outsou;
	}

	public function setSeialloutsouAttribute($value)
	{
	    $this->sei_all_outsou = $value;
	}
	//外注費
	public function getSeialloutsoucostAttribute()
	{
	    return $this->sei_all_outsou_cost;
	}

	public function setSeialloutsoucostAttribute($value)
	{
	    $this->sei_all_outsou_cost = $value;
	}
	//製本部工賃小計
	public function getSeisubtotalAttribute()
	{
	    return $this->sei_subtotal;
	}

	public function setSeisubtotalAttribute($value)
	{
	    $this->sei_subtotal = $value;
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
