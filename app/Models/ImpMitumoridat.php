<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ImpMitumoridat extends Model
{
//--------------- テーブル名 -----------------------------------
    protected $table = 'imp_mitumori_dat';

    //--------------- メンバー属性 -----------------------------------
    private $id;                                    // ID
    private $row_no;                                // mitumori.datの行no
    private $imp_data;                              // mitumori.datの行data
    private $created_user;                          // 作成ユーザー
    private $updated_user;                          // 修正ユーザー
    private $created_at;                            // 作成日時
    private $updated_at;                            // 修正日時
    private $is_deleted;                            // 削除フラグ

    //ID
    public function getIdAttribute()
    {
        return $this->id;
    }

    public function setIdAttribute($value)
    {
        $this->id = $value;
    }
    //mitumori.datの行no
    public function getRownoAttribute()
    {
        return $this->row_no;
    }

    public function setRownoAttribute($value)
    {
        $this->row_no = $value;
    }
    //mitumori.datの行data
    public function getImpdataAttribute()
    {
        return $this->imp_data;
    }

    public function setImpdataAttribute($value)
    {
        $this->imp_data = $value;
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
    private $param_row_no;                              // mitumori.datの行no
    private $param_imp_data;                              // mitumori.datの行data
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
    //mitumori.datの行no
    public function getParamRownoAttribute()
    {
        return $this->param_row_no;
    }

    public function setParamRownoAttribute($value)
    {
        $this->param_row_no = $value;
    }
    //mitumori.datの行data
    public function getParamImpdataAttribute()
    {
        return $this->param_imp_data;
    }

    public function setParamImpdataAttribute($value)
    {
        $this->param_imp_data = $value;
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

    //---------------------------- メソッド ------------------------------------------

    /**
     * 情報取得
     *
     * @return void
     */
    public function getItem($limit_reccnt, $get_reccnt){
        try {
            $sqlString = "";
            $sqlString .= "select ";
            $sqlString .= "  t1.id as id ";
            $sqlString .= "  , t1.row_no as row_no ";
            $sqlString .= "  , t1.imp_data as imp_data ";
            $sqlString .= "from ".$this->table." t1";
            $sqlString .= "  where ";
            $sqlString .= "    ? = ? ";
            $sqlString .= "    and t1.is_deleted = ? ";
            $sqlString .= "order by ";
            $sqlString .= "  row_no asc ";
            if ($limit_reccnt > 0 && $get_reccnt > 0) {
                $sqlString .= "LIMIT ? , ?";
            }
            $array_setBindingsStr = array();
            $array_setBindingsStr[] = 1;
            $array_setBindingsStr[] = 1;
            $array_setBindingsStr[] = 0;
            if ($limit_reccnt > 0 && $get_reccnt > 0) {
                $array_setBindingsStr[] = $limit_reccnt;
                $array_setBindingsStr[] = $get_reccnt;
            }
            $data = DB::select($sqlString, $array_setBindingsStr);

            // $query->select(
            //     'row_no',
            //     'imp_data',
            //     'created_user',
            //     'updated_user',
            //     'created_at',
            //     'updated_at',
            //     'is_deleted'
            // );
            // if ($this->param_row_no != null && $this->param_row_no != "") {
            //     $query->where('row_no', $this->param_row_no);
            // }
            // $data  = $query->where('is_deleted',0)
            //         ->orderBy('row_no', 'asc')
            //         ->get();
            // $data  = $query->get();
            return $data;
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
     * 情報登録
     *
     * @return void
     */
    public function store(){
        try {
            $query = DB::table($this->table)
            ->insert([
                'row_no' => $this->row_no,
                'imp_data' => $this->imp_data,
                'created_user' => $this->created_user,
                'created_at' => $this->created_at,
                'is_deleted' => $this->is_deleted
            ]);
            return true;
        }catch(\PDOException $pe){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_insert_error')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_insert_error')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }
        
    /**
     * 物理削除
     *
     * @return void
     */
    public function delete(){
        try {
            $query = DB::table($this->table);
            if ($this->param_id != null && $this->param_id != "") {
                $query->where('id', $this->param_id);
            }
            if ($this->param_row_no != null && $this->param_row_no != "") {
                $query->where('row_no', $this->param_row_no);
            }
            $query->delete();
            return true;
        }catch(\PDOException $pe){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_insert_error')).'$pe');
            Log::error($pe->getMessage());
            throw $pe;
        }catch(\Exception $e){
            Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.data_insert_error')).'$e');
            Log::error($e->getMessage());
            throw $e;
        }
    }

}
