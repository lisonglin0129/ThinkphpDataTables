<?php
/**
 * 默认页面
 */
namespace app\admin\controller;

use think\Controller;

class Common extends BaseController
{
	public function content()
	{
		return $this->fetch('Content');
	}
}
