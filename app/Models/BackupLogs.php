<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupLogs extends Model
{
    use HasFactory;

    protected $table = 'backup_logs';

	private $id;					// ID
	private $work_table;			// 作業テーブル
	private $target_table;			// 対象テーブル
	private $kind;					// 種類
	private $status;				// ステータス 0失敗 1成功
	private $date;					// 開始年月日
	private $start_time;			// 開始時間
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
	public function getDateAttribute()
	{
		return $this->date;
	}
	public function setDateAttribute($value)
	{
		$this->date = $value;
	}
	//開始時間
	public function getStarttimeAttribute()
	{
		return $this->start_time;
	}
	public function setStarttimeAttribute($value)
	{
		$this->start_time = $value;
	}
	//終了時間
	public function getEndtimeAttribute()
	{
		return $this->end_time;
	}
	public function setEndtimeAttribute($value)
	{
		$this->end_time = $value;
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


}
