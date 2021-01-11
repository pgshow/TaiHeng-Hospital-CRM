<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="zh-CN">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="zh-CN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>客户列表 - 泰恒客户管理系统</title>
<script type="text/javascript">
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
var ajaxurl = '/test/wp-admin/admin-ajax.php',
	pagenow = 'users',
	typenow = '',
	adminpage = 'users-php',
	thousandsSeparator = ',',
	decimalPoint = '.',
	isRtl = 0;
</script>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='stylesheet' href='/Public/css/load-styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='open-sans-css'  href='//fonts.useso.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.2.2' type='text/css' media='all' />
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='/Public/css/ie.min.css' type='text/css' media='all' />
<![endif]-->		
<script type='text/javascript'>
/* <![CDATA[ */
var userSettings = {"url":"/test/","uid":"1","time":"1435128498","secure":""};/* ]]> */
</script>
<script type='text/javascript' src='/Public/js/load-scripts.js'></script>
<script type="text/javascript">var _wpColorScheme = {"icons":{"base":"#999","focus":"#00a0d2","current":"#fff"}};</script>
	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, document.getElementById( 'wp-admin-canonical' ).href + window.location.hash );
		}
	</script>
<style type="text/css" media="print">#wpadminbar { display:none; }</style>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/Public/js/ajax.js"></script>
</head>
<body class="wp-admin wp-core-ui no-js  users-php admin-bar branch-4-2 version-4-2-2 admin-color-midnight locale-zh-cn no-customize-support no-svg">
<script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
</script>

	<script type="text/javascript">
		(function() {
			var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');

			request = true;

			b[c] = b[c].replace( rcs, ' ' );
			b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
		}());
	</script>
<script type="text/javascript">
//隐藏表单里的预约日期和就诊日期
$(function(){
  $(":radio[name=is_apponit]").click(function(){
	  if('yes' == $(this).val()) {
		  $("#appoint_date_tr").show();
	  } else if('no' == $(this).val()) {
		  $("#appoint_date_tr").hide();
	  }
  });
  $(":radio[name=visited]").click(function(){
	  if('yes' == $(this).val()) {
		  $("#visit_time_tr").show();
	  } else if('no' == $(this).val()) {
		  $("#visit_time_tr").hide();
	  }
  });

 });
 
//点击复选框更新日期
var ajax_url_update_appoint="<?php echo U('Ajax/updateAppoint');?>";
//更新就诊卡号
var ajax_url_update_health="<?php echo U('Ajax/updateHealth');?>";
//更新回访结果
var ajax_url_update_visit="<?php echo U('Ajax/updateVisit');?>";
//更新导医备注
var ajax_url_update_mark="<?php echo U('Ajax/updateMark');?>";
//更改用户名字
var ajax_url_update_name="<?php echo U('Ajax/updateName');?>";

</script>
<div id="wpwrap">

<div id="adminmenumain" role="navigation" aria-label="主页">
<a href="#wpbody-content" class="screen-reader-shortcut">跳至主内容</a>
<a href="#wp-toolbar" class="screen-reader-shortcut">跳至工具栏</a>
<div id="adminmenuback"></div>
<div id="adminmenuwrap">
<ul id="adminmenu">
<!--管理员和网络组才显示下列项目 BEGIN-->
<?php if(($_COOKIE['thoa_level']>= 8) OR ($_COOKIE['thoa_level']== 1)): if(($onPage == 'statistics')): ?><li class="wp-first-item wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard menu-top-last" id="menu-dashboard">
	<a href='<?php echo U('/Admin/Statistics/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-top-first menu-icon-dashboard menu-top-last" aria-haspopup="true">
    <div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image dashicons-before dashicons-dashboard'><br /></div><div class='wp-menu-name'>统计</div></a></li>
    <?php else: ?>
    <li class="wp-first-item wp-has-submenu wp-not-current-submenu menu-top menu-top-first menu-icon-dashboard menu-top-last" id="menu-dashboard">
	<a href='<?php echo U('/Admin/Statistics/index');?>' class="wp-first-item wp-has-submenu wp-not-current-submenu menu-top menu-top-first menu-icon-dashboard menu-top-last" aria-haspopup="true">
    <div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image dashicons-before dashicons-dashboard'><br /></div><div class='wp-menu-name'>统计</div></a></li><?php endif; endif; ?>
