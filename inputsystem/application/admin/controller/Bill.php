<?php
/**
 * 进票
 * ============================================================================
 * * 版权所有 2016-2018   科技有限公司，并保留所有权利。
 * 网站地址: php.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Bill.php} 2016年9月22日}  Lisonglin
 */
namespace  app\admin\controller;
use app\admin\controller\BaseController;
use app\admin\model\BillModel;
use think\Request;
class Bill extends BaseController
{
	
	public function index()
	{
		$res = BillModel::all();
		$this->assign('data',$res);
		return $this->fetch('index');
	}
	public function getData(Request $request)
	{
		
		$start = $request->post('start');
		$length = $request->post('length');
		$seachValue['clerk'] = $request->post('clerk');	
		$seachValue['qq'] = $request->post('qq');
		$seachValue['clientele_phone'] = $request->post('clientele_phone');
		$seachValue['in_departments'] = $request->post('in_departments');
		$seachValue['clientele_name'] = $request->post('clientele_name');
		$seachValue['clientele_wx'] = $request->post('clientele_wx');
		$seach = array();
		foreach ($seachValue as $key => $sh)
		{
		  if($sh == ''){
		  	  continue;
		  }
		  $seach[$key] = array('like','%'.$sh.'%');	
		}
		$res = BillModel::where($seach)->limit($start,$length)->order('id DESC')->select();
		$data['data'] = array();
		foreach($res as $key => $v)
		{
			$data['data'][$key]= json_decode($v);
		}
		//$data['draw'] = $request->port('draw');
		$data['iTotalDisplayRecords'] = BillModel::count();
		$data['iTotalRecords'] = count($data['data']);
		return $data;
	}
	public function download()
	{
		$file_path =  str_replace('../application/', '', str_replace('\\', '/', APP_PATH)).'tempfile';
		$filename = 'temp_'.rand(0,10000).'.csv';
		if(!is_dir($file_path.$filename))
		{
			@mkdir($file_path,0777,true);		
		}
		$fp = fopen($file_path.'/'.$filename, 'a+');
		
		$res = BillModel::all();

		foreach($res as $key => $value)
		{
			$data[] = json_decode($value);
		}
		$csv_data = "业务员,合作日期,客户姓名,客户电话,客户微信,客户QQ,合作资金,录入团队,备注,\n";
		foreach ($data as $value)
		{
			$csv_data .= "\r\n".$value->clerk.','.$value->date.','.$value->clientele_name.
			$value->clientele_phone.','.$value->clientele_wx.','.$value->qq.','.
			$value->clt_price.','.$value->all_price.','.$value->in_departments.','.$value->info.','."\r";
		}
		
		fwrite($fp, $csv_data);		
		if(is_file($file_path.'/'.$filename)){
			fclose($fp);
			$fps = fopen($file_path.'/'.$filename, 'r');
			header("Content-type: application/octet-stream"); //返回的文件
			header("Accept-Ranges: bytes");   //按照字节大小返回
			header("Accept-Length: ".filesize($file_path.'/'.$filename)); //返回文件大小
			header("Content-Disposition: attachment; filename=".date('Y年m月d日  H点i分s秒',time()).'.csv');
			echo fread($fps, filesize($file_path.'/'.$filename));
			fclose($fps);
			@unlink($file_path.'/'.$filename);
		}
	}
}