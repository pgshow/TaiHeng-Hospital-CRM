<?php
namespace Admin\Controller;
use Think\Controller;
class StatisticsController extends Controller {
	function _initialize() {
		not_login();
	}
	
    public function index(){
		//目前所在页
		$this->assign('onPage','statistics');
		
		//统计各项数据
		$Date = M("statistics");
		
		//生成日期
		$today = date('Y-m-d');  //今天
		$yesterday = date("Y-m-d", strtotime("1 days ago"));  //昨天
		$month_begin = date('Y-m-01');  //当月1号
		$sexty_begin = date("Y-m-d", strtotime("2 month ago"));  //60天前的日期
		
		$this->assign('today',$today);
		
		//查询当天的数据
		$where_today['date'] = $today;
		$today_array = $Date->where($where_today)->select();
		$percent_today = 100*($today_array[0][visit_count] / $today_array[0][appoint_count]);
		
		$this->assign('today_array',$today_array);
		$this->assign('percent_today',$percent_today);
		
		
		//查询昨天的数据
		$where_yesterday['date'] = $yesterday;
		$yesterday_array = $Date->where($where_yesterday)->select();
		$percent_yesterday = 100*($yesterday_array[0][visit_count] / $yesterday_array[0][appoint_count]);
		
		$this->assign('yesterday_array',$yesterday_array);
		$this->assign('percent_yesterday',$percent_yesterday);
		
		//查询本月的数据
		$where_month['date'] = array('between', $month_begin.','.$today);
		$month_add = $Date->where($where_month)->sum('add_count');  //当月添加
		$month_appint = $Date->where($where_month)->sum('appoint_count');  //当月预到
		$month_visit = $Date->where($where_month)->sum('visit_count');  //当月到院
		$month_tel_visit = $Date->where($where_month)->sum('tel_visit_count');  //当月电话预约到诊
		$percent_month = 100*($month_visit / $month_appint); //当月预约到诊率
		
		$this->assign('month_add',$month_add);
		$this->assign('month_appint',$month_appint);
		$this->assign('month_visit',$month_visit);
		$this->assign('month_tel_visit',$month_tel_visit);
		$this->assign('percent_month',$percent_month);
		
		
		//查询近60天的数据
		$where_60days['date'] = array('between',$sexty_begin.','.$today);
		$sexty_days = $Date->where($where_60days)->select();
		
		$this->assign('sexty_days',$sexty_days);
		
		//登陆首页
		$this->display();
    }

}