<!--管理员和网络组才显示下列项目 END-->
    
    
	<li class="wp-not-current-submenu wp-menu-separator" aria-hidden="true"><div class="separator"></div></li>
    
<?php if(($onPage == 'customer_list') OR ($onPage == 'customer_add') ): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="menu-users">
	<a href='<?php echo U('/Admin/Index/admin');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" >
<?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" id="menu-users">
	<a href='<?php echo U('/Admin/Index/admin');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" aria-haspopup="true"><?php endif; ?>
      <div class="wp-menu-arrow">
        <div></div>
      </div>
      <div class='wp-menu-image dashicons-before dashicons-admin-users'>
      <br />
      </div><div class='wp-menu-name'>客户</div>
    </a>
	<ul class='wp-submenu wp-submenu-wrap'>
      <li class='wp-submenu-head'>客户</li>
    <?php if(($onPage == 'customer_list')): ?><li class="wp-first-item current"><a href='<?php echo U('/Admin/Index/admin');?>'>所有客户</a></li>
    <?php else: ?>
      <li class="wp-first-item"><a href='<?php echo U('/Admin/Index/admin');?>'>所有客户</a></li><?php endif; ?>
    
    <?php if(($onPage == 'customer_add')): ?><li class="current"><a href='<?php echo U('/Admin/Index/addcustomer');?>'>添加客户</a></li>
    <?php else: ?>
      <li><a href='<?php echo U('/Admin/Index/addcustomer');?>'>添加客户</a></li><?php endif; ?>
    </ul>
    </li>
    
        
    
	<li class="wp-not-current-submenu wp-menu-separator" aria-hidden="true"><div class="separator"></div></li>
    
<?php if(($onPage == 'filter_list') OR ($onPage == 'filter_add') ): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="menu-users">
	<a href='<?php echo U('/Admin/Filter/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" >
<?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" id="menu-users">
	<a href='<?php echo U('/Admin/Filter/index');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" aria-haspopup="true"><?php endif; ?>
      <div class="wp-menu-arrow">
        <div></div>
      </div>
      <div class='wp-menu-image dashicons-before dashicons-admin-comments'>
      <br />
      </div><div class='wp-menu-name'>筛查</div>
    </a>
	<ul class='wp-submenu wp-submenu-wrap'>
      <li class='wp-submenu-head'>筛查</li>
    <?php if(($onPage == 'filter_list')): ?><li class="wp-first-item current"><a href='<?php echo U('/Admin/Filter/index');?>'>所有患者</a></li>
    <?php else: ?>
      <li class="wp-first-item"><a href='<?php echo U('/Admin/Filter/index');?>'>所有患者</a></li><?php endif; ?>
    
    <?php if(($onPage == 'filter_add')): ?><li class="current"><a href='<?php echo U('/Admin/Filter/add');?>'>添加患者</a></li>
    <?php else: ?>
      <li><a href='<?php echo U('/Admin/Filter/add');?>'>添加患者</a></li><?php endif; ?>
    </ul>
    </li>
    
<!--管理员才显示下列项目 BEGIN-->
<?php if(($_COOKIE['thoa_level']>= 8)): ?><li class="wp-not-current-submenu wp-menu-separator" aria-hidden="true"><div class="separator"></div></li>
    
<?php if(($onPage == 'employee_list') OR ($onPage == 'employee_add') ): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="menu-users">
	<a href='<?php echo U('/Admin/Employee/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" >
<?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" id="menu-users">
	<a href='<?php echo U('/Admin/Employee/index');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" aria-haspopup="true"><?php endif; ?>
      <div class="wp-menu-arrow">
        <div></div>
      </div>
      <div class='wp-menu-image dashicons-before dashicons-admin-settings'>
      <br />
      </div><div class='wp-menu-name'>员工</div>
    </a>
	<ul class='wp-submenu wp-submenu-wrap'>
      <li class='wp-submenu-head'>员工</li>
    <?php if(($onPage == 'employee_list')): ?><li class="wp-first-item current"><a href='<?php echo U('/Admin/Employee/index');?>'>所有员工</a></li>
    <?php else: ?>
      <li class="wp-first-item"><a href='<?php echo U('/Admin/Employee/index');?>'>所有员工</a></li><?php endif; ?>
    
    <?php if(($onPage == 'employee_add')): ?><li class="current"><a href='<?php echo U('/Admin/Employee/addemployee');?>'>新增员工</a></li>
    <?php else: ?>
      <li><a href='<?php echo U('/Admin/Employee/addemployee');?>'>新增员工</a></li><?php endif; ?>
    </ul>
    </li>
    
    
	<li class="wp-not-current-submenu wp-menu-separator" aria-hidden="true"><div class="separator"></div></li>
    
