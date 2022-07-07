<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuotationsDoc extends Model
{
    use HasFactory;

    protected $table = 'quotations_doc';

	private $id;								// ID
	private $wm_code;							// 見積書番号
	private $o_wm_code;							// 旧見積書番号
	private $user_code;							// オペレーター
	private $create_date;						// 作成日
	private $customer_code;						// 得意先コード
	private $customer;							// 得意先名
	private $issue_date;						// 発行日付
	private $deadline;							// 納期
	private $expiration;						// 見積有効期限
	private $terms_payment;						// 支払い条件
	private $delivery_site;						// 納入場所
	private $format_mode;						// 形式モード
	private $q_amount;							// 見積製作金額
	private $tax;								// 消費税
	private $comment_1;							// コメント1
	private $comment_2;							// コメント2
	private $comment_3;							// コメント3
	private $comment_4;							// コメント4
	private $discount_amount;					// 値引き額
	private $discount_comment;					// 値引きコメント
	private $created_user;						// 作成ユーザー
	private $updated_user;						// 修正ユーザー
	private $created_at;						// 作成時間
	private $updated_at;						// 修正時間
	private $is_deleted;						// 削除フラグ


	//ID
	public function getIdAttribute()
	{
		return $this->id;
	}

	public function setIdAttribute($value)
	{
		$this->id = $value;
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
	//旧見積書番号
	public function getOwmcodeAttribute()
	{
		return $this->o_wm_code;
	}

	public function setOwmcodeAttribute($value)
	{
		$this->o_wm_code = $value;
	}
	//オペレーター
	public function getUsercodeAttribute()
	{
		return $this->user_code;
	}

	public function setUsercodeAttribute($value)
	{
		$this->user_code = $value;
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
	//得意先コード
	public function getCustomercodeAttribute()
	{
		return $this->customer_code;
	}

	public function setCustomercodeAttribute($value)
	{
		$this->customer_code = $value;
	}
	//得意先名
	public function getCustomerAttribute()
	{
		return $this->customer;
	}

	public function setCustomerAttribute($value)
	{
		$this->customer = $value;
	}
	//発行日付
	public function getIssuedateAttribute()
	{
		return $this->issue_date;
	}

	public function setIssuedateAttribute($value)
	{
		$this->issue_date = $value;
	}
	//納期
	public function getDeadlineAttribute()
	{
		return $this->deadline;
	}

	public function setDeadlineAttribute($value)
	{
		$this->deadline = $value;
	}
	//見積有効期限
	public function getExpirationAttribute()
	{
		return $this->expiration;
	}

	public function setExpirationAttribute($value)
	{
		$this->expiration = $value;
	}
	//支払い条件
	public function getTermspaymentAttribute()
	{
		return $this->terms_payment;
	}

	public function setTermspaymentAttribute($value)
	{
		$this->terms_payment = $value;
	}
	//納入場所
	public function getDeliverysiteAttribute()
	{
		return $this->delivery_site;
	}

	public function setDeliverysiteAttribute($value)
	{
		$this->delivery_site = $value;
	}
	//形式モード
	public function getFormatmodeAttribute()
	{
		return $this->format_mode;
	}

	public function setFormatmodeAttribute($value)
	{
		$this->format_mode = $value;
	}
	//見積製作金額
	public function getQamountAttribute()
	{
		return $this->q_amount;
	}

	public function setQamountAttribute($value)
	{
		$this->q_amount = $value;
	}
	//消費税
	public function getTaxAttribute()
	{
		return $this->tax;
	}

	public function setTaxAttribute($value)
	{
		$this->tax = $value;
	}
	//コメント1
	public function getComment1Attribute()
	{
		return $this->comment_1;
	}

	public function setComment1Attribute($value)
	{
		$this->comment_1 = $value;
	}
	//コメント2
	public function getComment2Attribute()
	{
		return $this->comment_2;
	}

	public function setComment2Attribute($value)
	{
		$this->comment_2 = $value;
	}
	//コメント3
	public function getComment3Attribute()
	{
		return $this->comment_3;
	}

	public function setComment3Attribute($value)
	{
		$this->comment_3 = $value;
	}
	//コメント4
	public function getComment4Attribute()
	{
		return $this->comment_4;
	}

	public function setComment4Attribute($value)
	{
		$this->comment_4 = $value;
	}
	//値引き額
	public function getDiscountamountAttribute()
	{
		return $this->discount_amount;
	}

	public function setDiscountamountAttribute($value)
	{
		$this->discount_amount = $value;
	}
	//値引きコメント
	public function getDiscountcommentAttribute()
	{
		return $this->discount_comment;
	}

	public function setDiscountcommentAttribute($value)
	{
		$this->discount_comment = $value;
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
