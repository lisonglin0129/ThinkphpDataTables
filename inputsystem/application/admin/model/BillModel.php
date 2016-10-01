<?php
namespace  app\admin\model;
use think\Model;
class BillModel extends Model{
	protected $table = 'ts_bill';
    protected  function scopeBill($excute)
    {
    	return $excute->where('id',1);
    }


}