<?php if(($onPage == 'doctor_list') OR ($onPage == 'doctor_add') ): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="menu-users">
	<a href='<?php echo U('/Admin/Doctor/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" >
<?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" id="menu-users">
	<a href='<?php echo U('/Admin/Doctor/index');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" aria-haspopup="true"><?php endif; ?>
      <div class="wp-menu-arrow">
        <div></div>
      </div>
      <div class='wp-menu-image dashicons-before dashicons-admin-post'>
      <br />
      </div><div class='wp-menu-name'>专家</div>
    </a>
	<ul class='wp-submenu wp-submenu-wrap'>
      <li class='wp-submenu-head'>专家</li>
    <?php if(($onPage == 'doctor_list')): ?><li class="wp-first-item current"><a href='<?php echo U('/Admin/Doctor/index');?>'>所有专家</a></li>
    <?php else: ?>
      <li class="wp-first-item"><a href='<?php echo U('/Admin/Doctor/index');?>'>所有专家</a></li><?php endif; ?>
    
    <?php if(($onPage == 'doctor_add')): ?><li class="current"><a href='<?php echo U('/Admin/Doctor/adddoctor');?>'>新增专家</a></li>
    <?php else: ?>
      <li><a href='<?php echo U('/Admin/Doctor/adddoctor');?>'>新增专家</a></li><?php endif; ?>
    </ul>
    </li>
    
    
    	<li class="wp-not-current-submenu wp-menu-separator" aria-hidden="true"><div class="separator"></div></li>
    
<?php if(($onPage == 'transfer_list') OR ($onPage == 'transfer_add') ): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="menu-users">
	<a href='<?php echo U('/Admin/Doctor/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" >
<?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" id="menu-users">
	<a href='<?php echo U('/Admin/Transfer/index');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-settings" aria-haspopup="true"><?php endif; ?>
      <div class="wp-menu-arrow">
        <div></div>
      </div>
      <div class='wp-menu-image dashicons-before dashicons-admin-page'>
      <br />
      </div><div class='wp-menu-name'>转诊</div>
    </a>
	<ul class='wp-submenu wp-submenu-wrap'>
      <li class='wp-submenu-head'>转诊</li>
    <?php if(($onPage == 'transfer_list')): ?><li class="wp-first-item current"><a href='<?php echo U('/Admin/Transfer/index');?>'>转诊医生</a></li>
    <?php else: ?>
      <li class="wp-first-item"><a href='<?php echo U('/Admin/Transfer/index');?>'>转诊医生</a></li><?php endif; ?>
    
    <?php if(($onPage == 'transfer_add')): ?><li class="current"><a href='<?php echo U('/Admin/Transfer/addtransfer');?>'>新增医生</a></li>
    <?php else: ?>
      <li><a href='<?php echo U('/Admin/Transfer/addtransfer');?>'>新增医生</a></li><?php endif; ?>
    </ul>
    </li><?php endif; ?>
<!--管理员才显示下列项目 END-->
    
    <?php if(($onPage == 'change_pass')): ?><li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" id="toplevel_page_all-in-one-seo-pack-aioseop_class"><a href='<?php echo U('/Admin/Password/index');?>' class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-users" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image dashicons-before dashicons-admin-generic'><br /></div><div class='wp-menu-name'>修改密码</div></a></li>
    <?php else: ?>
    <li class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-generic toplevel_page_all-in-one-seo-pack/aioseop_class" id="toplevel_page_all-in-one-seo-pack-aioseop_class"><a href='<?php echo U('/Admin/Password/index');?>' class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-generic toplevel_page_all-in-one-seo-pack/aioseop_class" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image dashicons-before dashicons-admin-generic'><br /></div><div class='wp-menu-name'>修改密码</div></a></li><?php endif; ?>
    
    <li id="collapse-menu" class="hide-if-no-js"><div id="collapse-button"><div></div></div><span>收起菜单</span></li>
    
