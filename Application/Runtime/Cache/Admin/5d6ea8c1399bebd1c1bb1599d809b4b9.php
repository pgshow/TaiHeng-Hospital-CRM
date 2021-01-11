<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="zh-CN">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="zh-CN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>编辑客户 - 泰恒客户管理系统</title>
<link rel='stylesheet' href='/Public/css/load-styles.css' type='text/css' media='all' />
<script type="text/javascript" src="/Public/js/ajax.js"></script>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var ajax_url_area="<?php echo U('Ajax/getArea');?>";
var ajax_url_check_tel="<?php echo U('Ajax/checkTel');?>";
var ajax_url_check_identity="<?php echo U('Ajax/checkIdentity');?>";

</script>
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
				</div>
				
<div class="wrap">
<h2 id="add-new-user"> 编辑新客户</h2>


<div id="ajax-response"></div>

<p>编辑客户资料，只有管理以上才有权限。</p>
<form method="post" name="createuser" id="createuser" class="validate" novalidate>
<input type="hidden" name="http_referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" /><table class="form-table">
	<tr class="form-field">
		<th scope="row"><label for="c_name">姓名</label></th>
		<td><input name="c_name" type="text" id="c_name" value="<?php echo ($clist["c_name"]); ?>" /></td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="sex">性别</label></th>
		<td>
        <?php if($clist["sex"] == 1): ?><input name="sex" type="radio" style="width:auto;" value="1" checked>男　<input name="sex" type="radio" value="2" style="width:auto;">女</td>
        <?php else: ?>
        <input name="sex" type="radio" style="width:auto;" value="1">男　<input name="sex" type="radio" value="2" style="width:auto;" checked>女</td><?php endif; ?>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="age">年龄</label></th>
		<td><input name="age" type="number" id="age" value="<?php echo ($clist["age"]); ?>" /></td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="appoint_no">预约号</label></th>
		<td><input name="appoint_no" type="text" id="appoint_no" value="<?php echo ($clist["appoint_no"]); ?>" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="tel">联系电话</label></th>
		<td><input name="tel" type="text" id="tel" value="<?php echo ($clist["tel"]); ?>" onblur="checkTel();" /> <span id="telResult"></span></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="appoint_datetime">预约时间</label></th>
		<td>
        <input name="appoint_date" type="date" id="appoint_date" value="<?php echo ($clist["appoint_date"]); ?>" style="width:auto;" />日
        <select name="appoint_time" id="appoint_time">
        <option value="<?php echo ($clist["appoint_time"]); ?>" selected><?php echo ($clist["appoint_time"]); ?></option>
        <option value="8-9">8- 9</option>
        <option value="9-10">9-10</option>
        <option value="10-11">10-11</option>
        <option value="11-12">11-12</option>
        <option value="14-15">14-15</option>
        <option value="15-16">15-16</option>
        <option value="16-17">16-17</option>
        <option value="17-18">17-18</option>
        </select>
        时
        </td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="identity_id">证件号码</label></th>
		<td><input name="identity_id" type="text" id="identity_id" value="<?php echo ($clist["identity_id"]); ?>" onblur="checkIdentity();" /> <span id="identityResult"></span></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="address">联系地址</label></th>
		<td><input name="address" type="text" id="address" value="<?php echo ($clist["address"]); ?>" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="case">病种</label>
        </th>
		<td><input name="case" type="text" id="case" value="<?php echo ($clist["case"]); ?>" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="detail">病情描述</label></th>
		<td><textarea name="detail" id="detail" style="width:25em"><?php echo ($clist["detail"]); ?></textarea></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="transfer">患者区域</label></th>
		<td><input name="transfer" type="text" id="transfer" value="<?php echo ($clist["transfer"]); ?>" /></td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="c_source">患者来源</label></th>
		<td><select name="c_source" id="c_source">
        <?php if($clist["c_source"] != '' ): ?><option value="<?php echo ($clist["c_source"]); ?>" selected><?php echo ($clist["c_source"]); ?></option>
        <?php else: ?>
          <option value="" selected>-请选择-</option><?php endif; ?>
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
		  </select>
          </td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="appoint_way">预约方式</label> <span class="description">(必填)</span></th>
		<td><select name="appoint_way" id="appoint_way">
        <?php if($clist["appoint_way"] != '' ): ?><option value="<?php echo ($clist["appoint_way"]); ?>" selected><?php echo ($clist["appoint_way"]); ?></option>
        <?php else: ?>
          <option value="" selected>-请选择-</option><?php endif; ?>
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
		<th scope="row"><label for="appoint_office">预约科室</label></th>
		<td><select name="appoint_office" id="appoint_office">
        <?php if($clist["appoint_office"] != '' ): ?><option value="<?php echo ($clist["appoint_office"]); ?>" selected><?php echo ($clist["appoint_office"]); ?></option>
        <?php else: ?>
          <option value="" selected>-请选择-</option><?php endif; ?>
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
		<th scope="row"><label for="appoint_doctor">预约专家</label></th>
		<td>
          <select name="appoint_doctor" id="appoint_doctor">
          <?php if($clist["appoint_doctor"] != '' ): ?><option value="<?php echo ($clist["appoint_doctor"]); ?>" selected><?php echo ($clist["appoint_doctor"]); ?></option>
          <?php else: ?>
          <option value="" selected>-请选择-</option><?php endif; ?>
          <?php if(is_array($dlist)): $i = 0; $__LIST__ = $dlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vod): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vod["doctor_name"]); ?>'><?php echo ($vod["doctor_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		  </select>
        </td>
	</tr>
	</table>


<p class="submit"><input type="submit" name="createuser" id="createusersub" class="button button-primary" value="修改用户"  /></p>
</form>
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
<script type='text/javascript' src='/Public/js/load-scripts3.js'></script>

<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>