<?php
namespace Admin\Controller;
use Think\Controller;
class FilterController extends Controller {
	function _initialize() {
		not_login();
	}
	
    public function index(){
		//目前所在页
		$this->assign('onPage','filter_list');
		
		//管理、领导、及筛查组才能使用该功能
		if(!(check_role(8, 'gt') || check_role(3, 'eq'))) {
			$this->error('你没有权限使用筛查组功能！');
		}
		
		$User = M('customer');
		
		//获取所有get变量
		$all = I('get.');
		$this->assign('all', $all);
		
		//高级搜索
		if('search' == $all['adv']) {
			
			/*患者姓名*/
			if('' != $all['c_name']) {
				$where['c_name'] = array('like','%'.$all['c_name'].'%');
			}
			
			/*联系电话*/
			if('' != $all['tel']) {
				$where['tel'] = array('like','%'.$all['tel'].'%');
			}
			
			/*筛查地址*/
			if('' != $all['filter_address']) {
				$where['filter_address'] = array('like','%'.$all['filter_address'].'%');
			}
			
			/*筛查时间范围*/
			if('' != $all['add_time1'] && '' != $all['add_time2']) {
				$add_begin = $all['add_time1'].' 00:00:00';
				$add_end = $all['add_time2'].' 23:59:59';
				
				$where['add_time'] = array(array('gt',$add_begin),array('lt',$add_end));
			}
			
		}
		
		$where['input_group_id'] = 3;
		
		//排序的变更
		switch (I('get.ord')) {
			//默认排序
			default:
			  $ord = 'cid desc';
			  $map = $where;
		}

		$clist = $User->where($map)->order($ord)->page(I('get.p'), 20)->select();
		$this->assign('clist',$clist);// 赋值数据集
		$count = $User->where($map)->count();// 查询满足要求的总记录数
		
		// 职工医保记录数
		$zhigong_count = $User->where($map)->where("insurance='职'")->count();
		// 合作医保记录数
		$hezuo_count = $User->where($map)->where("insurance='合'")->count();
		
		$Page = new \Think\Page($count, 20);// 实例化分页类
			
		//分页跳转的时候保证查询条件
		foreach($map as $key=>$val) {
			$Page->parameter[$key] = urlencode($val);
		}
		
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('count',$count);// 总人数
		$this->assign('zhigong_count',$zhigong_count);// 职工医保人数
		$this->assign('hezuo_count',$hezuo_count);// 合作医保人数
		
		
		$this->display();
    }
	
	//新增用户
	public function add() {
		//目前所在页
		$this->assign('onPage','filter_add');
		
		//管理、领导、及筛查组才能使用该功能
		if(!(check_role(8, 'gt') || check_role(3, 'eq'))) {
			$this->error('你没有权限使用筛查组功能！');
		}
		if(IS_POST){
			//获取所有post变量
			$all = I('post.');
			
			//姓名不能为空
			if('' == $all['c_name']) {
				$this->error('患者姓名不能为空！');
			}
			
			$User = M("customer"); // 实例化User对象
			
			
			$add['c_name'] = $all['c_name'];
			if('' == $all['sex']) {
			    $add['sex'] = 0;
			} else {
			    $add['sex'] = $all['sex'];
			}
			$add['age'] = $all['age'];
			$add['right_eye'] = $all['right_eye'];
			$add['left_eye'] = $all['left_eye'];
			$add['detail'] = $all['detail'];
			$add['tel'] = $all['tel'];
			$add['appoint_date'] = $all['appoint_date'];
			$add['appoint_time'] = $all['appoint_time'];
			$add['filter_address'] = $all['filter_address'];
			$add['insurance'] = $all['insurance'];
			$add['add_time'] = date("Y-m-d H:i:s" ,time());
			$add['appoint_way'] = '现场筛查';
			$add['input_group_id'] = 3;
			$add['input_employee_id'] = I('cookie.thoa_uid');
			$add['input_employee_name'] = I('cookie.thoa_uname');
			
			$result = $User->add($add);
			
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
}