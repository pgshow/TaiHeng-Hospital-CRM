<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	function _initialize() {
		not_login();
	}
	
    public function index(){
		//登陆首页
		$this->display();
    }
	
	public function admin() {
		//目前所在页
		$this->assign('onPage','customer_list');
		
		//统计用户数量
		$customer = M("customer");
		$customerCount = $customer->count("cid");
		$this->assign('customerCount', $customerCount);
		
		$User = M('customer');
		// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
		
		//管理、领导、及导医除外，其他群组只能看到本群组录入资料
		if(!(check_role(8, 'gt') || check_role(4, 'eq'))) {
			$where['input_group_id'] = cookie('thoa_group_id');
		}
		
		/*
		各种查询条件
		*/
		
		//获取专家列表
		$DUser = M('doctors');
		$dlist = $DUser->order('did asc')->select();
		$this->assign('dlist',$dlist);
		
		//获取所有get变量
		$all = $_GET;
		
		//判断编码
		$encode = mb_detect_encoding($all['createuser'], array('ASCII','GB2312','GBK','UTF-8'));
		
		//转换编码
		if ($encode == 'EUC-CN') {
		    $all['input_employee'] = iconv("GB2312", "utf-8", $all['input_employee']);
		    $all['createuser'] = iconv("GB2312", "utf-8", $all['createuser']);
			$all['case'] = iconv("GB2312", "utf-8", $all['case']);
			$all['appoint_office'] = iconv("GB2312", "utf-8", $all['appoint_office']);
			$all['appoint_doctor'] = iconv("GB2312", "utf-8", $all['appoint_doctor']);
			$all['appoint_way'] = iconv("GB2312", "utf-8", $all['appoint_way']);
			$all['c_source'] = iconv("GB2312", "utf-8", $all['c_source']);
			$all['transfer'] = iconv("GB2312", "utf-8", $all['transfer']);
			$all['c_name'] = iconv("GB2312", "utf-8", $all['c_name']);
		}
		$this->assign('all', $all);

		//高级搜索
		    /*是否预约日期*/
			if('yes' == $all['is_apponit']) {
				
			    $where['appoint_date'] = array('neq', '0000-00-00');
				//预约日期范围
				if('' != $all['appoint_date1'] || '' != $all['appoint_date2']){
					$where['appoint_date'] = array(array('gt',$all['appoint_date1']), array('lt',$all['appoint_date2']));
				}
				
			} elseif('no' == $all['is_apponit']) {
				//未预约
				$where['appoint_date'] = array('eq', '0000-00-00');
			}
			
			/*是否就诊*/
			if('yes' == $all['visited']) {
				
			    $where['visit_time'] = array('neq', '0000-00-00 00:00:00');
				//就诊日期范围
				if('' != $all['visit_time1'] || '' != $all['visit_time2']){
					
					//加上时间
					$visit_begin = $all['visit_time1'].' 00:00:00';
					$visit_end = $all['visit_time2'].' 23:59:59';
					$where['visit_time'] = array(array('gt',$visit_begin),array('lt',$visit_end));
				}
				
			} elseif('no' == $all['visited']) {
				//未预约
				$where['visit_time'] = array('eq', '0000-00-00 00:00:00');
			}
			
			//录入日期
			if('' != $all['add_time1'] && '' != $all['add_time2']){
				$add_begin = $all['add_time1'].' 00:00:00';
				$add_end = $all['add_time2'].' 23:59:59';
				
				$where['add_time'] = array(array('gt',$add_begin),array('lt',$add_end));

			}
			
			/*报备人*/
			if('' != $all['input_employee']) {
				$where['input_employee_name'] = $all['input_employee'];
			}
			
			/*预约号*/
			if('' != $all['appoint_no']) {
				$where['appoint_no'] = array('like','%'.$all['appoint_no'].'%');
			}
			
			/*病种*/
			if('' != $all['case']) {
				$where['case'] = array('like','%'.$all['case'].'%');
			}
			
			/*预约科室*/
			if('' != $all['appoint_office']) {
				$where['appoint_office'] = $all['appoint_office'];
			}
			
			/*预约专家*/
			if('' != $all['appoint_doctor']) {
				$where['appoint_doctor'] = $all['appoint_doctor'];
			}
			
			/*预约方式*/
			if('' != $all['appoint_way']) {
				$where['appoint_way'] = $all['appoint_way'];
			}
			
			/*患者来源*/
			if('' != $all['c_source']) {
				$where['c_source'] = $all['c_source'];
			}
			
			/*转诊医生*/
			if('' != $all['transfer']) {
				$where['transfer'] = array('like','%'.$all['transfer'].'%');
			}
			
			/*患者姓名*/
			if('' != $all['c_name']) {
				if('name' == $all['name_type']) {
				    $where['c_name'] = array('like','%'.$all['c_name'].'%');
				} else {
					$where['c_old_name'] = array('like','%'.$all['c_name'].'%');
				}
			}
			
			/*联系电话*/
			if('' != $all['tel']) {
				$where['tel'] = array('like','%'.$all['tel'].'%');
			}

		
		//排序的变更
		switch ($all['ord']) {
			//预约日期升序排序
			case 'appoint_date_asc':
			  $ord = 'appoint_date asc';
			  break;
			//预约日期倒序排序
			case 'appoint_date_desc':
			  $ord = 'appoint_date desc';
			  break;
			//提交时间升序排序
			case 'add_time_asc':
			  $ord = 'add_time asc';
			  break;
			//提交时间倒序排序
			case 'add_time_desc':
			  $ord = 'add_time desc';
			  break;
			//到诊时间升序排序
			case 'visit_time_asc':
			  $ord = 'visit_time asc';
			  break;
			//到诊时间倒序排序
			case 'visit_time_desc':
			  $ord = 'visit_time desc';
			  break;
			  
			//默认排序
			default:
			  $ord = 'cid desc';
		}

		$clist = $User->where($where)->order($ord)->page(I('get.p'), 20)->select();
		$this->assign('clist',$clist);// 赋值数据集
		$count = $User->where($where)->order($ord)->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 20);// 实例化分页类

		//分页跳转的时候保证查询条件
		foreach($map as $key=>$val) {
			$Page->parameter[$key] = urlencode($val);
		}
		
		$Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$this->display();
	}
	
	//删除用户
	public function delcustomer($id) {
		//权限控制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','customer_list');
		
		if(!IS_POST) {
			
			//获取专家信息
			$User = M('customer');
			$data = $User->find($id);
			$this->assign('customer',$data);
			$this->display();
		} else {
			
			//删除专家
			$User = M("customer");
			$result = $User->where("cid={$id}")->delete();
			
			//返回修改结果
			if($result){
				//录入成功
				$this->success('成功删除', I('post.http_referer'));
			} else {
				$this->error('删除失败');
			}
		}
	}
	
	//新增用户
	public function addcustomer() {
		//权限控制
		if(check_role(4, 'eq')) {
			$this->error('你没有权限进行此操作！');
		}
		
	    //目前所在页
	    $this->assign('onPage','customer_add');
		
		if(IS_POST){
			//获取所有post变量
			$all = I('post.');
			
			//预约方式不能为空
			if('' == $all['appoint_way']) {
				$this->error('预约方式不能为空！');
			}
			
			$User = M("customer"); // 实例化User对象
			$add['c_name'] = $all['c_name'];
			if('' == $all['sex']) {
			    $add['sex'] = 0;
			} else {
			    $add['sex'] = $all['sex'];
			}
			$add['age'] = $all['age'];
			$add['appoint_no'] = $all['appoint_no'];
			$add['tel'] = $all['tel'];
			$add['appoint_date'] = $all['appoint_date'];
			$add['appoint_time'] = $all['appoint_time'];
			$add['identity_id'] = $all['identity_id'];
			$add['address'] = $all['address'];
			$add['case'] = $all['case'];
			$add['detail'] = $all['detail'];
			$add['c_source'] = $all['c_source'];
			$add['appoint_way'] = $all['appoint_way'];
			$add['appoint_office'] = $all['appoint_office'];
			$add['appoint_doctor'] = $all['appoint_doctor'];
			$add['add_time'] = date("Y-m-d H:i:s" ,time());
			$add['input_group_id'] = I('cookie.thoa_group_id');
			$add['input_employee_id'] = I('cookie.thoa_uid');
			$add['input_employee_name'] = I('cookie.thoa_uname');
			
			//获取转诊的数据
			$DArea = M("areas");
			$Amap['area_id'] = array ('in', $all['province'].','.$all['city'].','.$all['district']);
			$arealist = $DArea->where($Amap)->select();
			//生成转诊字段的数据
			$add['transfer'] =
			$arealist[0][area_name].
			($arealist[1][area_name]?' - '.$arealist[1][area_name]:'').
			($arealist[2][area_name]?' - '.$arealist[2][area_name]:'');
			
			$result = $User->add($add);
			if($result){
				//录入成功
				$this->success('添加成功', I('post.http_referer'));
				
				/*记录到统计信息*/
				//判断是否是网络组录入资料
				if(1 == I('cookie.thoa_group_id')) {
					//添加日期+1
					check_time(date("Y-m-d" ,time()), 1);
					//预约日期+1
					check_time($all['appoint_date'], 2);
				}
				
			} else {
				$this->error('添加失败');
			}
			
		} else {
			
			//获取医生列表
			$DUser = D('doctors');
			$DData = $DUser->order('did asc')->select();
			$this->assign('dlist',$DData);
			
			//获取省级地区
            $province = D('areas' )-> where(array('parent_id'=>0))->order('or_no asc') ->select();
            $this->assign('province',$province);

			
			$this->display();
		}
	}
	
	//用户编辑页
	public function editcustomer($id){
		//权限控制
		if(!check_role(8, 'gt')) {
			$this->error('你没有权限进行此操作！');
		}
		
		//目前所在页
		$this->assign('onPage','customer_list');
		
		if(IS_POST){

			$EUpdate = M("customer");

			//获取所有post变量
			$all = I('post.');

			//预约方式不能为空
			if('' == $all['appoint_way']) {
				$this->error('预约方式不能为空！');
			}
			
			$edate['c_name'] = $all['c_name'];
			
			
			if('' == $all['sex']) {
			    $edate['sex'] = 0;
			} else {
			    $edate['sex'] = $all['sex'];
			}
			$edate['age'] = $all['age'];
			$edate['appoint_no'] = $all['appoint_no'];
			$edate['tel'] = $all['tel'];
			$edate['appoint_date'] = $all['appoint_date'];
			$edate['appoint_time'] = $all['appoint_time'];
			$edate['identity_id'] = $all['identity_id'];
			$edate['address'] = $all['address'];
			$edate['case'] = $all['case'];
			$edate['detail'] = $all['detail'];
			$edate['c_source'] = $all['c_source'];
			$edate['appoint_way'] = $all['appoint_way'];
			$edate['appoint_office'] = $all['appoint_office'];
			$edate['appoint_doctor'] = $all['appoint_doctor'];
			$edate['transfer'] = $all['transfer'];
			
			$result = $EUpdate->where("cid={$id}")->save($edate);

			if($result){
				//录入成功
				$this->success('修改成功', I('post.http_referer'));
			} else {
				$this->error('修改失败');
			}
		} else {
			//获取员工信息
		    $CUser = D('customer');
		    $cdata = $CUser->find($id);
		    $this->assign('clist',$cdata);
			
			//获取医生列表
			$DUser = D('doctors');
			$DData = $DUser->order('did asc')->select();
			$this->assign('dlist',$DData);
		    $this->display();
		}
		
	}
	
	//用户信息预览页
	public function view($id){
		//目前所在页
		$this->assign('onPage','customer_list');
		
		//获取员工信息
		$CUser = D('customer');
		$cdata = $CUser->find($id);
		$this->assign('clist',$cdata);
		
		$this->display();
	}
}