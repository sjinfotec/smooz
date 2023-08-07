<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class PaperCost extends Model
{
    use HasFactory;

    //--------------- テーブル名 -----------------------------------
    protected $table = 'papercosts';

    //--------------- メンバー属性 -----------------------------------
    private $id;                              // 
    private $code;                              // コード
    private $code_category;                              // 区分 １：巻 ２：平
    private $code_paper_type;                              // 用紙種類……　プリント順
    private $code_group_seq;                              // 群内連番
    private $code_standard;                              // 規格 平の場合は ０：四六，１：Ｂ２，２：Ａ判，３：菊判，４：ハトロン
    private $code_color;                              // 色 平の場合のみ 　コード選択オート分野は上桁が常に【０】
    private $name;                              // 用紙名
    private $standard;                              // 規格（インチなど）　……　8.5,17.5,A判,菊判　……
    private $color;                              // 色　……　Ｗ・Ｐ・Ｌ・Ｙ
    private $mater_unit_price;                              // メーター単価
    private $pack_internal_number;                              // 包内数（巻の場合ｍ数
    private $unit_price_1;                              // 1枚単価 平の場合のみ
    private $unit_price_24;                              // 24枚まで単価 平の場合のみ
    private $unit_price_49;                              // 49枚まで単価 平の場合のみ
    private $unit_price_99;                              // 99枚まで単価 平の場合のみ
    private $unit_price_124;                              // 124枚まで単価 平の場合のみ
    private $unit_price_249;                              // 249枚まで単価 平の場合のみ
    private $unit_price_499;                              // 499枚まで単価 平の場合のみ
    private $created_user;                              // 作成ユーザー
    private $updated_user;                              // 修正ユーザー
    private $created_at;                              // 
    private $updated_at;                              // 
    private $is_deleted;                              // 削除フラグ

    //--------------- メンバーアクセサ -----------------------------------
    //ID
    public function getIdAttribute()
    {
        return $this->id;
    }

    public function setIdAttribute($value)
    {
        $this->id = $value;
    }
    //コード
    public function getCodeAttribute()
    {
        return $this->code;
    }

    public function setCodeAttribute($value)
    {
        $this->code = $value;
    }
    //区分 １：巻 ２：平
    public function getCodecategoryAttribute()
    {
        return $this->code_category;
    }

    public function setCodecategoryAttribute($value)
    {
        $this->code_category = $value;
    }
    //用紙種類……　プリント順
    public function getCodepapertypeAttribute()
    {
        return $this->code_paper_type;
    }

    public function setCodepapertypeAttribute($value)
    {
        $this->code_paper_type = $value;
    }
    //群内連番
    public function getCodegroupseqAttribute()
    {
        return $this->code_group_seq;
    }

    public function setCodegroupseqAttribute($value)
    {
        $this->code_group_seq = $value;
    }
    //規格 平の場合は ０：四六，１：Ｂ２，２：Ａ判，３：菊判，４：ハトロン
    public function getCodestandardAttribute()
    {
        return $this->code_standard;
    }

    public function setCodestandardAttribute($value)
    {
        $this->code_standard = $value;
    }
    //色 平の場合のみ 　コード選択オート分野は上桁が常に【０】
    public function getCodecolorAttribute()
    {
        return $this->code_color;
    }

    public function setCodecolorAttribute($value)
    {
        $this->code_color = $value;
    }
    //用紙名
    public function getNameAttribute()
    {
        return $this->name;
    }

    public function setNameAttribute($value)
    {
        $this->name = $value;
    }
    //規格（インチなど）　……　8.5,17.5,A判,菊判　……
    public function getStandardAttribute()
    {
        return $this->standard;
    }

    public function setStandardAttribute($value)
    {
        $this->standard = $value;
    }
    //色　……　Ｗ・Ｐ・Ｌ・Ｙ
    public function getColorAttribute()
    {
        return $this->color;
    }

    public function setColorAttribute($value)
    {
        $this->color = $value;
    }
    //メーター単価
    public function getMaterunitpriceAttribute()
    {
        return $this->mater_unit_price;
    }

    public function setMaterunitpriceAttribute($value)
    {
        $this->mater_unit_price = $value;
    }
    //包内数（巻の場合ｍ数
    public function getPackinternalnumberAttribute()
    {
        return $this->pack_internal_number;
    }

    public function setPackinternalnumberAttribute($value)
    {
        $this->pack_internal_number = $value;
    }
    //1枚単価 平の場合のみ
    public function getUnitprice1Attribute()
    {
        return $this->unit_price_1;
    }

    public function setUnitprice1Attribute($value)
    {
        $this->unit_price_1 = $value;
    }
    //24枚まで単価 平の場合のみ
    public function getUnitprice24Attribute()
    {
        return $this->unit_price_24;
    }

    public function setUnitprice24Attribute($value)
    {
        $this->unit_price_24 = $value;
    }
    //49枚まで単価 平の場合のみ
    public function getUnitprice49Attribute()
    {
        return $this->unit_price_49;
    }

    public function setUnitprice49Attribute($value)
    {
        $this->unit_price_49 = $value;
    }
    //99枚まで単価 平の場合のみ
    public function getUnitprice99Attribute()
    {
        return $this->unit_price_99;
    }

    public function setUnitprice99Attribute($value)
    {
        $this->unit_price_99 = $value;
    }
    //124枚まで単価 平の場合のみ
    public function getUnitprice124Attribute()
    {
        return $this->unit_price_124;
    }

    public function setUnitprice124Attribute($value)
    {
        $this->unit_price_124 = $value;
    }
    //249枚まで単価 平の場合のみ
    public function getUnitprice249Attribute()
    {
        return $this->unit_price_249;
    }

    public function setUnitprice249Attribute($value)
    {
        $this->unit_price_249 = $value;
    }
    //499枚まで単価 平の場合のみ
    public function getUnitprice499Attribute()
    {
        return $this->unit_price_499;
    }

    public function setUnitprice499Attribute($value)
    {
        $this->unit_price_499 = $value;
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
    //
    public function getCreatedatAttribute()
    {
        return $this->created_at;
    }

    public function setCreatedatAttribute($value)
    {
        $this->created_at = $value;
    }
    //
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
    private $param_id;                              // コード
    private $param_code;                              // 区分 １：巻 ２：平
    private $param_code_category;                              // 用紙種類……　プリント順
    private $param_code_paper_type;                              // 群内連番
    private $param_code_group_seq;                              // 規格 平の場合は ０：四六，１：Ｂ２，２：Ａ判，３：菊判，４：ハトロン
    private $param_code_standard;                              // 色 平の場合のみ 　コード選択オート分野は上桁が常に【０】
    private $param_code_color;                              // 修正ユーザー

    //--------------- パラメータアクセサ -----------------------------------
    //ID
    public function getParamIdAttribute()
    {
        return $this->param_id;
    }

    public function setParamIdAttribute($value)
    {
        $this->param_id = $value;
    }
    //コード
    public function getParamCodeAttribute()
    {
        return $this->param_code;
    }

    public function setParamCodeAttribute($value)
    {
        $this->param_code = $value;
    }
    //区分 １：巻 ２：平
    public function getParamCodecategoryAttribute()
    {
        return $this->param_code_category;
    }

    public function setParamCodecategoryAttribute($value)
    {
        $this->param_code_category = $value;
    }
    //用紙種類……　プリント順
    public function getParamCodepapertypeAttribute()
    {
        return $this->param_code_paper_type;
    }

    public function setParamCodepapertypeAttribute($value)
    {
        $this->param_code_paper_type = $value;
    }
    //群内連番
    public function getParamCodegroupseqAttribute()
    {
        return $this->param_code_group_seq;
    }

    public function setParamCodegroupseqAttribute($value)
    {
        $this->param_code_group_seq = $value;
    }
    //規格 平の場合は ０：四六，１：Ｂ２，２：Ａ判，３：菊判，４：ハトロン
    public function getParamCodestandardAttribute()
    {
        return $this->param_code_standard;
    }

    public function setParamCodestandardAttribute($value)
    {
        $this->param_code_standard = $value;
    }
    //色 平の場合のみ 　コード選択オート分野は上桁が常に【０】
    public function getParamCodecolorAttribute()
    {
        return $this->param_code_color;
    }

    public function setParamCodecolorAttribute($value)
    {
        $this->param_code_color = $value;
    }

}
