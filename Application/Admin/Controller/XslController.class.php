<?php
namespace Admin\Controller;
use Think\Controller;
class XslController extends Controller {
	function _initialize() {
		not_login();
	}

    public function daochu() {
		$Date = M('customer');
		
		//管理、领导、及导医除外，其他群组只能看到本群组录入资料
		if(!(check_role(8, 'gt') || check_role(4, 'eq'))) {
			$where['input_group_id'] = cookie('thoa_group_id');
		}
		
		//获取所有get变量
		$all = I('get.');
		
		if('search' == $all['adv']) {
			
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
				$where['c_name'] = array('like','%'.$all['c_name'].'%');
			}
			
			/*联系电话*/
			if('' != $all['tel']) {
				$where['tel'] = array('like','%'.$all['tel'].'%');
			}
			
		}
		
		//排序的变更
		switch (I('get.ord')) {
			//预约日期升序排序
			case 'appoint_date_asc':
			  $ord = 'appoint_date asc';
			  $map['appoint_date'] = array('neq', '0000-00-00');
			  break;
			//预约日期倒序排序
			case 'appoint_date_desc':
			  $ord = 'appoint_date desc';
			  $map['appoint_date'] = array('neq', '0000-00-00');
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
			  $map['visit_time'] = array('neq', '0000-00-00 00:00:00');
			  break;
			//到诊时间倒序排序
			case 'visit_time_desc':
			  $ord = 'visit_time desc';
			  $map['visit_time'] = array('neq', '0000-00-00 00:00:00');
			  break;
			  
			//默认排序
			default:
			  $ord = 'cid desc';
			  $map = $where;
		}
		
        $list = $Date->where($map)->order($ord)->select();

