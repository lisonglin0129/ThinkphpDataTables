<?php
/**
 * 默认页面
 */
namespace app\index\controller;

use think\Controller;

class Common extends Main
{
	public function content()
	{
		return $this->fetch('Content');
	}
	public function bill()
	{
		return $this->fetch('Content');
	}
}
