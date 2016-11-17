<?php
namespace Controller;

use \Model\UserModel;
use \Framework\Verify;

class UserController extends Controller
{
	protected $user;
	
	public function __construct()
	{
		parent::__construct();
		$this->user = new UserModel();
	}
	
	public function register()
	{
		
		$this->display();
		
	}
	
	
	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		$this->success('退出成功');
	}
	
	public function checkLogin()
	{
		$username = $_POST['username'];
		$data = $this->user->getByUsername($_POST['username']);
		
		if ($data[0]['password'] != trim($_POST['password'])) {
			$this->error('密码错误');
		}
		
		$_SESSION['uid'] = $data[0]['uid'];
		$_SESSION['username'] = $data[0]['username'];
		
		$this->success('登陆成功','index.php');
		
	}
	
	
	public function  login()
	{
		
		$this->display();
	}
	
	public function check()
	{
		if (strcmp($_POST['password'],$_POST['repassword'])) {
			$this->error('两次密码不一致');
		}
		
		if(strcasecmp($_POST['verify'],$_SESSION['verify'])) {
			$this->error('验证码不正确');
		}
		
		$_POST['createtime'] = time();
		unset($_POST['repassword']);
		unset($_POST['verify']);
		
		
		$insert_id = $user->add($_POST);
		if ($insert_id) {
			$this->success('注册成功');
		}
		
		
		
		
	}
	
	public function verify()
	{
		$verify = new Verify();
		$verify->outImg();
		$_SESSION['verify'] = $verify->verifyCode;
	}
	
	public function repassword()
	{
		echo 555;
	}
	
}