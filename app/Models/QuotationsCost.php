<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuotationsCost extends Model
{
    use HasFactory;

    protected $table = 'quotations_cost';

    private $id;							// ID
    private $m_code;						// 見積番号
    private $send_city;						// 市内個
    private $send_in_dou;					// 道内個
    private $send_out_dou;					// 道外個
    private $send_out_dou_yen;				// 道外単価￥
    private $send_all;						// 一括配送￥
    private $send_subtotal;					// 配送費小計
    private $inside_hand_work;				// 手作業
    private $inside_insourcing_cost;		// 内製費
    private $outside_job1;					// 社外内職
    private $outside_job1_outsou;			// 外注先
    private $outside_job1_outsou_cost;		// 外注費
    private $outside_job2;					// 社外内職
    private $outside_job2_outsou;			// 外注先
    private $outside_job2_outsou_cost;		// 外注費
    private $outside_subtotal;				// 社外内職外注小計
    private $addition_cost1;				// 付加費用コメント1
    private $addition_cost1_buy;			// 購入費1
    private $addition_cost2;				// 付加費用コメント2
    private $addition_cost2_buy;			// 購入費2
    private $addition_cost3;				// 付加費用コメント3
    private $addition_cost3_buy;			// 購入費3
    private $addition_cost4;				// 付加費用コメント4
    private $addition_cost4_buy;			// 購入費4
    private $addition_cost5;				// 付加費用コメント5
    private $addition_cost5_buy;			// 購入費5
    private $addition_subtotal;				// 附加費用金額小計
    private $product_all_outsou1;			// 外注先1
    private $product_all_outsou1_cost;		// 外注費1
    private $product_all_outsou2;			// 外注先2
    private $product_all_outsou2_cost;		// 外注費2
    private $product_all_outsou3;			// 外注先3
    private $product_all_outsou3_cost;		// 外注費3
    private $product_all_subtotal;			// 全体の外注合計
    private $paper_amount;					// 用紙代総額
    private $wages_amount;					// 工賃他総額
    private $cost_amount;					// 実質原価総額
    private $estimate_amount;				// 見積予定金額
    private $comment;						// コメント
    private $offered_amount;				// 提示額
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
	//市内個
	public function getSendcityAttribute()
	{
		return $this->send_city;
	}

	public function setSendcityAttribute($value)
	{
		$this->send_city = $value;
	}
	//道内個
	public function getSendindouAttribute()
	{
		return $this->send_in_dou;
	}

	public function setSendindouAttribute($value)
	{
		$this->send_in_dou = $value;
	}
	//道外個
	public function getSendoutdouAttribute()
	{
		return $this->send_out_dou;
	}

	public function setSendoutdouAttribute($value)
	{
		$this->send_out_dou = $value;
	}
	//道外単価￥
	public function getSendoutdouyenAttribute()
	{
		return $this->send_out_dou_yen;
	}

	public function setSendoutdouyenAttribute($value)
	{
		$this->send_out_dou_yen = $value;
	}
	//一括配送￥
	public function getSendallAttribute()
	{
		return $this->send_all;
	}

	public function setSendallAttribute($value)
	{
		$this->send_all = $value;
	}
	//配送費小計
	public function getSendsubtotalAttribute()
	{
		return $this->send_subtotal;
	}

	public function setSendsubtotalAttribute($value)
	{
		$this->send_subtotal = $value;
	}
	//手作業
	public function getInsidehandworkAttribute()
	{
		return $this->inside_hand_work;
	}

	public function setInsidehandworkAttribute($value)
	{
		$this->inside_hand_work = $value;
	}
	//内製費
	public function getInsideinsourcingcostAttribute()
	{
		return $this->inside_insourcing_cost;
	}

	public function setInsideinsourcingcostAttribute($value)
	{
		$this->inside_insourcing_cost = $value;
	}
	//社外内職
	public function getOutsidejob1Attribute()
	{
		return $this->outside_job1;
	}

	public function setOutsidejob1Attribute($value)
	{
		$this->outside_job1 = $value;
	}
	//外注先
	public function getOutsidejob1OutsouAttribute()
	{
		return $this->outside_job1_outsou;
	}

	public function setOutsidejob1OutsouAttribute($value)
	{
		$this->outside_job1_outsou = $value;
	}
	//外注費
	public function getOutsidejob1OutsoucostAttribute()
	{
		return $this->outside_job1_outsou_cost;
	}

	public function setOutsidejob1OutsoucostAttribute($value)
	{
		$this->outside_job1_outsou_cost = $value;
	}
	//社外内職
	public function getOutsidejob2Attribute()
	{
		return $this->outside_job2;
	}

	public function setOutsidejob2Attribute($value)
	{
		$this->outside_job2 = $value;
	}
	//外注先
	public function getOutsidejob2OutsouAttribute()
	{
		return $this->outside_job2_outsou;
	}

	public function setOutsidejob2OutsouAttribute($value)
	{
		$this->outside_job2_outsou = $value;
	}
	//外注費
	public function getOutsidejob2OutsoucostAttribute()
	{
		return $this->outside_job2_outsou_cost;
	}

	public function setOutsidejob2OutsoucostAttribute($value)
	{
		$this->outside_job2_outsou_cost = $value;
	}
	//社外内職外注小計
	public function getOutsidesubtotalAttribute()
	{
		return $this->outside_subtotal;
	}

	public function setOutsidesubtotalAttribute($value)
	{
		$this->outside_subtotal = $value;
	}
	//付加費用コメント1
	public function getAdditioncost1Attribute()
	{
		return $this->addition_cost1;
	}

	public function setAdditioncost1Attribute($value)
	{
		$this->addition_cost1 = $value;
	}
	//購入費1
	public function getAdditioncost1BuyAttribute()
	{
		return $this->addition_cost1_buy;
	}

	public function setAdditioncost1BuyAttribute($value)
	{
		$this->addition_cost1_buy = $value;
	}
	//付加費用コメント2
	public function getAdditioncost2Attribute()
	{
		return $this->addition_cost2;
	}

	public function setAdditioncost2Attribute($value)
	{
		$this->addition_cost2 = $value;
	}
	//購入費2
	public function getAdditioncost2BuyAttribute()
	{
		return $this->addition_cost2_buy;
	}

	public function setAdditioncost2BuyAttribute($value)
	{
		$this->addition_cost2_buy = $value;
	}
	//付加費用コメント3
	public function getAdditioncost3Attribute()
	{
		return $this->addition_cost3;
	}

	public function setAdditioncost3Attribute($value)
	{
		$this->addition_cost3 = $value;
	}
	//購入費3
	public function getAdditioncost3BuyAttribute()
	{
		return $this->addition_cost3_buy;
	}

	public function setAdditioncost3BuyAttribute($value)
	{
		$this->addition_cost3_buy = $value;
	}
	//付加費用コメント4
	public function getAdditioncost4Attribute()
	{
		return $this->addition_cost4;
	}

	public function setAdditioncost4Attribute($value)
	{
		$this->addition_cost4 = $value;
	}
	//購入費4
	public function getAdditioncost4BuyAttribute()
	{
		return $this->addition_cost4_buy;
	}

	public function setAdditioncost4BuyAttribute($value)
	{
		$this->addition_cost4_buy = $value;
	}
	//付加費用コメント5
	public function getAdditioncost5Attribute()
	{
		return $this->addition_cost5;
	}

	public function setAdditioncost5Attribute($value)
	{
		$this->addition_cost5 = $value;
	}
	//購入費5
	public function getAdditioncost5BuyAttribute()
	{
		return $this->addition_cost5_buy;
	}

	public function setAdditioncost5BuyAttribute($value)
	{
		$this->addition_cost5_buy = $value;
	}
	//附加費用金額小計
	public function getAdditionsubtotalAttribute()
	{
		return $this->addition_subtotal;
	}

	public function setAdditionsubtotalAttribute($value)
	{
		$this->addition_subtotal = $value;
	}
	//外注先1
	public function getProductalloutsou1Attribute()
	{
		return $this->product_all_outsou1;
	}

	public function setProductalloutsou1Attribute($value)
	{
		$this->product_all_outsou1 = $value;
	}
	//外注費1
	public function getProductalloutsou1CostAttribute()
	{
		return $this->product_all_outsou1_cost;
	}

	public function setProductalloutsou1CostAttribute($value)
	{
		$this->product_all_outsou1_cost = $value;
	}
	//外注先2
	public function getProductalloutsou2Attribute()
	{
		return $this->product_all_outsou2;
	}

	public function setProductalloutsou2Attribute($value)
	{
		$this->product_all_outsou2 = $value;
	}
	//外注費2
	public function getProductalloutsou2CostAttribute()
	{
		return $this->product_all_outsou2_cost;
	}

	public function setProductalloutsou2CostAttribute($value)
	{
		$this->product_all_outsou2_cost = $value;
	}
	//外注先3
	public function getProductalloutsou3Attribute()
	{
		return $this->product_all_outsou3;
	}

	public function setProductalloutsou3Attribute($value)
	{
		$this->product_all_outsou3 = $value;
	}
	//外注費3
	public function getProductalloutsou3CostAttribute()
	{
		return $this->product_all_outsou3_cost;
	}

	public function setProductalloutsou3CostAttribute($value)
	{
		$this->product_all_outsou3_cost = $value;
	}
	//全体の外注合計
	public function getProductallsubtotalAttribute()
	{
		return $this->product_all_subtotal;
	}

	public function setProductallsubtotalAttribute($value)
	{
		$this->product_all_subtotal = $value;
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
