<?php
namespace Admin\Controller;
use Think\Controller;
class TransferController extends Controller {
	function _initialize() {
		not_login();
	}
	
	//转诊医生列表页
    public function index(){
		//目前所在页
		$this->assign('onPage','transfer_list');
		
		//统计医生数量
		$Transfer = M("areas"); // 实例化Customer对象
		$transferCount = $Transfer->where("area_type=3")->count("area_id");
		$this->assign('transferCount',$transferCount);
		
		//获取地区列表
		$result = $this->MakeTree();   //调用下面定义的函数
		$this->assign('list', $result);  //绑定volist
		
		
		$this->display();
    }
	
	//转诊医生新增页
	public function addtransfer(){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','transfer_add');
		
		if(IS_POST){
			//判断提交信息是否为空
			if('' == I('post.kind') || '' == I('post.title')) {
				$this->error('信息不能为空！');
			}
			
			$User = M("areas"); // 实例化User对象
			$add_area['area_name'] = I('post.title');
			
			//如果录入的是医院
			if('hospital' == I('post.kind')) {
				$add_area['parent_id'] = I('post.parent_id1');
				$add_area['area_type'] = 2;
			} elseif('doctor' == I('post.kind')) {
				$add_area['parent_id'] = I('post.parent_id2');
				$add_area['area_type'] = 3;
			}
			
			$result = $User->add($add_area);
			if($result){
				//录入成功
				$this->success('添加成功', I('post.http_referer'));
			} else {
				$this->error('添加失败');
			}
			
		} else {
			
			//获取地区列表
			$Db = D('areas');
			$adate = $Db->where('area_type=1')->order('or_no asc')->select();
			$this->assign('alist',$adate);
			
			//获取医院列表
			$hdate = $Db ->where('area_type=2')->select();
			$this->assign('hlist',$hdate);
			
			$this->display();
		}
	}
	
	//删除转诊医生
	public function deltransfer($id){
		//权限限制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','transfer_list');
		
		$User = M("areas");
		$result = $User->where("area_id={$id} and area_type=3")->delete();
		
		//返回删除结果
		if($result){
			$this->success('成功删除', $_SERVER['HTTP_REFERER']);
		} else {
			$this->error('删除失败');
		}
		
	}

//自定义函数，三层volist数据嵌套
function MakeTree()  
{  
	$condition['area_type'] = 1;
	  
	$result = M('areas')->where($condition)->order('or_no asc')->select();
	if($result)  
	{  
		foreach($result as $n => $val)  
		{  
			$list[$n]['id'] = $val['area_id'];  
			$list[$n]['name'] = $val['area_name'];  
			
			$list[$n]['child'] = $this->_MakeSonTree($val['area_id']);  
		}  
	}  
	return $list;  
}  
  
function _MakeSonTree($pid)  
{  
	$condition['parent_id'] = $pid;  
	  
	$result = M('areas')->where($condition)->select();  
	if($result)  
	{  
		foreach($result as $n => $val)  
		{  
			$list[$n]['id'] = $val['area_id'];  
			$list[$n]['name'] = $val['area_name'];  
			  
			$list[$n]['grandchild'] = $this->_MakeColTree($val['area_id']);  
		}  
	}  
	  
	return $list;  
}  
  
function _MakeColTree($pid)  
{  
	$condition['parent_id'] = $pid;  
	  
	$result = M('areas')->where($condition)->select();  
	if($result)  
	{  
		foreach($result as $n => $val)  
		{  
			$list[$n]['id'] = $val['area_id'];
			$list[$n]['name'] = $val['area_name'];
		}  
	}  
	return $list;  
}
}