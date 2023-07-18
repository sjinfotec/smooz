<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class BackupAttribute extends Model
{
    use HasFactory;
    //--------------- テーブル名 -----------------------------------
    protected $table = 'backup_attribute';
    protected $table_generalcodes = 'generalcodes';

    //--------------- メンバー属性 -----------------------------------
    private $id;                              // ID
    private $identification_id;                              // 識別
    private $identification_code;                              // 識別コード
    private $work_table;                              // 作業テーブル
    private $target_table;                              // 対象テーブル
    private $status;                              // ステータス
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
    //識別コード
    public function getIdentificationcodeAttribute()
    {
        return $this->identification_code;
    }

    public function setIdentificationcodeAttribute($value)
    {
        $this->identification_code = $value;
    }
    //作業テーブル
    public function getWorktableAttribute()
    {
        return $this->work_table;
    }

    public function setWorktableAttribute($value)
    {
        $this->work_table = $value;
    }
    //対象テーブル
    public function getTargettableAttribute()
    {
        return $this->target_table;
    }

    public function setTargettableAttribute($value)
    {
        $this->target_table = $value;
    }
    //ステータス
    public function getStatusAttribute()
    {
        return $this->status;
    }

    public function setStatusAttribute($value)
    {
        $this->status = $value;
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
    private $param_identification_code;                              // 識別コード
    private $param_work_table;                              // 作業テーブル
    private $param_target_table;                              // 対象テーブル
    private $param_status;                              // ステータス
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
    //識別コード
    public function getParamIdentificationcodeAttribute()
    {
        return $this->param_identification_code;
    }

    public function setParamIdentificationcodeAttribute($value)
    {
        $this->param_identification_code = $value;
    }
    //作業テーブル
    public function getParamWorktableAttribute()
    {
        return $this->param_work_table;
    }

    public function setParamWorktableAttribute($value)
    {
        $this->param_work_table = $value;
    }
    //対象テーブル
    public function getParamTargettableAttribute()
    {
        return $this->param_target_table;
    }

    public function setParamTargettableAttribute($value)
    {
        $this->param_target_table = $value;
    }
    //ステータス
    public function getParamStatusAttribute()
    {
        return $this->param_status;
    }

    public function setParamStatusAttribute($value)
    {
        $this->param_status = $value;
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
    public function getItem(){
        try {
            $query = DB::table($this->table.' AS t1')
            ->select(
                't1.identification_id as identification_id',
                't1.identification_code as identification_code',
                't1.work_table as work_table',
                't1.target_table as target_table',
                't1.status as status',
                't1.created_user as created_user',
                't1.updated_user as updated_user',
                't1.created_at as created_at',
                't1.updated_at as updated_at',
                't1.is_deleted as is_deleted',
                't2.identification_name as identification_name',
                't2.description as description',
                't2.code_name as code_name'
            );
            $query->leftJoin($this->table_generalcodes.' as t2', function ($join) { 
                $join->on('t2.identification_id', '=', 't1.identification_id')
                ->where('t2.code', '=', 't1.identification_code')
                ->where('t1.is_deleted', '=', 0)
                ->where('t2.is_deleted', '=', 0);
            });
            if ($this->param_identification_id != null && $this->param_identification_id != "") {
                $query->where('t1.identification_id', $this->param_identification_id);
            }
            if ($this->param_identification_code != null && $this->param_identification_code != "") {
                $query->where('t1.identification_code', $this->param_identification_code);
            }
            if ($this->param_status != null && $this->param_status != "") {
                // not =
                $query->where('t1.status', '!=', $this->param_status);
            }
            $data  = $query->where('t1.is_deleted',0)
                    ->get();
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
     * 存在チェック
     *
     * @return void
     */
    public function chkExist(){
        try {
            $query = DB::table($this->table.' AS t1');
            if ($this->param_identification_id != null && $this->param_identification_id != "") {
                $query->where('t1.identification_id', $this->param_identification_id);
            }
            if ($this->param_identification_code != null && $this->param_identification_code != "") {
                $query->where('t1.identification_code', $this->param_identification_code);
            }
            $data  = $query->where('t1.is_deleted',0)
                    ->exists();
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
     * 登録
     *
     * @return void
     */
    public function store(){
        try {
            $query = DB::table($this->table)
            ->insert([
                'identification_id' => $this->identification_id,
                'identification_code' => $this->identification_code,
                'work_table' => $this->work_table,
                'target_table' => $this->target_table,
                'status' => $this->status,
                'created_user' => $this->created_user,
                'created_at' => $this->created_at,
                'is_deleted' => $this->is_deleted
            ]);
            return true;
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
     * 更新
     *
     * @return void
     */
    public function updData(){
        try {
            $query = DB::table($this->table.' AS t1');
            if ($this->param_identification_id != null && $this->param_identification_id != "") {
                $query->where('t1.identification_id', $this->param_identification_id);
            }
            if ($this->param_identification_code != null && $this->param_identification_code != "") {
                $query->where('t1.identification_code', $this->param_identification_code);
            }
            $data  = $query->where('t1.is_deleted',0)
            ->update([
                't1.work_table' => $this->work_table,
                't1.target_table' => $this->target_table,
                't1.status' => $this->status,
                't1.updated_user' => $this->updated_user,
                't1.updated_at' => $this->updated_at,
                't1.is_deleted' => $this->is_deleted
            ]);
            return true;
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
