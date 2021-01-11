<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<!--[if IE 8]>
		<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="zh-CN">
	<![endif]-->
	<!--[if !(IE 8) ]><!-->
		<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
	<!--<![endif]-->
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>登陆 - 泰恒客户管理系统</title>
	<link rel='stylesheet' id='buttons-css'  href='/Public/css/buttons.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='open-sans-css'  href='//fonts.useso.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='/Public/css/dashicons.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='login-css'  href='/Public/css/login.min.css' type='text/css' media='all' />
<meta name='robots' content='noindex,follow' />
<meta name="viewport" content="width=device-width">
	</head>
	<body class="login login-action-login wp-core-ui mobile locale-zh-cn">
	<div id="login">
		<h1><a href="/" title="泰恒眼科客户管理系统" tabindex="-1">泰恒眼科</a></h1>
<form name="loginform" id="loginform" action="<?php echo U('login');?>" method="post">
	<p>
		<label for="user_login">用户名<br />
		<input type="text" name="log" id="user_login" class="input" value="" size="20" /></label>
	</p>
	<p>
		<label for="user_pass">密码<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="登录" />
	</p>
</form>
<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script></div>
		<div class="clear"></div>
	</body>
	</html>