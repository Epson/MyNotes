

$(document).ready(function(){
	var paging = new window.Paging();

	// 使用从后台得到的数据渲染页面
	var renderMemberList = function(res) {
		var member_list = $("#memberList");
		var length = res.length;

		member_list.html("");

		for( var i = 0; i < length; i ++ ) {
			var user = res[i];
			var li = $("<li>" +
	                		"<div class='row'>" +
	                  			"<div class='id span1'>" +
	                    			"<p class='muted'>" + user['user_id'] + "</p>" +
	                  			"</div>" +
	                  			"<div class='avatar span1'><img src='../" + user['avatar'] + "' alt='" + user['username'] + "'></div>" +
	                  			"<div class='name span3'>" + user['username'] + "</div>" +
	                  			"<div class='action span2 offset4'>" +
	                    			"<button class='btn modify'>修改</button> " +
	                    			"<button class='btn btn-danger delete'>删除</button>" +
	                  			"</div>" +
	                		"</div>" +
	              		"</li>");

			member_list.append(li);
		}
	};


	// 获取用户的数量，并初始化分页插件
	var getNumberOfUsers = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfUsers"}, function(res) {
			var num = Math.ceil(res / 10);
			paging.init(num);
			var paramObj = {
				"action": "getUsers"
			}
			paging.addEventHandler(paramObj, renderMemberList);
		});
	};
	getNumberOfUsers();
	
	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action" : "getUsers", "pageId" : 1}, function(res) {
		renderMemberList(res);
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

	// 搜索用户
	$("#searchUser").bind("click", function() {
		var username = $(".search-query").val();

		$.getJSON("../php/takeAction.php", {"action" : "getUsersByName", "username": username}, function(res) {
			console.log(res);
			renderMemberList(res);
		});
	});

	$(".form-search").bind("submit", function() {
		return false;
	})
});