<?php
namespace app\admin\controller;
use think\Controller;
class Index extends BaseController
{
    public function index()
    {
    	return $this->fetch('index');
    }
}