</ul>
</div>
</div>

<div id="wpcontent">

<div id="wpadminbar" class="nojq nojs">
						<div class="quicklinks" id="wp-toolbar" role="navigation" aria-label="工具栏" tabindex="0">
				<ul id="wp-admin-bar-root-default" class="ab-top-menu">
		<li id="wp-admin-bar-menu-toggle"><a class="ab-item"  href="http://oa.th023.com/"><span class="ab-icon"></span><span class="screen-reader-text">菜单</span></a>		</li>
		<li id="wp-admin-bar-wp-logo" class="menupop"><a class="ab-item"  aria-haspopup="true" href="http://oa.th023.com/"><span class="ab-icon"></span><span class="screen-reader-text">关于泰恒</span></a>		</li>
		<li id="wp-admin-bar-site-name" class="menupop"><a class="ab-item"  aria-haspopup="true" href="http://oa.th023.com/">泰恒OA</a><div class="ab-sub-wrapper"></div>		</li></ul><ul id="wp-admin-bar-top-secondary" class="ab-top-secondary ab-top-menu">
		<li id="wp-admin-bar-my-account" class="menupop with-avatar"><a class="ab-item"  aria-haspopup="true" href="#">您好，<?php echo (cookie('thoa_uname')); ?><img alt='' src='/Public/images/face1.png' srcset='/Public/images/face1.png' class='avatar avatar-26 photo' height='26' width='26' /></a><div class="ab-sub-wrapper"><ul id="wp-admin-bar-user-actions" class="ab-submenu">
		<li id="wp-admin-bar-user-info"><a class="ab-item" tabindex="-1" href="#"><img alt='' src='/Public/images/face2.png' srcset='/Public/images/face2.png' class='avatar avatar-64 photo' height='64' width='64' /><span class='display-name'><?php echo (cookie('thoa_uname')); ?></span><span class='username'><?php echo (cookie('thoa_ulogin')); ?></span></a>		</li>
		<li id="wp-admin-bar-logout"><a class="ab-item"  href="<?php echo U('login/logout');?>">登出</a>		</li></ul></div>		</li></ul>			</div>
						<a class="screen-reader-shortcut" href="<?php echo U('login/logout');?>">登出</a>
</div>
		
<div id="wpbody" role="main">

<div id="wpbody-content" aria-label="主内容" tabindex="0">
		<div id="screen-meta" class="metabox-prefs">
				<div id="screen-options-wrap" class="hidden" tabindex="-1" aria-label="“显示选项”选项卡">
		<form id="adv-settings" method="get" action="<?php echo U('admin');?>">
					<h5>请输入查询条件</h5>
					<div class="metabox-prefs">
