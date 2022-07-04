<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotations extends Model
{
    use HasFactory;

    protected $table = 'quotations';

    private $id;                        // ID
    private $user_code;                 // オペレータＩＤ
    private $m_code;                    // 見積番号
    private $reference_num;             // 参照番号
    private $create_date;               // 作成日
    private $lastorder_date;            // 最終受注日
    private $number_order;              // 受注回数
    private $manager_code;              // 担当者コード
    private $manager;                   // 担当者
    private $customer_code;             // 得意先コード
    private $customer;                  // 得意先
    private $printing;                  // 印刷無しマーク
    private $enduser;                   // エンドユーザー
    private $product;                   // 製品名
    private $production_setnum;         // 制作組数（束ね内数）
    private $production_setnum_unit;    // 組/帯の区分
    private $production_volnum;         // 制作冊数
    private $production_volnum_unit;    // 制作形態
    private $production_all;            // 総数量（組×冊）
    private $unit;                      // 単位区分（インチ/ミリ）
    private $papertray;                 // 紙取
    private $imposition_w;              // 面付け横
    private $imposition_h;              // 面付け縦
    private $cylinder;                  // シリンダー種
    private $cylinder_num;              // シリンダー本
    private $cylinder_set;              // シリンダーセット代金
    private $size_w;                    // サイズ横
    private $size_h;                    // サイズ縦
    private $size_top;                  // サイズ分子
    private $size_bottom;               // サイズ分母
    private $inch_fold;                 // インチ折
    private $parts_num;                 // パーツ数
    private $all_through;               // 総通し数
    private $paper_amount;              // 用紙代総額
    private $wages_amount;              // 工賃他総額
    private $cost_amount;               // 実質原価総額
    private $estimate_amount;           // 見積予定金額
    private $comment;                   // コメント
    private $offered_amount;            // 提示額
    private $created_user;              // 作成ユーザー
    private $updated_user;              // 修正ユーザー
    private $created_at;                // 作成時間
    private $updated_at;                // 修正時間
    private $is_deleted;                // 削除フラグ


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
