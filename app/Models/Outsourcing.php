<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Outsourcing extends Model
{
    use HasFactory;

    protected $table = 'customer';

    private $id;
    private $code;              // 得意先コード
    private $classify;          // 区分
    private $name;              // 得意先名／外注先名
    private $post;              // 郵便番号
    private $address1;          // 住所1
    private $address2;          // 住所2
    private $tel;               // TEL
    private $fax;               // FAX
    private $charge;            // 担当
    private $cutoff;            // 締め日
    private $collection;        // 回収日
    private $tax_class;         // 税区分
    private $tax_fraction;      // 税端数処理
    private $industry;          // 業種
    private $created_user;      // 作成ユーザー
    private $updated_user;      // 修正ユーザー
    private $created_at;        // 作成時間
    private $updated_at;        // 修正時間
    private $is_deleted;        // 削除フラグ


    // ID
    public function getIdAttribute(){ return $this->id;}
    public function setIdAttribute($value){  $this->id = $value;}
    // 得意先コード
     public function getCodeAttribute(){ return  $this->code;}
     public function setCodeAttribute($value){ $this->code = $value;}
     // 区分
     public function getClassifyAttribute(){ return $this->classify;}
     public function setClassifyAttribute($value){  $this->classify = $value;}
     // 得意先名／外注先名
     public function getNameAttribute(){ return $this->name;}
     public function setNameAttribute($value){  $this->name = $value;}
     // 郵便番号
     public function getPostAttribute(){ return $this->post;}
     public function setPostAttribute($value){  $this->post = $value;}
     // 住所1
     public function getAddress1Attribute(){ return $this->address1;}
     public function setAddress1Attribute($value){  $this->address1 = $value;}
     // 住所2
     public function getAddress2Attribute(){ return $this->address2;}
     public function setAddress2Attribute($value){  $this->address2 = $value;}
     // TEL
     public function getTelAttribute(){ return $this->tel;}
     public function setTelAttribute($value){  $this->tel = $value;}
     // FAX
     public function getFaxAttribute(){ return $this->fax;}
     public function setFaxAttribute($value){  $this->fax = $value;}
     // 担当
     public function getChargeAttribute(){ return $this->charge;}
     public function setChargeAttribute($value){  $this->charge = $value;}
     // 締め日
     public function getCutoffAttribute(){ return $this->cutoff;}
     public function setCutoffAttribute($value){  $this->cutoff = $value;}
     // 回収日
     public function getCollectionAttribute(){ return $this->collection;}
     public function setCollectionAttribute($value){  $this->collection = $value;}
     // 税区分
     public function getTaxclassAttribute(){ return $this->tax_class;}
     public function setTaxclassAttribute($value){  $this->tax_class = $value;}
     // 税端数処理
     public function getTaxfractionAttribute(){ return $this->tax_fraction;}
     public function setTaxfractionAttribute($value){  $this->tax_fraction = $value;}
     // 業種
     public function getIndustryAttribute(){ return $this->industry;}
     public function setIndustryAttribute($value){  $this->industry = $value;}
      // 作成ユーザー
     public function getCreateduserAttribute(){ return $this->created_user;}
     public function setCreateduserAttribute($value){  $this->created_user = $value;}
     // 修正ユーザー
     public function getUpdateduserAttribute(){ return $this->updated_user;}
     public function setUpdateduserAttribute($value){  $this->updated_user = $value;}
     // 作成日時
     public function getCreatedatAttribute(){ return $this->created_at;}
     public function setCreatedatAttribute($value){  $this->created_at = $value;}
     // 修正日時
     public function getUpdatedatAttribute(){ return $this->updated_at;}
     public function setUpdatedatAttribute($value){  $this->updated_at = $value;}
     // 削除フラグ
     public function getIsdeletedAttribute(){ return $this->is_deleted;}
     public function setIsdeletedAttribute($value){  $this->is_deleted = $value;}
     // 
     //public function getAttribute(){ return $this->;}
     //public function setAttribute($value){  $this-> = $value;}
 

    // ------------- implements --------------
 
    // エディットID
    private $param_edit_id;
    public function getParamEditidAttribute(){ return $this->param_edit_id;}
    public function setParamEditidAttribute($value){  $this->param_edit_id = $value;}
    // コード
    private $param_code;
    public function getParamCodeAttribute(){ return $this->param_code;}
    public function setParamCodeAttribute($value){  $this->param_code = $value;}
    // 取引先名前
    private $param_name;
    public function getParamNameAttribute(){ return $this->param_name;}
    public function setParamNameAttribute($value){  $this->param_name = $value;}

    // ログインユーザーのアカウント 未使用
    private $param_account_id;
    public function getParamAccountidAttribute(){ return $this->param_account_id;}
    public function setParamAccountidAttribute($value){  $this->param_account_id = $value;}



    /**
     * 取得
     *
     * @return void
     */
    public function getData(){
        $message = "ログ出力 getData";
        //echo '<pre>' . var_export($message, true) . '</pre>';
        //Log::debug("debug --".$message);
        //Log::info("this->param_edit_id -- ".$this->param_edit_id);
        
        try {
            $data = DB::table($this->table)
            ->select(

                'id',
                'code',
                'classify',
                'name',
                'post',
                'address1',
                'address2',
                'tel',
                'fax',
                'charge',
                'cutoff',
                'collection',
                'tax_class',
                'tax_fraction',
                'industry',
                'created_user',
                'updated_user',
                'created_at',
                'updated_at',
                'is_deleted'

            );
            if(!empty($this->param_edit_id)){
                $data->where('id',$this->param_edit_id);
            }
            elseif(!empty($this->param_code)){
                $data->where('code',$this->param_code)
                ->orderBy('id', 'DESC');
            }
            elseif(!empty($this->param_name)){
                $data->where('name',$this->param_name)
                ->orderBy('id');
            }
            else {
                $data->where('classify','2');
            }
            $result = $data
            //->where('status','newest')
            ->get();

            return $result;



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
