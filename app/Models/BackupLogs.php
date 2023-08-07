<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class BackupLogs extends Model
{
	use HasFactory;

	protected $table = 'backup_logs';

	private $id;					// ID
	private $seq;                              // log連番
	private $work_table;			// 作業テーブル
	private $target_table;			// 対象テーブル
	private $kind;					// 種類
	private $status;				// ステータス 0失敗 1成功
	private $start_date;					// 開始年月日
	private $start_time;			// 開始時間
	private $end_date;					// 終了年月日
	private $end_time;				// 終了時間
	private $time_required;			// 所要時間
	private $created_user;			// 作成ユーザー
	private $updated_user;			// 修正ユーザー
	private $created_at;			// 作成時間
	private $updated_at;			// 修正時間
	private $is_deleted;			// 削除フラグ

	//ID
	public function getIdAttribute()
	{
		return $this->id;
	}
	public function setIdAttribute($value)
	{
		$this->id = $value;
	}
	//log連番
	public function getSeqAttribute()
	{
		return $this->seq;
	}
	public function setSeqAttribute($value)
	{
		$this->seq = $value;
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
	//種類
	public function getKindAttribute()
	{
		return $this->kind;
	}
	public function setKindAttribute($value)
	{
		$this->kind = $value;
	}
	//ステータス 0失敗 1成功
	public function getStatusAttribute()
	{
		return $this->status;
	}
	public function setStatusAttribute($value)
	{
		$this->status = $value;
	}
	//開始年月日
	public function getStartDateAttribute()
	{
		return $this->start_date;
	}
	public function setStartDateAttribute($value)
	{
		if (isset($value)) {
			$this->start_date = $value->format('Ymd');
		} else {
			$this->start_date = $value;
		}
	}
	//開始時間
	public function getStarttimeAttribute()
	{
		return $this->start_time;
	}
	public function setStarttimeAttribute($value)
	{
		if (isset($value)) {
			$this->start_time = $value->format('His');
		} else {
			$this->start_time = $value;
		}
	}
	///終了年月日
	public function getEndDateAttribute()
	{
		return $this->end_date;
	}
	public function setEndDateAttribute($value)
	{
		if (isset($value)) {
			$this->end_date = $value->format('Ymd');
		} else {
			$this->end_date = $value;
		}
	}
	//終了時間
	public function getEndtimeAttribute()
	{
		return $this->end_time;
	}
	public function setEndtimeAttribute($value)
	{
		if (isset($value)) {
			$this->end_time = $value->format('His');
		} else {
			$this->end_time = $value;
		}
	}
	//所要時間
	public function getTimerequiredAttribute()
	{
		return $this->time_required;
	}
	public function setTimerequiredAttribute($value)
	{
		$this->time_required = $value;
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
	private $param_id;                              // ID
	private $param_seq;                              // log連番
	private $param_work_table;                              // 作業テーブル
	private $param_target_table;                              // 対象テーブル
	private $param_kind;                              // 種類
	private $param_status;                              // ステータス 0失敗 1成功
	private $param_start_date;                              // 開始年月日
	private $param_start_time;                              // 開始時間
	private $param_end_date;                              // 終了年月日
	private $param_end_time;                              // 終了時間
	private $param_time_required;                              // 所要時間
	private $param_created_user;                              // 作成ユーザー
	private $param_updated_user;                              // 修正ユーザー
	private $param_created_at;                              // 作成時間
	private $param_updated_at;                              // 修正時間
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
	//log連番
	public function getParamSeqAttribute()
	{
		return $this->param_seq;
	}

	public function setParamSeqAttribute($value)
	{
		$this->param_seq = $value;
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
	//種類
	public function getParamKindAttribute()
	{
		return $this->param_kind;
	}

	public function setParamKindAttribute($value)
	{
		$this->param_kind = $value;
	}
	//ステータス 0失敗 1成功
	public function getParamStatusAttribute()
	{
		return $this->param_status;
	}

	public function setParamStatusAttribute($value)
	{
		$this->param_status = $value;
	}
	//開始年月日
	public function getParamStartDateAttribute()
	{
		return $this->param_start_date;
	}

	public function setParamStartDateAttribute($value)
	{
		$this->param_start_date = $value;
	}
	//開始時間
	public function getParamStarttimeAttribute()
	{
		return $this->param_start_time;
	}

	public function setParamStarttimeAttribute($value)
	{
		$this->param_start_time = $value;
	}
	//終了年月日
	public function getParamEndDateAttribute()
	{
		return $this->param_end_date;
	}

	public function setParamEndDateAttribute($value)
	{
		$this->param_end_date = $value;
	}
	//終了時間
	public function getParamEndtimeAttribute()
	{
		return $this->param_end_time;
	}

	public function setParamEndtimeAttribute($value)
	{
		$this->param_end_time = $value;
	}
	//所要時間
	public function getParamTimerequiredAttribute()
	{
		return $this->param_time_required;
	}

	public function setParamTimerequiredAttribute($value)
	{
		$this->param_time_required = $value;
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

// ---------------------------- メソッド -----------------------------------------

	/**
	 * 最大log連番取得
	 *
	 * @return 最大log連番取得
	 */
	public function getMaxSeq(){
		try {
				$mainquery = DB::table($this->table)->max('seq');
				return $mainquery;
		}catch(\PDOException $pe){
				Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.failed_backup_error')).'$pe');
				Log::error($pe->getMessage());
				throw $pe;
		}catch(\Exception $e){
				Log::error('class = '.__CLASS__.' method = '.__FUNCTION__.' '.str_replace('{0}', $this->table, Config::get('const.LOG_MSG.failed_backup_error')).'$e');
				Log::error($e->getMessage());
				throw $e;
		}
	}

    /**
     * 登録
     *
     * @return void
     */
    public function insertItem(){
			try {
				DB::table($this->table)->insert(
						[
								'seq' => $this->seq,
								'work_table' => $this->work_table,
								'target_table' => $this->target_table,
								'kind' => $this->kind,
								'status' => $this->status,
								'start_date' => $this->start_date,
								'start_time' => $this->start_time,
								'end_date' => $this->end_date,
								'end_time' => $this->end_time,
								'time_required' => $this->time_required,
								'created_user' => $this->created_user,
								'created_at'=>$this->created_at
						]
				);
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
