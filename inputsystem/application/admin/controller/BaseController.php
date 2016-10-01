<?php
/**
 * 基本类
 * ============================================================================
 * * 版权所有 2016-2018   科技有限公司，并保留所有权利。
 * 网站地址: php.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * BaseController.php} 2016年9月20日}  Lisonglin
 */
namespace  app\admin\controller;
use think\Session;
use think\Controller;
use think\view;

class BaseController extends Main{
	
	public function __construct()
	{
		if (!isset(Session::get('user')['id']))
		{
			$this->redirect('/login');
		}
		parent::__construct();
	}
	
}