<table class="form-table">
	<tr class="form-field">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="is_apponit">确定日期</label></th>
		<td style="padding-top:5px;padding-bottom:5px;"><input name="is_apponit" type="radio" style="width:auto;" value="yes">是　<input name="is_apponit" type="radio" value="no" style="width:auto;">否</td>
	</tr>
	<tr class="form-field" id="appoint_date_tr" style="display:none;">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="appoint_date1">预约日期</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;">从 <input name="appoint_date1" type="date" id="appoint_date1" value="" style="width:auto;" /> 至 <input name="appoint_date2" type="date" id="appoint_date2" value="" style="width:auto;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="visited">是否来院</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="visited" type="radio" value="yes" style="width:auto;">是　<input name="visited" type="radio" value="no" style="width:auto;">否</td>
	  </tr>
	<tr class="form-field" id="visit_time_tr" style="display:none;">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="visit_time1">就诊日期</label></th>
		<td style="padding-top:5px;padding-bottom:5px;">从 <input name="visit_time1" type="date" id="visit_time1" value="" style="width:auto;" /> 至 <input name="visit_time2" type="date" id="visit_time2" value="" style="width:auto;" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="add_time">提交时间</label></th>
		<td style="padding-top:5px;padding-bottom:5px;">从 <input name="add_time1" type="date" id="add_time1" value="" style="width:auto;" /> 至 <input name="add_time2" type="date" id="add_time2" value="" style="width:auto;" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="input_employee">报备人</label></th>
		<td style="padding-top:5px;padding-bottom:5px;"><input name="input_employee" type="text" id="input_employee" style="width:355px;" /></td>
	</tr>
	<tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="appoint_no">预约号</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="appoint_no" type="text" id="appoint_no" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="case">病种</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="case" type="text" id="case" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="appoint_office">预约科室</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><select name="appoint_office" id="appoint_office">
		  <option value="" selected>-请选择-</option>
		  <option value='近视专科'>近视专科</option>
		  <option value='白内障科'>白内障科</option>
		  <option value='屈光不正'>屈光不正</option>
		  <option value='青光眼科'>青光眼科</option>
		  <option value='斜弱视科'>斜弱视科</option>
          <option value='眼底病科'>眼底病科</option>
          <option value='泪道病科'>泪道病科</option>
          <option value='角膜病科'>角膜病科</option>
          <option value='眼表病科'>眼表病科</option>
          <option value='眼眶病科'>眼眶病科</option>
          <option value='眼外伤科'>眼外伤科</option>
          <option value='视疲劳科'>视疲劳科</option>
          <option value='低视力科'>低视力科</option>
          <option value='医学验配'>医学验配</option>
          <option value='眼整形科'>眼整形科</option>
          <option value='综合病科'>综合病科</option>
          <option value='其它科室'>其它科室</option>
		  </select></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="appoint_doctor">预约专家</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><select name="appoint_doctor" id="appoint_doctor">
		  <option value="" selected>-请选择-</option>
          <?php if(is_array($dlist)): $i = 0; $__LIST__ = $dlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vod): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vod["doctor_name"]); ?>'><?php echo ($vod["doctor_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		  </select></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="appoint_way">预约方式</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><select name="appoint_way" id="appoint_way">
		  <option value="" selected>-请选择-</option>
		  <option value='商务通 baidu'>商务通 baidu</option>
		  <option value='商务通 haosou'>商务通 haosou</option>
		  <option value='商务通 sougou'>商务通 sougou</option>
          <option value='商务通 seo'>商务通 seo</option>
		  <option value='电话预约'>电话预约</option>
          <option value='网医转诊'>网医转诊</option>
          <option value='现场筛查'>现场筛查</option>
          <option value='QQ预约'>QQ预约</option>
          <option value='微信预约'>微信预约</option>
          <option value='网上预约'>网上预约</option>
          <option value='商桥预约'>商桥预约</option>
          <option value='短信预约'>短信预约</option>
          <option value='外网预约'>外网预约</option>
          <option value='团购预约'>团购预约</option>
          <option value='留言预约'>留言预约</option>
          <option value='其它预约'>其它预约</option>
		  </select></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="c_source">患者来源</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><select name="c_source" id="c_source">
		  <option value="" selected>-请选择-</option>
		  <option value='百度推广'>百度推广</option>
		  <option value='好搜推广'>好搜推广</option>
		  <option value='搜狗推广'>搜狗推广</option>
          <option value='医生介绍'>医生介绍</option>
          <option value='现场筛查'>现场筛查</option>
		  <option value='官方微信'>官方微信</option>
          <option value='腾讯QQ'>腾讯QQ</option>
          <option value='朋友介绍'>朋友介绍</option>
          <option value='品牌口碑'>品牌口碑</option>
          <option value='自然优化'>自然优化</option>
          <option value='网上留言'>网上留言</option>
          <option value='外推媒体'>外推媒体</option>
          <option value='商家团购'>商家团购</option>
          <option value='外网友链'>外网友链</option>
          <option value='高校巡展'>高校巡展</option>
          <option value='平面报纸'>平面报纸</option>
          <option value='平面杂志'>平面杂志</option>
          <option value='电视媒体'>电视媒体</option>
          <option value='网络媒体'>网络媒体</option>
          <option value='户外广告'>户外广告</option>
          <option value='社区广告'>社区广告</option>
          <option value='其它渠道'>其它渠道</option>
		  </select></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="transfer">区域</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="transfer" type="text" id="transfer" placeholder="地区、医院、转诊医生" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="is_apponit">姓名条件</label></th>
		<td style="padding-top:5px;padding-bottom:5px;"><input name="name_type" type="radio" style="width:auto;" value="name" checked>姓名　<input name="name_type" type="radio" value="old_name" style="width:auto;">曾用名</td>
	</tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="c_name">患者姓名</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="c_name" type="text" id="c_name" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="tel">联系电话</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="tel" type="text" id="tel" style="width:355px;" /></td>
	  </tr>
	</table>
