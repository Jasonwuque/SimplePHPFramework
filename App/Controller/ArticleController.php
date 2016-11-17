<?php
namespace Controller;

use \Model\ArticleModel;
use \Framework\Page;

class ArticleController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		if (empty($_SESSION['uid'])) {
			$this->error('没有登陆');
		}
		
	}
	
	public function index()
	{
		$article = new ArticleModel();
		
		$total = $article->count();
		
		$page = new Page($total);
		
		$current =  $page->limit();
		
		
		$data = $article->limit($current)->order('aid desc')->select();
		
		$this->assign('page',$page->render());
		$this->assign('articles',$data);
		$this->display(null,true,$_SERVER['REQUEST_URI']);
		
	}
	
	public function add()
	{
		$this->display();
	}
	
	public function insert()
	{
		$article = new ArticleModel();
		
		$_POST['createtime'] = time();
		$_POST['article'] = $_POST['editorValue'];
		unset($_POST['editorValue']);
		
		$id = $article->add($_POST);
	
		if ($id) {
			$this->success('发表成功','index.php');
		} else {
			$this->error('发表失败');
		}
	}
}
