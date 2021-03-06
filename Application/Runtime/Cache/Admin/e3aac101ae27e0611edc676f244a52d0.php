<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="zh-CN">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="zh-CN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>添加患者 - 泰恒客户管理系统</title>
<link rel='stylesheet' href='/Public/css/load-styles.css' type='text/css' media='all' />
<script type="text/javascript" src="/Public/js/ajax.js"></script>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>
var ajax_url_check_tel="<?php echo U('Ajax/checkTel');?>";
</script>
<meta name="viewport" content="width=device-width">
</head>
<body class="wp-admin wp-core-ui no-js  users-php admin-bar branch-4-2 version-4-2-2 admin-color-midnight locale-zh-cn no-customize-support no-svg mobile">
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
<h2 id="add-new-user"> 添加患者</h2>


<div id="ajax-response"></div>

<p>新建患者资料，注意是否重名。</p>
<form method="post" name="createuser" id="createuser" class="validate" novalidate>
<input type="hidden" name="http_referer" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" /><table class="form-table">
	<tr class="form-field">
		<th scope="row"><label for="c_name">姓名</label></th>
		<td><input name="c_name" type="text" id="c_name" value="" /></td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="sex">性别</label></th>
		<td><input name="sex" type="radio" style="width:auto;" value="1">男　<input name="sex" type="radio" value="2" style="width:auto;">女</td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="age">年龄</label></th>
		<td><input name="age" type="number" id="age" value="" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="right_eye">右眼</label></th>
		<td><input name="right_eye" type="text" id="right_eye" value="" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="left_eye">左眼</label></th>
		<td><input name="left_eye" type="text" id="left_eye" value="" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="detail">眼部情况</label></th>
		<td><input name="detail" type="text" id="detail" value="" /></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="tel">联系电话</label></th>
		<td><input name="tel" type="text" id="tel" value="" onblur="checkTel();" /> <span id="telResult"></span></td>
	</tr>
    <tr class="form-field">
		<th scope="row"><label for="appoint_datetime">预约时间</label></th>
		<td>
        <input name="appoint_date" type="date" id="appoint_date" value="<?php echo date("Y-m-d" ,time());?>" style="width:auto;" />日
        <select name="appoint_time" id="appoint_time">
        <option value=""></option>
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
      <th scope="row"><label for="filter_address">筛选地址</label></th>
      <td><input name="filter_address" type="text" id="filter_address" value="" /></td>
    </tr>
    <tr class="form-field">
		<th scope="row"><label for="insurance">医保</label></th>
		<td><input name="insurance" type="radio" style="width:auto;" value="职">职工医保　<input name="insurance" type="radio" value="合" style="width:auto;">合作医保</td>
	</tr>
    
	</table>


<p class="submit"><input type="submit" name="createuser" id="createusersub" class="button button-primary" value="添加用户"  /></p>
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