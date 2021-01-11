<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title></title>
<style type="text/css">
body, table {
	font-size: 12px;
}
table {
	width:700px;
	border-collapse: collapse;
	margin: 0 auto;
}
td {
	height: 35px;
	font-size:15px;
}
h1, h2, h3 {
	font-size: 12px;
	margin: 0;
	padding: 0;
}
.table {
	margin-bottom:10px;
	border: 1px solid #000;
	color: #000;
}
.table th {
	background-repeat: repeat-x;
	text-align:left;
	font-size:18px;
	height: 35px;
}
.table td, .table th {
	border: 1px solid #333;
	padding: 0 1em 0;
}
.table tr.alter {
	
}
.one { width:89px;}
.two { width:201px;}

.table2 {
	border: 0px;
}
.table2 td, .table2 th {
	border: 0px;
	padding: 0 1em 0;
}
.in {
	border:0px;
	color:#000;
	width:560px;
}
</style>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
</head>
<body>
<table class="table">
  <tr class="alter">
    <th colspan="8" bgcolor="#B1C9F3"><strong>泰恒眼科患者预约资料</strong></th>
  </tr>
  <tr>
    <td class="one">编　　号</td>
    <td class="two"><?php echo ($clist["cid"]); ?></td>
    <td class="one">预约方式</td>
    <td class="two"><?php echo ($clist["appoint_way"]); ?></td>
  </tr>
  <tr>
    <td class="one">预约科室</td>
    <td class="two"><?php echo ($clist["appoint_office"]); ?></td>
    <td class="one">预约医生</td>
    <td class="two"><?php echo ($clist["appoint_doctor"]); ?></td>
  </tr>
  <tr>
    <td class="one">预约日期</td>
    <td class="two"><?php echo ($clist["appoint_date"]); ?></td>
    <td class="one">预约号</td>
    <td class="two"><?php echo ($clist["appoint_no"]); ?></td>
  </tr>
</table>
<table class="table">
  <tr class="alter">
    <th colspan="8" bgcolor="#B1C9F3"><strong>泰恒眼科患者基础信息</strong></th>
  </tr>
  <tr>
    <td class="one">姓　　名</td>
    <td class="two"><?php echo ($clist["c_name"]); ?></td>
    <td class="one">身份证</td>
    <td class="two"><?php echo ($clist["identity_id"]); ?></td>
  </tr>
  <tr>
    <td class="one">性　　别</td>
    <td class="two">
    <?php if($clist["sex"] == 1 ): ?>男
    <?php elseif($clist["sex"] == 2): ?>
    女
    <?php else: ?>
    &nbsp;<?php endif; ?>
    </td>
    
    
    <td class="one">年　　龄</td>
    <td class="two"><?php if($clist["age"] != 0 ): echo ($clist["age"]); endif; ?></td>
  </tr>
  <tr>
    <td class="one">电　　话</td>
    <td class="two"><?php echo ($clist["tel"]); ?></td>
    <td class="one">病　　种 </td>
    <td class="two"><?php echo ($clist["case"]); ?></td>
  </tr>
  <tr>
    <td class="one">地　　址</td>
    <td colspan="3"><?php echo ($clist["address"]); ?></td>
  </tr>
  <tr>
    <td class="one"><strong>优惠内容</strong></td>
    <td colspan="3"><input name="privilege" type="text" class="in" id="privilege" onchange="up_cookie()" value=""></td>
  </tr>
  <tr>
    <td class="one"><strong>备　　注</strong></td>
    <td colspan="3">此单须在挂号交费时出示，过后补交无效！</td>
  </tr>
</table>
<table class="table2">
  <tr>
    <td class="one">客服确认：</td>
    <td class="two"></td>
    <td rowspan="2" class="one">患者签字：</td>
    <td rowspan="2" class="two"></td>
  </tr>
</table>
<script type='text/javascript'>
//进入该页时读取COOKIE并替换优惠内容
jQuery(function(){
	var p_cookie = getCookie("privilege");
	$("#privilege").attr("value",p_cookie);
});
//输入框内容改变时存储内容到cookie
function up_cookie() {
	//获取输入框内容
	p_content = $("#privilege")[0].value;
	//写入cookie
	setCookie("privilege", p_content);
}
//该函数设置COOKIE
function setCookie(name, value) 
{ 
    var Days = 7; 
    var exp = new Date(); 
    exp.setTime(exp.getTime() + Days*24*60*60*1000); 
    document.cookie = name + "=" + escape (value) + ";expires=" + exp.toGMTString(); 
}
//该函数读取COOKIE
function getCookie(name) {
    var strCookie = document.cookie;
    var arrCookie = strCookie.split("; ");
	for(var i=0; i<arrCookie.length; i++){
        var arr = arrCookie[i].split("=");
		if(arr[0] == name)
		    return unescape(arr[1]);
	}
	return "";
}
</script>
</body>
</html>