<?php
namespace Controller;

class IndexController extends Controller
{
	
	public function index()
	{
		$this->assign('title','你的博客');
		$this->display();
	}
	
	public function edit()
	{
		echo 222;
	}
	
}