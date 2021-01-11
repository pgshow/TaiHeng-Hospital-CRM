<?php
namespace Admin\Controller;
use Think\Controller;
class EmployeeController extends Controller {
	function _initialize() {
		not_login();
		
	}
	
	//员工列表页
    public function index(){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','employee_list');
		
		//统计用户数量
		$Employee = M("employee"); // 实例化Customer对象
		$employeeCount = $Employee->count("eid");
		$this->assign('employeeCount',$employeeCount);
		
		//获取用户列表
		$User = M('employee');
		$elist = $User->select();
		$this->assign('elist',$elist);
		
		//获取医疗组别
		$Group = M("group"); // 实例化Customer对象
		$glist = $Group->select();
		$this->assign('glist',$glist);
		
		$this->display();
    }
	
	//员工编辑页
	public function editemployee($id){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','employee_list');
		
		if($id == cookie('thoa_uid')) {
			$this->error('不能修改自己！');
		}
		
		if(IS_POST){
			//更新雇员信息
			$Update = M("employee");
			$data['group_id'] = I('post.group_id');
			$data['status'] = I('post.status');
			//如果提交了密码
			if('' != I('post.user_pass')) {
			    $data['user_pass'] = md5(I('post.user_pass'));
			}
			$result = $Update->where("eid={$id}")->save($data);
			
			//返回修改结果
			if($result){
				//录入成功
				$this->success('修改成功', I('post.http_referer'));
			} else {
				$this->error('修改失败');
			}
			
		} else {
		
		//获取员工信息
		$User = D('employee');
		$data = $User->find($id);
		$this->assign('employee',$data);
		
		//获取群组列表
		$Group = D('group');
		$Gdata = $Group->order('level asc')->select();
		$this->assign('groups',$Gdata);
		
		$this->display();
		}
	}
	
	//员工新增页
	public function addemployee(){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','employee_add');
		
		if(IS_POST){
			//判断重要字段是否为空
			if('' == I('post.e_name') || '' == I('post.login_name') || '' == I('post.user_pass')) {
				$this->error('请填写完整员工信息！');
			}
			
			$User = M("employee"); // 实例化User对象
			$add_customer['user_login'] = I('post.login_name');
			$add_customer['user_name'] = I('post.e_name');
			$add_customer['group_id'] = I('post.group_id');
			$add_customer['status'] = I('post.status');
			$add_customer['user_pass'] = md5(I('post.user_pass'));
			
			$result = $User->add($add_customer);
			if($result){
				//录入成功
				$this->success('添加成功', I('post.http_referer'));
			} else {
				$this->error('添加失败');
			}

		} else {
			
		//获取群组列表
		$Group = D('group');
		$Gdata = $Group->order('level asc')->select();
		$this->assign('groups',$Gdata);
		
		$this->display();
		}
	}
	
	//删除员工
	public function delemployee($id){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','employee_list');
		
		if($id == cookie('thoa_uid')) {
			$this->error('不能删除自己！');
		}
		
		if(!IS_POST) {
			
			//获取员工信息
			$User = M('employee');
			$data = $User->find($id);
			$this->assign('employee',$data);
			$this->display();
		} else {
			
			//员工
			$User = M("employee");
			$result = $User->where("eid={$id}")->delete();
			
			//返回修改结果
			if($result){
				//录入成功
				$this->success('成功删除', I('post.http_referer'));
			} else {
				$this->error('删除失败');
			}
		}
	}
}