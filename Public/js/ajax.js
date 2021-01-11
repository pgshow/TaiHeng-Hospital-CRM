//三级联动选择地区、医院、转诊医生
function loadArea(areaId, areaType) {
    $.post(ajax_url_area, {
        'areaId': areaId
    },
    function(data) {
        if (areaType == 'city') {
            $('#' + areaType).html('<option value="-1">医院</option>');
            $('#district').html('<option value="-1">转诊医生</option>');
        } else if (areaType == 'district') {
            $('#' + areaType).html('<option value="-1">转诊医生</option>');
        }
        if (areaType != 'null') {
            $.each(data,
            function(no, items) {
                $('#' + areaType).append('<option value="' + items.area_id + '">' + items.area_name + '</option>');
            });
        }
    });
}

//添加用户时检查该电话是否存在
function checkTel() {
    $.ajax({
        type: "GET",
        url: ajax_url_check_tel,
        dataType: "html",
        data: "tel=" + $("#tel").val(),
        beforeSend: function(XMLHttpRequest) {
            $("#telResult").text("正在查询");
            //Pause(this,100000);
        },
        success: function(msg) {
            $("#telResult").html(msg);
            $("#telResult").css("color", "red");
        },
        complete: function(XMLHttpRequest, textStatus) {
            //隐藏正在查询图片
        },
        error: function() {
            //错误处理
        }
    });
}

//添加用户时检查该身份证号是否存在
function checkIdentity() {
    $.ajax({
        type: "GET",
        url: ajax_url_check_identity,
        dataType: "html",
        data: "identity_id=" + $("#identity_id").val(),
        beforeSend: function(XMLHttpRequest) {
            $("#identityResult").text("正在查询");
            //Pause(this,100000);
        },
        success: function(msg) {
            $("#identityResult").html(msg);
            $("#identityResult").css("color", "red");
        },
        complete: function(XMLHttpRequest, textStatus) {
            //隐藏正在查询图片
        },
        error: function() {
            //错误处理
        }
    });
}

//导医更新就诊时间
function checkJump(id) {
    if (window.confirm("该用户是否到院！")) {
        $.ajax({
            type: "GET",
            url: ajax_url_update_appoint,
            dataType: "html",
            data: "cid=" + id,
            beforeSend: function(XMLHttpRequest) {
                //$("#appointResult" + id).text("更新中");
                //Pause(this,100000);
            },
            success: function(msg) {
                $("#appointResult" + id).html(msg);
                $("#appointResult" + id).css("color", "blue");
            },
            complete: function(XMLHttpRequest, textStatus) {
                //隐藏正在查询图片
            },
            error: function() {
                //错误处理
            }
        });
    }
}

//更新就诊卡号
function checkkhNote(obj, id) {
    if (document.getElementById("re" + id)) return;
    var newElement = document.createElement("input");
    newElement.id = "re" + id;
    newElement.style.width = "50px";
    newElement.style.fontSize = "12px";
    newElement.type = "text";
    newElement.oldValue = obj.innerText;
    newElement.value = obj.innerText;
    newElement.onblur = function() {
		
		//更新信息
        $.ajax({
            type: "GET",
            url: ajax_url_update_health,
            dataType: "html",
            data: "cid=" + id +"&health_id=" + newElement.value,
            beforeSend: function(XMLHttpRequest) {
                //$("#chkh" + id).text("更新中");
            },
            success: function(msg) {
                $("#chkh" + id).html(msg);
                $("#chkh" + id).css("color", "red");
            },
            complete: function(XMLHttpRequest, textStatus) {
                //隐藏正在查询图片
            },
            error: function() {
                //错误处理
            }
        });
    }
    newElement.onfocus = function() {
        newElement.select();
    }

    obj.innerHTML = "";
    obj.appendChild(newElement);
    newElement.focus();
}

//更新回访结果
function checkrvNote(obj, id) {
    if (document.getElementById("re" + id)) return;
    var newElement = document.createElement("input");
    newElement.id = "re" + id;
    newElement.style.width = "200px";
    newElement.style.fontSize = "12px";
    newElement.type = "text";
    newElement.oldValue = obj.innerText;
    newElement.value = obj.innerText;
    newElement.onblur = function() {
		
		//更新信息
        $.ajax({
            type: "GET",
            url: ajax_url_update_visit,
            dataType: "html",
            data: "cid=" + id +"&return_visit=" + newElement.value,
            beforeSend: function(XMLHttpRequest) {
                //$("#chkv" + id).text("更新中");
            },
            success: function(msg) {
                $("#chkv" + id).html(msg);
                $("#chkv" + id).css("color", "red");
            },
            complete: function(XMLHttpRequest, textStatus) {
                //隐藏正在查询图片
            },
            error: function() {
                //错误处理
            }
        });
    }
    newElement.onfocus = function() {
        newElement.select();
    }

    obj.innerHTML = "";
    obj.appendChild(newElement);
    newElement.focus();
}

//更新导医备注
function checkmkNote(obj, id) {
    if (document.getElementById("re" + id)) return;
    var newElement = document.createElement("input");
    newElement.id = "re" + id;
    newElement.style.width = "250px";
    newElement.style.fontSize = "12px";
    newElement.type = "text";
    newElement.oldValue = obj.innerText;
    newElement.value = obj.innerText;
    newElement.onblur = function() {
		
		//更新信息
        $.ajax({
            type: "GET",
            url: ajax_url_update_mark,
            dataType: "html",
            data: "cid=" + id +"&patient_guide_mark=" + newElement.value,
            beforeSend: function(XMLHttpRequest) {
                //$("#chkv" + id).text("更新中");
            },
            success: function(msg) {
                $("#chkm" + id).html(msg);
                $("#chkm" + id).css("color", "red");
            },
            complete: function(XMLHttpRequest, textStatus) {
                //隐藏正在查询图片
            },
            error: function() {
                //错误处理
            }
        });
    }
    newElement.onfocus = function() {
        newElement.select();
    }

    obj.innerHTML = "";
    obj.appendChild(newElement);
    newElement.focus();
}

//更改用户姓名
function change_name(obj, id) {
    if (document.getElementById("re" + id)) return;
    var newElement = document.createElement("input");
    newElement.id = "re" + id;
    newElement.style.width = "60px";
    newElement.style.fontSize = "12px";
    newElement.type = "text";
    newElement.oldValue = obj.innerText;
    newElement.value = obj.innerText;
    newElement.onblur = function() {
		
		if(newElement.value == '') {
			return;
		}
		
		//更新信息
        $.ajax({
            type: "GET",
            url: ajax_url_update_name,
            dataType: "html",
            data: "cid=" + id +"&c_name=" + newElement.value,
            beforeSend: function(XMLHttpRequest) {
                //$("#chkv" + id).text("更新中");
            },
            success: function(msg) {
                $("#chna" + id).html(msg);
				if('不能为空' != msg) {
                    $("#chnam" + id).html('<strong><a href="/index.php/Admin/Index/view.html?id='+id+'" target="_blank">'+newElement.value+'</a></strong><br /><div class="row-actions"><span class="edit"><a href="/index.php/Admin/Index/editcustomer.html?id='+id+'">编辑</a> | </span><span class="delete"><a class="submitdelete" href="/index.php/Admin/Index/delcustomer.html?id='+id+'">删除</a></span></div>');
				}
            },
            complete: function(XMLHttpRequest, textStatus) {
                //隐藏正在查询图片
            },
            error: function() {
                //错误处理
            }
        });
    }
    newElement.onfocus = function() {
        newElement.select();
    }

    obj.innerHTML = "";
    obj.appendChild(newElement);
    newElement.focus();
}