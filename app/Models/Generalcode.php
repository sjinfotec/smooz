<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalcode extends Model
{
    use HasFactory;
    //--------------- テーブル名 -----------------------------------
    protected $table = 'generalcodes';

    //--------------- メンバー属性 -----------------------------------
    private $id;                              // ID
    private $identification_id;                              // 識別
    private $code;                              // コード
    private $sort_seq;                              // 並び順
    private $identification_name;                              // 識別名
    private $description;                              // 説明
    private $code_name;                              // 項目名
    private $created_user;                              // 作成ユーザー
    private $updated_user;                              // 修正ユーザー
    private $created_at;                              // 作成日時
    private $updated_at;                              // 修正日時
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
    //識別
    public function getIdentificationidAttribute()
    {
        return $this->identification_id;
    }

    public function setIdentificationidAttribute($value)
    {
        $this->identification_id = $value;
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
    //並び順
    public function getSortseqAttribute()
    {
        return $this->sort_seq;
    }

    public function setSortseqAttribute($value)
    {
        $this->sort_seq = $value;
    }
    //識別名
    public function getIdentificationnameAttribute()
    {
        return $this->identification_name;
    }

    public function setIdentificationnameAttribute($value)
    {
        $this->identification_name = $value;
    }
    //説明
    public function getDescriptionAttribute()
    {
        return $this->description;
    }

    public function setDescriptionAttribute($value)
    {
        $this->description = $value;
    }
    //項目名
    public function getCodenameAttribute()
    {
        return $this->code_name;
    }

    public function setCodenameAttribute($value)
    {
        $this->code_name = $value;
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
    //作成日時
    public function getCreatedatAttribute()
    {
        return $this->created_at;
    }

    public function setCreatedatAttribute($value)
    {
        $this->created_at = $value;
    }
    //修正日時
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
    private $param_id;                              // ID
    private $param_identification_id;                              // 識別
    private $param_code;                              // コード
    private $param_sort_seq;                              // 並び順
    private $param_identification_name;                              // 識別名
    private $param_description;                              // 説明
    private $param_code_name;                              // 項目名
    private $param_created_user;                              // 作成ユーザー
    private $param_updated_user;                              // 修正ユーザー
    private $param_created_at;                              // 作成日時
    private $param_updated_at;                              // 修正日時
    private $param_is_deleted;                              // 削除フラグ
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
    //識別
    public function getParamIdentificationidAttribute()
    {
        return $this->param_identification_id;
    }

    public function setParamIdentificationidAttribute($value)
    {
        $this->param_identification_id = $value;
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
    //並び順
    public function getParamSortseqAttribute()
    {
        return $this->param_sort_seq;
    }

    public function setParamSortseqAttribute($value)
    {
        $this->param_sort_seq = $value;
    }
    //識別名
    public function getParamIdentificationnameAttribute()
    {
        return $this->param_identification_name;
    }

    public function setParamIdentificationnameAttribute($value)
    {
        $this->param_identification_name = $value;
    }
    //説明
    public function getParamDescriptionAttribute()
    {
        return $this->param_description;
    }

    public function setParamDescriptionAttribute($value)
    {
        $this->param_description = $value;
    }
    //項目名
    public function getParamCodenameAttribute()
    {
        return $this->param_code_name;
    }

    public function setParamCodenameAttribute($value)
    {
        $this->param_code_name = $value;
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
    //作成日時
    public function getParamCreatedatAttribute()
    {
        return $this->param_created_at;
    }

    public function setParamCreatedatAttribute($value)
    {
        $this->param_created_at = $value;
    }
    //修正日時
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

// ---------------------------- メソッド -----------------------------------------

	/**
	 * 取得
	 *
	 * @return 取得結果
	 */
	public function getItem(){
		try {
            $mainquery = DB::table($this->table)
                ->where('identification_id', $this->param_identification_id);
    
            if(!empty($this->param_code)){
                $mainquery->where($this->table.'.code', $this->param_code);
            }

            return $mainquery->where('is_deleted', 0)
                ->orderby('sort_seq','asc')
                ->get();
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