<p class="submit" style="text-align:center;">
<input name="adv" type="hidden" value="search">
<input type="submit" name="createuser" id="createusersub" class="button button-primary" value="搜索"  /></p>
			</div>
		</form>
		</div>
				</div>
                
                <div id="screen-meta-links">
					<div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
			<a href="#screen-options-wrap" id="show-settings-link" class="show-settings" aria-controls="screen-options-wrap" aria-expanded="false">高级搜索</a>
			</div>
				</div>
				
<div class="wrap">
<h2>
用户	<a href="<?php echo U('index/addcustomer');?>" class="add-new-h2">添加用户</a>
</h2>

<ul class='subsubsub'>
	<li class='all'><a href='<?php echo U('admin');?>' class="current">全部<span class="count">（<?php echo ($customerCount); ?>）</span></a></li>
</ul>
<form method="get" action="<?php echo U('admin');?>">

	<div class="tablenav top">
	<div class="alignleft actions" style="display:none;">
				<label class="screen-reader-text" for="new_role">将角色变更为&hellip;</label>
		<select name="new_role" id="new_role">
			<option value="">将角色变更为&hellip;</option>
			
	<option value='subscriber'>订阅者</option>
	<option value='contributor'>投稿者</option>
	<option value='author'>作者</option>
	<option value='editor'>编辑</option>
	<option value='administrator'>管理员</option>		</select>
	<input type="submit" name="changeit" id="changeit" class="button" value="更改"  /></div><div class='tablenav-pages'><?php echo ($page); ?></div>

		<br class="clear" />
	</div>
