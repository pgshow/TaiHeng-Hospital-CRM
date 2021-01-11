<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
	//输出登陆页
    public function index(){
		$this->display();
    }
	
	//登陆
	public function login($log = null, $pwd = null){
        if(IS_POST){
			
			//判断账号
			if(null == $log || null == $pwd) {
				$this->error('账号或密码不能为空');
			}

            $db = M('employee');
			$map['user_login'] = $log;
			$user = $db->where($map)->find();
			
			if(!$user){
				$this->error('帐号不存在');
			}
			if('锁定' == $user['status']){
				$this->error('该账号已被管理员锁定');
			}
			if($user['user_pass'] != md5($pwd)){
				$this->error('密码错误');
			}
			
			$gdb = M('group');
			$gid = $user['group_id'];
			$gdate = $gdb->find($gid);


			// 记录登录雇员COOKIES
			cookie('thoa_uid', $user['eid']);
			cookie('thoa_ulogin', $user['user_login']);
			cookie('thoa_uname', $user['user_name']);
			cookie('thoa_group_id', $user['group_id']);
			cookie('thoa_level', $gdate['level']);
			$this->success('登录成功！', U('index/admin'));

        } else {
            if(is_login()){
                $this->redirect('index/admin');
            }else{
                $this->redirect('index');
            }
        }
	}
	//登出用户
	public function logout() {
		cookie(null,'thoa_');
        $this->success('退出成功！', U('index'));
	}
}