        if(!$list){
            $this->error('没有数据，无法导出');
        }
        $this->goods_export($list);
    }
	
    //导出数据方法
    protected function goods_export($goods_list=array())
    {
        //print_r($goods_list);exit;
        $goods_list = $goods_list;
        $data = array();
        foreach ($goods_list as $k=>$goods_info){
            $data[$k][id] = $goods_info['cid'];
            $data[$k][c_name] = $goods_info['c_name'];
			if(1 == $goods_info['sex']) {
				$sexT = '男';
			} elseif (2 == $goods_info['sex']) {
				$sexT = '女';
			}
            $data[$k][sex] = $sexT;
            $data[$k][age] = $goods_info['age'];
            $data[$k][tel]  = ' '.$goods_info['tel'];
			$data[$k][case0]  = ' '.$goods_info['case'];
            $data[$k][identity]  = ' '.$goods_info['identity_id'];
            $data[$k][appoint_no]  = $goods_info['appoint_no'];
            $data[$k][appoint_date] = $goods_info['appoint_date'];
            $data[$k][appoint_office] = $goods_info['appoint_office'];
			$data[$k][appoint_doctor] = $goods_info['appoint_doctor'];
			$data[$k][appoint_way] = $goods_info['appoint_way'];
			$data[$k][add_time] = $goods_info['add_time'];
			$data[$k][employee] = $goods_info['input_employee_name'];
			$data[$k][source] = $goods_info['c_source'];
			$transfers = explode(' - ',$goods_info['transfer']);
			$data[$k][transfer0] = $transfers[0];
			$data[$k][transfer1] = $transfers[1];
			$data[$k][transfer2] = $transfers[2];
			$data[$k][visit_time] = $goods_info['visit_time'];
			$data[$k][input_guide] = $goods_info['input_guide'];
			$data[$k][health_id] = $goods_info['health_id'];
        }

        //print_r($goods_list);
        //print_r($data);exit;

        foreach ($data as $field=>$v){
            if($field == 'id'){ $headArr[]='用户ID'; }
            if($field == 'c_name'){ $headArr[]='姓名'; }
            if($field == 'sex'){ $headArr[]='性别'; }
            if($field == 'age'){ $headArr[]='年龄'; }
            if($field == 'tel'){ $headArr[]='电话'; }
			if($field == 'case0'){ $headArr[]='病种'; }
            if($field == 'identity'){ $headArr[]='身份证'; }
            if($field == 'appoint_no'){ $headArr[]='预约号'; }
            if($field == 'appoint_date'){ $headArr[]='预约日期'; }
            if($field == 'appoint_office'){ $headArr[]='预约科室'; }
			if($field == 'appoint_doctor'){ $headArr[]='预约专家'; }
			if($field == 'appoint_way'){ $headArr[]='预约方式'; }
			if($field == 'add_time'){ $headArr[]='录入时间'; }
			if($field == 'employee'){ $headArr[]='备录人'; }
			if($field == 'source'){ $headArr[]='客户来源'; }
			if($field == 'transfer0'){ $headArr[]='转诊地区'; }
			if($field == 'transfer1'){ $headArr[]='转诊医院'; }
			if($field == 'transfer2'){ $headArr[]='转诊医生'; }
			if($field == 'visit_time'){ $headArr[]='到院时间'; }
			if($field == 'input_guide'){ $headArr[]='接待导医'; }
			if($field == 'health_id'){ $headArr[]='健康卡号'; }
        }

        $filename="customer";

        $this->getExcel($filename,$headArr,$data);
    }
	
	
	

    //筛选组导出功能
    public function daochu_filter() {
		$Date = M('customer');
		
		//获取所有get变量
		$all = I('get.');
		
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
		
        $list = $Date->where($map)->order($ord)->select();

        if(!$list){
            $this->error('没有数据，无法导出');
        }
        $this->filter_export($list);
    }
	
    //导出数据方法
    protected function filter_export($goods_list=array())
    {
        //print_r($goods_list);exit;
        $goods_list = $goods_list;
        $data = array();
        foreach ($goods_list as $k=>$goods_info){
            $data[$k][id] = $goods_info['cid'];
            $data[$k][c_name] = $goods_info['c_name'];
			if(1 == $goods_info['sex']) {
				$sexT = '男';
			} elseif (2 == $goods_info['sex']) {
				$sexT = '女';
			}
            $data[$k][sex] = $sexT;
            $data[$k][age] = $goods_info['age'];
            $data[$k][right_eye]  = ' '.$goods_info['right_eye'];
            $data[$k][left_eye]  = ' '.$goods_info['left_eye'];
            $data[$k][case0]  = $goods_info['case'];
            $data[$k][tel] = ' '.$goods_info['tel'];
            $data[$k][insurance] = $goods_info['insurance'];
			$data[$k][return_visit] = $goods_info['return_visit'];
			$data[$k][add_time] = $goods_info['add_time'];
			$data[$k][filter_address] = $goods_info['filter_address'];
        }

        //print_r($goods_list);
        //print_r($data);exit;

        foreach ($data as $field=>$v){
            if($field == 'id'){ $headArr[]='用户ID'; }
            if($field == 'c_name'){ $headArr[]='姓名'; }
            if($field == 'sex'){ $headArr[]='性别'; }
            if($field == 'age'){ $headArr[]='年龄'; }
            if($field == 'right_eye'){ $headArr[]='右眼'; }
            if($field == 'left_eye'){ $headArr[]='左眼'; }
            if($field == 'case0'){ $headArr[]='眼部情况'; }
            if($field == 'tel'){ $headArr[]='联系电话'; }
            if($field == 'insurance'){ $headArr[]='有无医保'; }
			if($field == 'return_visit'){ $headArr[]='回访情况'; }
			if($field == 'add_time'){ $headArr[]='添加时间'; }
			if($field == 'filter_address'){ $headArr[]='筛选地址'; }
        }

        $filename="filter";

        $this->getExcel($filename,$headArr,$data);
    }



    private  function getExcel($fileName,$headArr,$data){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $date = time();
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
}

