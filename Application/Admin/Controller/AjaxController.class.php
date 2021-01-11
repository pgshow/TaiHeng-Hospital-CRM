<?php
namespace Admin\Controller;
use Think\Controller;
class AjaxController extends Controller {
	function _initialize() {
		not_login();
	}
	
	//三级联动获取区域、医院、转诊医生数据
    public function getArea(){
        $where['parent_id']=I('param.areaId');
        $area=D('areas')->where($where)->select();
        $this->ajaxReturn($area);
    }
	
	//检查是否存在该电话
	public function checkTel(){
		if("" == I('param.tel')) {
			return false;
		}
		$where['tel']=I('param.tel');
        $tel=D('customer')->where($where)->select();
		if($tel) {
		    echo "该电话已存在！";
		}else{
			//echo "不存在";
		}
    }
	
	//检查是否存在该身份证号码
	public function checkIdentity(){
		if("" == I('param.identity_id')) {
			return false;
		}
		$where['identity_id']=I('param.identity_id');
        $tel=D('customer')->where($where)->select();
		if($tel) {
		    echo "该身份证号码已经存在！";
		}else{
			//echo "不存在";
		}
    }
	
	//更新就诊日期状态
	public function updateAppoint(){
		//医导才有权限修改
		if(!check_role(4, 'eq')) {
			die('无权限！');
		}
		
		$cid = I('get.cid');
		if("" == $cid) {
			return false;
		}
		//更新就诊日期
		$Update = M("customer");
		$up['visit_time'] = date("Y-m-d H:i:s" ,time());
		$up['input_guide'] = cookie('thoa_uname');;
		$result = $Update->where("cid={$cid}")->save($up);
		//返回修改结果
		if($result){
			//录入成功，返回时间
		    $User = D('customer');
		    $date = $User->find($cid);
			echo $date['visit_time'];
			
			/*记录到统计信息*/
			//判断是否是网络组录入的资料
			if(1 == $date['input_group_id']) {
				//来访+1
				check_time(date("Y-m-d" ,time()), 3);
				//电话预约的+1
				if('电话预约' == $date['appoint_way']) {
					check_time(date("Y-m-d" ,time()), 4);
				}
			}
			
		} else {
			echo '修改失败!';
		}
    }
	
	//更新健康卡号
	public function updateHealth(){
		//医导才有权限修改
		if(!check_role(4, 'eq')) {
			die('无权限！');
		}
		
		$cid = I('get.cid');
		if("" == $cid) {
			return false;
		}
		//更新健康卡号
		$Update = M("customer");
		$up['health_id'] = I('get.health_id');
		$result = $Update->where("cid={$cid}")->save($up);
		//返回修改结果
		$User = D('customer');
		$date = $User->find($cid);
		echo $date['health_id'];
    }
	
	//更新回访结果
	public function updateVisit(){
		//医导没有权限
		if(check_role(4, 'eq')) {
			die('无权限！');
		}
		
		$cid = I('get.cid');
		if("" == $cid) {
			return false;
		}
		//更新健康卡号
		$Update = M("customer");
		$up['return_visit'] = I('get.return_visit');
		$result = $Update->where("cid={$cid}")->save($up);
		//返回修改结果
		$User = D('customer');
		$date = $User->find($cid);
		echo $date['return_visit'];
    }
	
	//更新导医备注
	public function updateMark(){
		//医导才有权限修改
		if(!check_role(4, 'eq')) {
			die('无权限！');
		}
		
		$cid = I('get.cid');
		if("" == $cid) {
			return false;
		}
		//更新健康卡号
		$Update = M("customer");
		$up['patient_guide_mark'] = I('get.patient_guide_mark');
		$result = $Update->where("cid={$cid}")->save($up);
		//返回修改结果
		$User = D('customer');
		$date = $User->find($cid);
		echo $date['patient_guide_mark'];
    }
	
	//更改用户名称
	public function updateName(){
		$cid = I('get.cid');
		if("" == $cid) {
			return false;
		}
		
		if('' == I('get.c_name')) {
			echo '不能为空';
			return;
		}
		
		//获取用户以前的名字
		$User = D('customer');
		$date = $User->find($cid);
		$old_name = $date['c_name'];
		
		//更改用户名字
		$Update = M("customer");
		$up['c_name'] = I('get.c_name');
		$result1 = $Update->where("cid={$cid}")->save($up);
		
		//存储老用户名
		$up2['c_old_name'] = $old_name;
		$result2 = $Update->where("cid={$cid}")->save($up2);
		
		//只有两个字段都修改成功才返回结果
		if($result1 && $result2){
		    echo $old_name;
		}
    }
}