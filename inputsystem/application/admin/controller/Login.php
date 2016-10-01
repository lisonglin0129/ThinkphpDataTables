<?php
/**
 * 登录类
 * ============================================================================
 * * 版权所有 2016-2018   科技有限公司，并保留所有权利。
 * 网站地址: php.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: lisonglin
 * Login.php} 2016年9月20日}  Lisonglin
 */
namespace  app\admin\controller;
use app\admin\controller\Main;
use think\Request;
use app\admin\model\Auth;
use think\Session;
class Login extends Main
{
	protected  $return_json=[
		//--登录用户的状态
		'status' => 0,
		//--错误提示消息
		'msg' => 'Username or Password Error !!!!',
		//--返回的登录跳转回调url
		'url' => '/login' 
	];
	//用户信息
	private $user;
	public function index()
	{		
		return $this->fetch('index');
	}
	//--Ajax登录处理
	/**
	 * Post UserName & Password
	 * @param Request $request
	 */
	public function Login(Request $request)
	{
		$user = [
			'username'  => 	$request->post('username'),
			'password'  =>  md5($request->post('password'))				
		];

		if(strlen($user['username'])<=0 || strlen($user['password'])<=0)
		{
			$this->return_json['msg'] = '账号或密码为空';
			return json_encode($this->return_json);
		}
		//登录查询
		$this->user = Auth::get($user);			
		if(isset($this->user->id))
		{
			$datetime = date('Y-m-d H:i:s',time());
			//--登录成功后更新用户登录时间
			$this->user->save(['logintime'=>$datetime],['id'=>$this->user->id]);
			$this->return_json['status'] = 1;
			$this->return_json['uid'] = $this->user->id;
			$this->return_json['msg'] = '登录成功';
			$this->return_json['url'] = 'admin/index';
			
			Session::set('user', [
						 'id'			=>	$this->user->id,
						 'username'		=>	$this->user->username,
						 'logintime'	=>	$datetime
			]);
			
		}
		return json_encode($this->return_json);
	}
	public function loginout()
	{
		if(Session::has('user')) {
			Session::pull('user');		
		}
		return $this->redirect('/login');
	}
}