<table class="wp-list-table widefat fixed striped users">
	<thead>
	<tr>
        <th scope='col' class='manage-column column-uname'>姓名</th>
        <th scope='col' class='manage-column column-uname'>曾用名</th>
        <th scope='col' class='manage-column column-telnum'>电话</th>
        <th scope='col' class='manage-column column-kind'>病种</th>
        <?php if(($_GET['ord'] == 'appoint_date_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-cdate sortable asc"><a href="<?php echo U('admin?ord=appoint_date_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>预约日期</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-cdate sortable desc"><a href="<?php echo U('admin?ord=appoint_date_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>预约日期</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-baobeiren'>报备人</th>
        <?php if(($_GET['ord'] == 'add_time_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-ctime sortable asc"><a href="<?php echo U('admin?ord=add_time_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>提交时间</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-ctime sortable desc"><a href="<?php echo U('admin?ord=add_time_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>提交时间</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-yuyuefs'>预约方式</th>
        <th scope='col' class='manage-column column-yuyuezj'>预约专家</th>
        <th scope='col' class='manage-column column-yuyueks'>预约科室</th>
        <th scope='col' class='manage-column column-daoyuan'>是否到院</th>
        <?php if(($_GET['ord'] == 'visit_time_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-ctime sortable asc"><a href="<?php echo U('admin?ord=visit_time_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>就诊时间</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-ctime sortable desc"><a href="<?php echo U('admin?ord=visit_time_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>就诊时间</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-jzcard'>就诊卡号</th>
        <th scope='col' class='manage-column column-yuyuehao'>预约号</th>
        <th scope='col' class='manage-column column-daoyibeizhu'>导医备注</th>
        <th scope='col' class='manage-column column-huifangjg'>回访结果</th>
        <th scope='col' class='manage-column column-identity'>病情描述</th>
        <th scope='col' class='manage-column column-zhuanzhenys'>区域/转诊/医生</th>
        <th scope='col' class='manage-column column-yuyuefs'>患者来源</th>
	</tr>
    </thead>

	<tbody id="the-list" data-wp-lists='list:user'>
    
<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr id='user-<?php echo ($vo1["cid"]); ?>'>
    <td class="ctext-left" id="chnam<?php echo ($vo1["cid"]); ?>"><strong><a href="<?php echo U('Index/view');?>?id=<?php echo ($vo1["cid"]); ?>" target="_blank">
    <?php if(($vo1["c_name"] != '')): echo ($vo1["c_name"]); ?>
    <?php else: ?>
    　　<?php endif; ?>
    </a></strong><br /><div class="row-actions"><span class='edit'><a href="<?php echo U('Index/editcustomer');?>?id=<?php echo ($vo1["cid"]); ?>">编辑</a> | </span><span class='delete'><a class='submitdelete' href='<?php echo U('Index/delcustomer');?>?id=<?php echo ($vo1["cid"]); ?>'>删除</a></span></div></td>
    <td class="ctext-left" id="chna<?php echo ($vo1["cid"]); ?>" onclick="change_name(this,<?php echo ($vo1["cid"]); ?>)"><?php echo ($vo1["c_old_name"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["tel"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["case"]); ?></td>
    <td class="ctext-left">
    <?php echo ($vo1["appoint_date"]); ?><br />
    <?php if(($vo1["appoint_time"] != '')): ?>大约 <?php echo ($vo1["appoint_time"]); ?> 点<?php endif; ?>
    </td>
    <td class="ctext-left"><?php echo ($vo1["input_employee_name"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["add_time"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["appoint_way"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["appoint_doctor"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["appoint_office"]); ?></td>
    <?php if($vo1["visit_time"] == '0000-00-00 00:00:00'): ?><td class="ctext-middle"><input onClick="checkJump('<?php echo ($vo1["cid"]); ?>');" id='chk<?php echo ($vo1["cid"]); ?>' type="checkbox" /><br /><span style="color:#999"><?php echo ($vo1["input_guide"]); ?></span></td>
    <td class="ctext-left" id="appointResult<?php echo ($vo1["cid"]); ?>">0000-00-00 00:00:00</td>
    <?php else: ?>
    <td class="ctext-middle"><input type="checkbox" checked disabled /><br><span style="color:#999"><?php echo ($vo1["input_guide"]); ?></span></td>
    <td class="ctext-left" id="appointResult<?php echo ($vo1["cid"]); ?>" style="color:#F00"><?php echo ($vo1["visit_time"]); ?></td><?php endif; ?>
    <td class="ctext-left" id="chkh<?php echo ($vo1["cid"]); ?>" onclick="checkkhNote(this,<?php echo ($vo1["cid"]); ?>)"><?php echo ($vo1["health_id"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["appoint_no"]); ?></td>
    <td class="ctext-left" id="chkm<?php echo ($vo1["cid"]); ?>" onclick="checkmkNote(this,<?php echo ($vo1["cid"]); ?>)"><?php echo ($vo1["patient_guide_mark"]); ?></td>
    <td class="ctext-left" id="chkv<?php echo ($vo1["cid"]); ?>" onclick="checkrvNote(this,<?php echo ($vo1["cid"]); ?>)"><?php echo ($vo1["return_visit"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["detail"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["transfer"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["c_source"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
    </tbody>
	<tfoot>
	<tr>
        <th scope='col' class='manage-column column-uname'>姓名</th>
        <th scope='col' class='manage-column column-uname'>曾用名</th>
        <th scope='col' class='manage-column column-telnum'>电话</th>
        <th scope='col' class='manage-column column-kind'>病种</th>
        <?php if(($_GET['ord'] == 'appoint_date_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-cdate sortable asc"><a href="<?php echo U('admin?ord=appoint_date_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>预约日期</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-cdate sortable desc"><a href="<?php echo U('admin?ord=appoint_date_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>预约日期</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-baobeiren'>报备人</th>
        <?php if(($_GET['ord'] == 'add_time_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-ctime sortable asc"><a href="<?php echo U('admin?ord=add_time_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>提交时间</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-ctime sortable desc"><a href="<?php echo U('admin?ord=add_time_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>提交时间</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-yuyuefs'>预约方式</th>
        <th scope='col' class='manage-column column-yuyuezj'>预约专家</th>
        <th scope='col' class='manage-column column-yuyueks'>预约科室</th>
        <th scope='col' class='manage-column column-daoyuan'>是否到院</th>
        <?php if(($_GET['ord'] == 'visit_time_desc') OR ($_GET['ord'] == '') ): ?><th scope="col" class="manage-column column-ctime sortable asc"><a href="<?php echo U('admin?ord=visit_time_asc' ,array('keyword'=>$_GET['keyword']));?>"><span>就诊时间</span><span class="sorting-indicator"></span></a></th>
        <?php else: ?>
        <th scope="col" class="manage-column column-ctime sortable desc"><a href="<?php echo U('admin?ord=visit_time_desc' ,array('keyword'=>$_GET['keyword']));?>"><span>就诊时间</span><span class="sorting-indicator"></span></a></th><?php endif; ?>
        <th scope='col' class='manage-column column-jzcard'>就诊卡号</th>
        
        <th scope='col' class='manage-column column-yuyuefs'>预约号</th>
        <th scope='col' class='manage-column column-daoyibeizhu'>导医备注</th>
        <th scope='col' class='manage-column column-huifangjg'>回访结果</th>
        <th scope='col' class='manage-column column-identity'>病情描述</th>
        <th scope='col' class='manage-column column-zhuanzhenys'>区域/转诊/医生</th>
        <th scope='col' class='manage-column column-yuyuefs'>患者来源</th>
	</tr>
    </tfoot>

</table>
	<div class="tablenav bottom">

		<div class="alignleft actions" style="display:none;">
				<label class="screen-reader-text" for="new_role">将角色变更为&hellip;</label>
		<select name="new_role" id="new_role">
			<option value="">将角色变更为&hellip;</option>
			
	<option value='subscriber'>订阅者</option>
	<option value='contributor'>投稿者</option>
	<option value='author'>作者</option>
	<option value='editor'>编辑</option>
	<option value='administrator'>管理员</option>		</select>
	<input type="submit" name="changeit" id="changeit" class="button" value="更改"  /></div>
<div class='tablenav-pages'><?php echo ($page); ?></div>
		<br class="clear" />
	</div>
</form>

<br class="clear" /><input type="button" onclick="window.open('<?php echo U('Xsl/daochu');?>?adv=<?php echo ($all['adv']); ?>&is_apponit=<?php echo ($all['is_apponit']); ?>&appoint_date1=<?php echo ($all['appoint_date1']); ?>&appoint_date2=<?php echo ($all['appoint_date2']); ?>&visited=<?php echo ($all['visited']); ?>&visit_time1=<?php echo ($all['visit_time1']); ?>&visit_time2=<?php echo ($all['visit_time2']); ?>&add_time1=<?php echo ($all['add_time1']); ?>&add_time2=<?php echo ($all['add_time2']); ?>&input_employee=<?php echo ($all['input_employee']); ?>&appoint_no=<?php echo ($all['appoint_no']); ?>&case=<?php echo ($all['case']); ?>&appoint_office=<?php echo ($all['appoint_office']); ?>&appoint_doctor=<?php echo ($all['appoint_doctor']); ?>&appoint_way=<?php echo ($all['appoint_way']); ?>&c_source=<?php echo ($all['c_source']); ?>&transfer=<?php echo ($all['transfer']); ?>&c_name=<?php echo ($all['c_name']); ?>&tel=<?php echo ($all['tel']); ?>&ord=<?php echo ($all['ord']); ?>')" value="导出">
</div>

<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter" role="contentinfo">
		<p id="footer-left" class="alignleft">
		<span id="footer-thankyou">感谢使用<a href="http://oa.th023.com/">TideOA</a>进行创作。</span>	</p>
	<p id="footer-upgrade" class="alignright">
		1.0.0版本	</p>
	<div class="clear"></div>
</div>

	<div id="wp-auth-check-wrap" class="hidden">
	<div id="wp-auth-check-bg"></div>
	</div>
	
<script type='text/javascript'>
/* <![CDATA[ */
var commonL10n = {"warnDelete":"u60a8u5c06u6c38u4e45u5220u9664u6240u9009u9879u76eeu3002nu70b9u51fbu201cu53d6u6d88u201du505cu6b62uff0cu70b9u51fbu201cu786eu5b9au201du5220u9664u3002","dismiss":"u5ffdu7565u6b64u901au77e5u3002"};var heartbeatSettings = {"nonce":"2f0e584758"};var authcheckL10n = {"beforeunload":"u60a8u7684u767bu5f55u4f1au8bddu5df2u8fc7u671fuff0cu8bf7u91cdu65b0u767bu5f55u3002","interval":"180"};/* ]]> */
</script>
<script type='text/javascript' src='/Public/js/load-scripts2.js'></script>

<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>