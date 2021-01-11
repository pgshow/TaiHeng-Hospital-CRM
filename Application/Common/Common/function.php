<?php
/*
 * 自定义公共函数
 */

/**
 * 检测用户是否登录
 * @返回参数 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $user = cookie('thoa_uid');
    if (empty($user)) {
        return 0;
    } else {
        return $user;
    }
}

function not_login(){
	if(!is_login()){
		header("Content-type:text/html;charset=utf-8");
		redirect('/', 2, '请先登录！');
	}
}

/*判断权限$condition
有两种条件：等于eq、或大于gt*/
function check_role($role, $condition){
	header("Content-type:text/html;charset=utf-8");
	
    $level = cookie('thoa_level');
	//判断权限是否相等
	if('eq' == $condition) {
		if($level != $role) {
			return false;
		}
	}
	if('gt' == $condition) {
		if(!($level >= $role)) {
			return false;
		}
	}
	
	return true;
}

//判断时间
/*
type是统计增加的字段，传值1-4分别对应字段
1 add_count
2 appoint_count
3 visit_count
4 tel_visit_count
*/
function check_time($addtime, $type)  {
	if('' == $addtime) {
		return false;
	}
	
	//将时间格式化为日期
	$the_date = date("Y-m-d", strtotime($addtime));
	
	$SUser = D('statistics');
	
	//先判断时间是否存在，不存在就增加该时间的记录
	$result = $SUser->find($the_date);
	if($result){
		switch ($type)
		{
			case 1:  //对应add_count字段
			  $rel = $SUser->where("date='{$the_date}'")->setInc('add_count');
			  break;
			case 2:  //对应appoint_count字段
			  $rel = $SUser->where("date='{$the_date}'")->setInc('appoint_count');
			  break;
			case 3:
			  $rel = $SUser->where("date='{$the_date}'")->setInc('visit_count');
			  break;
			case 4:
			  $rel = $SUser->where("date='{$the_date}'")->setInc('tel_visit_count');
			  break;
		}
	} else {
		$add_statistics['date'] = $the_date;
		
		switch ($type)
		{
			case 1:
			  $add_statistics['add_count'] = 1;
			  break;
			case 2:
			  $add_statistics['appoint_count'] = 1;
			  break;
			case 3:
			  $add_statistics['visit_count'] = 1;
			  break;
			case 4:
			  $add_statistics['tel_visit_count'] = 1;
			  break;
		}
		
		$SUser->add($add_statistics);
	}
}
?>