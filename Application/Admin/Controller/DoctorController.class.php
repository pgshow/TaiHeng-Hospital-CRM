<?php
namespace Admin\Controller;
use Think\Controller;
class DoctorController extends Controller {
	function _initialize() {
		not_login();
	}
	
	//专家列表页
    public function index(){
		//目前所在页
		$this->assign('onPage','doctor_list');
		
		//统计用户数量
		$Doctor = M("doctors"); // 实例化Customer对象
		$doctorCount = $Doctor->count("did");
		$this->assign('doctorCount',$doctorCount);
		
		//获取专家列表
		$User = M('doctors');
		$dlist = $User->order('did asc')->select();
		$this->assign('dlist',$dlist);
		
		
		$this->display();
	}
	
	//医生新增页
	public function adddoctor(){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','doctor_add');
		if(IS_POST){
			if('' == I('post.d_name')) {
			    $this->error('专家姓名不能为空！');
			}
			
			$User = M("doctors"); // 实例化User对象
			$add_customer['doctor_name'] = I('post.d_name');
			
			$result = $User->add($add_customer);
			if($result){
				//录入成功
				$this->success('添加成功', I('post.http_referer'));
			} else {
				$this->error('添加失败');
			}
			
		} else {
		    $this->display();
		}
	}
	
	//删除医生
	public function deldoctor($id) {
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','doctor_list');
		
		if(!IS_POST) {
			
			//获取专家信息
			$User = M('doctors');
			$data = $User->find($id);
			$this->assign('doctor',$data);
			$this->display();
		} else {
			
			//删除专家
			$User = M("doctors");
			$result = $User->where("did={$id}")->delete();
			
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