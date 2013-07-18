$(document).ready(function(){
	var str, es, group_id, creator;

	str = window.location.href;
	es = /group_id=/;
	es.exec(str);
	group_id = RegExp.rightContext;

	$("#group_members").html("<a href='groupMember.html?group_id=" + group_id + "'> > 小组成员</a>")

	var renderInfo = function(res) {
		$("#group_name").html(res["group_name"]);
		$("#create_time").html(res["create_time"]);
		$("#creator").html("<a href='" + res["user_id"] + "'>" + res["username"] + "</a>");
		$("#introduction").html(res["introduction"]);

		creator = res["user_id"];
	};
	$.getJSON("../php/takeAction.php", {"action" : "getGroupById", "group_id": group_id}, function(res) {
		renderInfo(res[0]);
	});

	$.get("../php/takeAction.php", {"action": "checkInGroup", "group_id": group_id}, function(res) {
		var result = $.trim(res);

		$.get("../php/takeAction.php", {"action": "getMyId"}, function(res) {
			var my_id = $.trim(res);

			if( my_id === creator ) {
				$("#group_operation").append("<a id='dissolve_group' href='javascript:void(0);'> >>解散小组</a>")
			} else {
				if( result === "false" ) {
					$("#group_operation").append("<a id='enter_group' href='javascript:void(0);'> >>加入小组</a>");
				} else {
					$("#group_operation").append("<a id='exit_group' href='javascript:void(0);'> >>退出小组</a>");
				}
			}
		});
	});	


	var renderMyGroupsList = function(res) {
		var myGroups_list = $("#myGroups_list");
		myGroups_list.html("");

	  	for( var i = 0; i < res.length; i ++ ) {
	  		var group = res[i];
	  		var li = $("<li class='group-item'>" +
                            "<div class='pic'>" +
                                "<img src='../img/Jobs.jpg' alt=''>" +
                            "</div>" +
                            "<div class='info'>" +
                                "<div class='title'>" +
                                    "小组名称：<a href='groupDetail.html?group_id=" + group["group_id"] + "'>" + group["group_name"] + "</a><br />" +
                                    "创建者：<a href='userInfo.html?user_id=" + group["user_id"] + "'>" + group["username"] + "</a><br />" +
                                "</div>" +
                            "</div>" +
                        "</li>");

	  		myGroups_list.append(li);
	  	}
	};
	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action": "getMyGroups"}, function(res) {
		renderMyGroupsList(res);
	});

	$("#enter_group").live("click", function() {
		var result = confirm("确认加入该小组？");

		if( result === true ) {
			$.get("../php/takeAction.php", {"action": "enterGroup", "group_id": group_id}, function(res) {
				alert("加入成功");
			})
		}
	});	

	$("#exit_group").live("click", function() {
		var result = confirm("确认退出该小组？");

		if( result === true ) {
			$.get("../php/takeAction.php", {"action": "exitGroup", "group_id": group_id}, function(res) {
				alert("退出成功");
			})
		}
	});	

	$("#dissolve_group").live("click", function() {
		var result = confirm("确认解散该小组？");

		if( result === true ) {
			$.get("../php/takeAction.php", {"action": "dissolveGroup", "group_id": group_id}, function(res) {
				alert("解散成功");

				window.location.href = "group.html";
			})
		}
	});	
});