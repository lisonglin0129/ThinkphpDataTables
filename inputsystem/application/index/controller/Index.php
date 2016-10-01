<?php
namespace app\index\controller;
use app\index\model\Departments;
class Index extends Main
{
    public function index()
    {
    	$Dep = Departments::select();
    	$this->assign('dep',$Dep);
    	return $this->fetch('index');
    }
}
