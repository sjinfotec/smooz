<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    //--------------- テーブル名 -----------------------------------
    protected $table = 'customer';

    //--------------- メンバー属性 -----------------------------------
    private $id;                              // 
    private $code;                              // 得意先コード
    private $classify;                              // 区分
    private $name;                              // 得意先名／外注先名
    private $post;                              // 郵便番号
    private $address1;                              // 住所1
    private $address2;                              // 住所2
    private $tel;                              // TEL
    private $fax;                              // FAX
    private $charge;                              // 担当
    private $cutoff;                              // 締め日
    private $collection;                              // 回収日
    private $tax_class;                              // 税区分
    private $tax_fraction;                              // 税端数処理
    private $industry;                              // 業種
    private $created_user;                              // 作成ユーザー
    private $updated_user;                              // 修正ユーザー
    private $created_at;                              // 作成時間
    private $updated_at;                              // 修正時間
    private $is_deleted;                              // 削除フラグ

    //--------------- メンバーアクセサ -----------------------------------
    //
    public function getIdAttribute()
    {
        return $this->id;
    }

    public function setIdAttribute($value)
    {
        $this->id = $value;
    }
    //得意先コード
    public function getCodeAttribute()
    {
        return $this->code;
    }

    public function setCodeAttribute($value)
    {
        $this->code = $value;
    }
    //区分
    public function getClassifyAttribute()
    {
        return $this->classify;
    }

    public function setClassifyAttribute($value)
    {
        $this->classify = $value;
    }
    //得意先名／外注先名
    public function getNameAttribute()
    {
        return $this->name;
    }

    public function setNameAttribute($value)
    {
        $this->name = $value;
    }
    //郵便番号
    public function getPostAttribute()
    {
        return $this->post;
    }

    public function setPostAttribute($value)
    {
        $this->post = $value;
    }
    //住所1
    public function getAddress1Attribute()
    {
        return $this->address1;
    }

    public function setAddress1Attribute($value)
    {
        $this->address1 = $value;
    }
    //住所2
    public function getAddress2Attribute()
    {
        return $this->address2;
    }

    public function setAddress2Attribute($value)
    {
        $this->address2 = $value;
    }
    //TEL
    public function getTelAttribute()
    {
        return $this->tel;
    }

    public function setTelAttribute($value)
    {
        $this->tel = $value;
    }
    //FAX
    public function getFaxAttribute()
    {
        return $this->fax;
    }

    public function setFaxAttribute($value)
    {
        $this->fax = $value;
    }
    //担当
    public function getChargeAttribute()
    {
        return $this->charge;
    }

    public function setChargeAttribute($value)
    {
        $this->charge = $value;
    }
    //締め日
    public function getCutoffAttribute()
    {
        return $this->cutoff;
    }

    public function setCutoffAttribute($value)
    {
        $this->cutoff = $value;
    }
    //回収日
    public function getCollectionAttribute()
    {
        return $this->collection;
    }

    public function setCollectionAttribute($value)
    {
        $this->collection = $value;
    }
    //税区分
    public function getTaxclassAttribute()
    {
        return $this->tax_class;
    }

    public function setTaxclassAttribute($value)
    {
        $this->tax_class = $value;
    }
    //税端数処理
    public function getTaxfractionAttribute()
    {
        return $this->tax_fraction;
    }

    public function setTaxfractionAttribute($value)
    {
        $this->tax_fraction = $value;
    }
    //業種
    public function getIndustryAttribute()
    {
        return $this->industry;
    }

    public function setIndustryAttribute($value)
    {
        $this->industry = $value;
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

    //--------------- パラメータ項目属性 -----------------------------------
    private $param_id;                              // 
    private $param_code;                              // 得意先コード
    private $param_classify;                              // 区分
    private $param_name;                              // 得意先名／外注先名
    private $param_post;                              // 郵便番号
    private $param_address1;                              // 住所1
    private $param_address2;                              // 住所2
    private $param_tel;                              // TEL
    private $param_fax;                              // FAX
    private $param_charge;                              // 担当
    private $param_cutoff;                              // 締め日
    private $param_collection;                              // 回収日
    private $param_tax_class;                              // 税区分
    private $param_tax_fraction;                              // 税端数処理
    private $param_industry;                              // 業種
    private $param_created_user;                              // 作成ユーザー
    private $param_updated_user;                              // 修正ユーザー
    private $param_created_at;                              // 作成時間
    private $param_updated_at;                              // 修正時間
    private $param_is_deleted;                              // 削除フラグ
    //--------------- パラメータアクセサ -----------------------------------
    //
    public function getParamIdAttribute()
    {
        return $this->param_id;
    }

    public function setParamIdAttribute($value)
    {
        $this->param_id = $value;
    }
    //得意先コード
    public function getParamCodeAttribute()
    {
        return $this->param_code;
    }

    public function setParamCodeAttribute($value)
    {
        $this->param_code = $value;
    }
    //区分
    public function getParamClassifyAttribute()
    {
        return $this->param_classify;
    }

    public function setParamClassifyAttribute($value)
    {
        $this->param_classify = $value;
    }
    //得意先名／外注先名
    public function getParamNameAttribute()
    {
        return $this->param_name;
    }

    public function setParamNameAttribute($value)
    {
        $this->param_name = $value;
    }
    //郵便番号
    public function getParamPostAttribute()
    {
        return $this->param_post;
    }

    public function setParamPostAttribute($value)
    {
        $this->param_post = $value;
    }
    //住所1
    public function getParamAddress1Attribute()
    {
        return $this->param_address1;
    }

    public function setParamAddress1Attribute($value)
    {
        $this->param_address1 = $value;
    }
    //住所2
    public function getParamAddress2Attribute()
    {
        return $this->param_address2;
    }

    public function setParamAddress2Attribute($value)
    {
        $this->param_address2 = $value;
    }
    //TEL
    public function getParamTelAttribute()
    {
        return $this->param_tel;
    }

    public function setParamTelAttribute($value)
    {
        $this->param_tel = $value;
    }
    //FAX
    public function getParamFaxAttribute()
    {
        return $this->param_fax;
    }

    public function setParamFaxAttribute($value)
    {
        $this->param_fax = $value;
    }
    //担当
    public function getParamChargeAttribute()
    {
        return $this->param_charge;
    }

    public function setParamChargeAttribute($value)
    {
        $this->param_charge = $value;
    }
    //締め日
    public function getParamCutoffAttribute()
    {
        return $this->param_cutoff;
    }

    public function setParamCutoffAttribute($value)
    {
        $this->param_cutoff = $value;
    }
    //回収日
    public function getParamCollectionAttribute()
    {
        return $this->param_collection;
    }

    public function setParamCollectionAttribute($value)
    {
        $this->param_collection = $value;
    }
    //税区分
    public function getParamTaxclassAttribute()
    {
        return $this->param_tax_class;
    }

    public function setParamTaxclassAttribute($value)
    {
        $this->param_tax_class = $value;
    }
    //税端数処理
    public function getParamTaxfractionAttribute()
    {
        return $this->param_tax_fraction;
    }

    public function setParamTaxfractionAttribute($value)
    {
        $this->param_tax_fraction = $value;
    }
    //業種
    public function getParamIndustryAttribute()
    {
        return $this->param_industry;
    }

    public function setParamIndustryAttribute($value)
    {
        $this->param_industry = $value;
    }
    //作成ユーザー
    public function getParamCreateduserAttribute()
    {
        return $this->param_created_user;
    }

    public function setParamCreateduserAttribute($value)
    {
        $this->param_created_user = $value;
    }
    //修正ユーザー
    public function getParamUpdateduserAttribute()
    {
        return $this->param_updated_user;
    }

    public function setParamUpdateduserAttribute($value)
    {
        $this->param_updated_user = $value;
    }
    //作成時間
    public function getParamCreatedatAttribute()
    {
        return $this->param_created_at;
    }

    public function setParamCreatedatAttribute($value)
    {
        $this->param_created_at = $value;
    }
    //修正時間
    public function getParamUpdatedatAttribute()
    {
        return $this->param_updated_at;
    }

    public function setParamUpdatedatAttribute($value)
    {
        $this->param_updated_at = $value;
    }
    //削除フラグ
    public function getParamIsdeletedAttribute()
    {
        return $this->param_is_deleted;
    }

    public function setParamIsdeletedAttribute($value)
    {
        $this->param_is_deleted = $value;
    }

}
