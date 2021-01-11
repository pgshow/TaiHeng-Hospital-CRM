<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		//重定向到后台登陆
		$this->redirect('/Admin/login', '', 0, '请先登录...');
    }
}