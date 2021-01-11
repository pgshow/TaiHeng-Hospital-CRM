<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="zh-CN">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="zh-CN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>患者列表 - 泰恒客户管理系统</title>
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
//更新回访结果
var ajax_url_update_visit="<?php echo U('Ajax/updateVisit');?>";
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
		<form id="adv-settings" method="get" action="<?php echo U('index');?>">
					<h5>请输入查询条件</h5>
					<div class="metabox-prefs">
<table class="form-table">
    <tr class="form-field">
      <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="add_time">提交时间</label></th>
      <td style="padding-top:5px;padding-bottom:5px;">从 <input name="add_time1" type="date" id="add_time1" value="" style="width:auto;" /> 至 <input name="add_time2" type="date" id="add_time2" value="" style="width:auto;" /></td>
    </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="filter_address">筛查地址</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="filter_address" type="text" id="filter_address" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="c_name">患者姓名</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="c_name" type="text" id="c_name" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
	  <th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="tel">联系电话</label></th>
	  <td style="padding-top:5px;padding-bottom:5px;"><input name="tel" type="text" id="tel" style="width:355px;" /></td>
	  </tr>
      <tr class="form-field">
		<th scope="row" style="padding-top:5px;padding-bottom:5px;text-align:right;"><label for="input_employee">报备人</label></th>
		<td style="padding-top:5px;padding-bottom:5px;"><input name="input_employee" type="text" id="input_employee" style="width:355px;" /></td>
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
患者	<a href="<?php echo U('Filter/add');?>" class="add-new-h2">添加患者</a>
</h2>

<ul class='subsubsub'>
    <li class='all'>术检人数：<span class="count"><?php echo ($count); ?></span> 人　　</li>
    <li class='all'>职工医保：<span class="count"><?php echo ($zhigong_count); ?></span> 人　　</li>
    <li class='all'>合作医保：<span class="count"><?php echo ($hezuo_count); ?></span> 人　　</li>
</ul>
<form method="get" action="<?php echo U('index');?>">
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
        <th scope='col' class='manage-column column-sex'>性别</th>
        <th scope='col' class='manage-column column-age'>年龄</th>
        <th scope='col' class='manage-column column-eyes'>右眼</th>
        <th scope='col' class='manage-column column-eyes'>左眼</th>
        <th scope='col' class='manage-column column-eye-detail'>眼部情况</th>
        <th scope='col' class='manage-column column-telnum'>联系电话</th>
        <th scope='col' class='manage-column column-insurance'>有无医保</th>
        <th scope='col' class='manage-column column-ctime'>提交时间</th>
        <th scope='col' class='manage-column column-cdate'>预约日期</th>
        <th scope='col' class='manage-column column-ctime'>就诊时间</th>
        <th scope='col' class='manage-column column-address'>筛查地址</th>
        <th scope='col' class='manage-column column-baobeiren'>报备人</th>
        <th scope='col' class='manage-column column-huifangjg'>回访结果</th>
    </tr>
    </thead>

	<tbody id="the-list" data-wp-lists='list:user'>
    
<?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr id='user-<?php echo ($vo1["cid"]); ?>'>
    <td class="ctext-left"><strong><a href="<?php echo U('Index/view');?>?id=<?php echo ($vo1["cid"]); ?>" target="_blank"><?php echo ($vo1["c_name"]); ?></a></strong></td>
    <td class="ctext-middle">
    <?php if($vo1["sex"] == 1): ?>男
    <?php elseif($vo1["sex"] == 2): ?>
    女
    <?php else: ?>
    &nbsp;<?php endif; ?>
    </td>
    <td class="ctext-middle"><?php echo ($vo1["age"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["right_eye"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["left_eye"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["detail"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["tel"]); ?></td>
    <td class="ctext-middle"><?php echo ($vo1["insurance"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["add_time"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["appoint_date"]); ?></td>
    <td class="ctext-left">
    <?php if($vo1["visit_time"] == '0000-00-00 00:00:00'): ?>0000-00-00 00:00:00
    <?php else: ?>
    <span style="color:#F00"><?php echo ($vo1["visit_time"]); ?></span><?php endif; ?>
    </td>
    <td class="ctext-left"><?php echo ($vo1["filter_address"]); ?></td>
    <td class="ctext-left"><?php echo ($vo1["input_employee_name"]); ?></td>
    <td class="ctext-left" id="chkv<?php echo ($vo1["cid"]); ?>" onclick="checkrvNote(this,<?php echo ($vo1["cid"]); ?>)"><?php echo ($vo1["return_visit"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    
    </tbody>
	<tfoot>
    <tr>
        <th scope='col' class='manage-column column-uname'>姓名</th>
        <th scope='col' class='manage-column column-sex'>性别</th>
        <th scope='col' class='manage-column column-age'>年龄</th>
        <th scope='col' class='manage-column column-eyes'>右眼</th>
        <th scope='col' class='manage-column column-eyes'>左眼</th>
        <th scope='col' class='manage-column column-eye-detail'>眼部情况</th>
        <th scope='col' class='manage-column column-telnum'>联系电话</th>
        <th scope='col' class='manage-column column-insurance'>有无医保</th>
        <th scope='col' class='manage-column column-ctime'>提交时间</th>
        <th scope='col' class='manage-column column-cdate'>预约日期</th>
        <th scope='col' class='manage-column column-ctime'>就诊时间</th>
        <th scope='col' class='manage-column column-address'>筛查地址</th>
        <th scope='col' class='manage-column column-baobeiren'>报备人</th>
        <th scope='col' class='manage-column column-huifangjg'>回访结果</th>
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

<br class="clear" /><input type="button" onclick="window.open('<?php echo U('Xsl/daochu_filter');?>?adv=<?php echo ($all['adv']); ?>&add_time1=<?php echo ($all['add_time1']); ?>&add_time2=<?php echo ($all['add_time2']); ?>&filter_address=<?php echo ($all['filter_address']); ?>&c_name=<?php echo ($all['c_name']); ?>&tel=<?php echo ($all['tel']); ?>&input_employee=<?php echo ($all['input_employee']); ?>')" value="导出">
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