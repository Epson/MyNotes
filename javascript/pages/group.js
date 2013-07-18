$(document).ready(function(){

	var paging = new window.Paging();

	var renderGroupsList = function(res) {
		var groups_list = $("#groups_list");
		groups_list.html("");

		var length = res.length;
		for( var i = 0; i < length; i ++ ) {
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
			groups_list.append(li);
		}
	};

	// 获取笔记的数量，并初始化分页插件
	var getNumberOfGroups = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfGroups"}, function(res) {
			var num = Math.ceil(res / 6);
			var paramObj = {
				"action": "getGroups"
			}

			paging.init(num);
			paging.addEventHandler(paramObj, renderGroupsList);
		});
	};
	getNumberOfGroups();

	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action": "getGroups", "pageId": 1}, function(res) {
		renderGroupsList(res);
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
	$.getJSON("../php/takeAction.php", {"action" : "getMyGroups"}, function(res) {
		renderMyGroupsList(res);
	});
});