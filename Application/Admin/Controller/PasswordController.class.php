<?php
namespace Admin\Controller;
use Think\Controller;
class PasswordController extends Controller {
	function _initialize() {
		not_login();
	}
	
	//用户修改密码功能
    public function index(){
		//目前所在页
		$this->assign('onPage','change_pass');
		
		//获取用户Cookie
		$uid = cookie('thoa_uid');
		
		if(!IS_POST) {
			
			//获取用户信息
			$User = M('employee');
			$data = $User->find($uid);
			$this->assign('employee',$data);
			$this->display();
		} else {
			
			//修改密码
			$User = M("employee");
			$check = $User->find($uid);
			
			//验证用户权限
			if($check){
				$Update = M("employee");
				$up['user_pass'] = md5(I('post.user_pass'));
				$result = $Update->where("eid={$uid}")->save($up);
				//返回修改结果
				if($result){
					//录入成功
					$this->success('修改成功', I('post.http_referer'));
				} else {
					$this->error('修改失败');
				}
			}
		}
	}
}