<?php
namespace app\index\controller;
use think\Request;
use form\form;
use app\index\model\Departments;
use app\index\model\BillModel;
class Bill extends Main
{
	public function index()
	{
		return $this->fetch('index');
	}
	//--添加哦
	public function add(Request $requset)
	{
		$post = $_POST;
		$dep_id = intval($requset->post('dep_id'));
		$formdata = new \ArrayObject($post);
		//--过滤表单为空的值
		foreach (($from = new form($formdata->getIterator(),'')) as $value) {
			$data[$from->key()] = $value;			
		}
		$Bill = new BillModel();
		$de_name = Departments::where('id',$dep_id)->value('de_name');
		$data['dep_id'] = $dep_id;
		$data['in_departments'] = $de_name;
		$Bill->data($data);
		$Bill->save();
		$this->success('添加成功');
		//--存入数据库	
	}
	
}
