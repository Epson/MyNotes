

$(document).ready(function(){
	var str, es, group_id, creator;

	str = window.location.href;
	es = /group_id=/;
	es.exec(str);
	group_id = RegExp.rightContext;

	var paging = new window.Paging();

	// 使用从后台得到的数据渲染页面
	var renderMemberList = function(res) {
		$.get("../php/takeAction.php", {"action" : "checkIsGroupCreator", "group_id": group_id}, function(result) {
			var result = $.trim(result);
			var member_list = $("#memberList");
			var length = res.length;

			member_list.html("");
			if( result === "false" ) {
				for( var i = 0; i < length; i ++ ) {
					var user = res[i];
					var li = $("<li>" +
		                			"<div class='row'>" +
		                  				"<div class='id span1'>" +
		                    				"<p class='muted'>" + user["user_id"] + "</p>" +
		                  				"</div>" +
		                  				"<div class='avatar span1'><img src='../" + user["avatar"] + "' alt=''></div>" +
		                  				"<div class='name span1'><a href='userInfo.html?user_id=" + user["user_id"] + "'>" + user["username"] + "</a></div>" +
		                  				"<div class='name span2'>" + user["enter_time"] + "</div>" +
		                  				"<div class='name span2'>" + user["email"] + "</div>" +
		                			"</div>" +
		              			"</li>");

					member_list.append(li);
				}
			} else {
				for( var i = 0; i < length; i ++ ) {
					var user = res[i];
					var li = $("<li>" +
		                			"<div class='row'>" +
		                  				"<div class='id span1'>" +
		                    				"<p class='muted'>" + user["user_id"] + "</p>" +
		                  				"</div>" +
		                  				"<div class='avatar span1'><img src='../" + user["avatar"] + "' alt=''></div>" +
		                  				"<div class='name span1'><a href='userInfo.html?user_id=" + user["user_id"] + "'>" + user["username"] + "</a></div>" +
		                  				"<div class='name span2'>" + user["enter_time"] + "</div>" +
		                  				"<div class='name span2'>" + user["email"] + "</div>" +
		                  				"<div class='action span1 offset2'>" +
		                    				"<button class='btn btn-danger delete'>删除</button>" +
		                  				"</div>" +
		                			"</div>" +
		              			"</li>");

					member_list.append(li);
				}
			}	
		});
	};


	// 获取用户的数量，并初始化分页插件
	var getNumberOfUsersInGroup = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfUsersInGroup", "group_id": group_id}, function(res) {
			var num = Math.ceil(res / 10);
			var paramObj = {
				"action": "getUsersInGroup",
				"group_id": group_id
			};

			paging.init(num);
			paging.addEventHandler(paramObj, renderMemberList);
		});
	};
	getNumberOfUsersInGroup();
	
	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action": "getUsersInGroup", "group_id": group_id, "pageId": 1}, function(res) {
		renderMemberList(res);
	});

	$.getJSON("../php/takeAction.php", {"action": "getGroupById", "group_id": group_id}, function(res) {
		$("#group_name").html(res[0]["group_name"]);
	});

	// 删除用户
	$(".delete").live("click", function() {
		var result = confirm("确认要删除该用户吗？");

		if( result === true ) {
			var user_id = $(this).parent().parent().children().first().children().first().html() ;
			$.post("../php/takeAction.php", {"action": "removeUser", "user_id": user_id}, function(res) {
				alert("删除成功");

				$.getJSON("../php/takeAction.php", {"action" : "getUsers", "pageId" : 1}, function(res) {
					renderMemberList(res);
					getNumberOfUsers();
				});
			});
		}
	});
});