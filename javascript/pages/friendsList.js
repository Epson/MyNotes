$(document).ready(function(){

	var paging = new window.Paging();

	var renderMyFriendsList = function(res) {
		var item_list = $(".item-list");
		item_list.html("");

		var length = res.length;
	  	for( var i = 0; i < length; i ++ ) {
	  		var friend = jQuery.parseJSON(res[i]);
	  		var li = $("<li></li>");

	  		var pic = $("<div class='pic'>" +
                            "<a href='userInfo.html?user_id=" + friend['user_id'] + "' >" +
                                "<img src='../" + friend['avatar'] + "' alt='" + friend['username'] + "' />" +
                            "</a>" +
                        "</div>");
	  		var content = $("<div class='content'>" + 
                                "<p>" +
                                    "用户名：" + "<a href='userInfo.html?user_id=" + friend['user_id'] + "'>" + friend['username'] + "</a>" +
                               "</p>" +
                                "<p>" +
                                    "邮箱：" + friend['email'] +
                                "</p>" +

                                "<p>" +
                                    "个人介绍：" + friend['introduction'] +
                                "</p>" +
                                "<a href='javascript:void(0);' class='del_btn'>删除好友</a>" +
                                "<input type='hidden' value='" + friend['user_id'] + "' />" +
                            "</div>");
	  		var hr = $("<hr />");

	  		li.append(pic);
	  		li.append(content);
	  		li.append(hr);

	  		item_list.append(li);
	  	}
	};

	// 获取笔记的数量，并初始化分页插件
	var getNumberOfMyFriends = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfMyFriends"}, function(res) {
			var num = Math.ceil(res / 5);
			var paramObj = {
				"action": "getMyFriends"
			}

			paging.init(num);
			paging.addEventHandler(paramObj, renderMyFriendsList);
		});
	};
	getNumberOfMyFriends();

	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action" : "getMyFriends", "pageId" : 1}, function(res) {
		renderMyFriendsList(res);
	});
});