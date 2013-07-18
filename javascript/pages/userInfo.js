$(document).ready(function(){
	var str, es, user_id;

	str = window.location.href;
	es = /user_id=/;
	es.exec(str);
	user_id = RegExp.rightContext;

	$.getJSON("../php/takeAction.php", {"action": "getUserById", "user_id": user_id}, function(res) {
		$(".username").html(res["username"]);
		$("#introduction").html(res["introduction"]);
	});

	var paging1 = new window.Paging();
	var renderCommentsList = function(res) {
		var comments_list = $("#comments_list");
		var length = res.length;
		comments_list.html("");

		for( var i = 0; i < length; i ++ ) {
			var comment = res[i];
			var li = $(	"<li>" +
                			"<div class='commentator' title='Name'>" +
                  				"<a href='' alt=''><img src='../" + comment['image'] + "' /></a>" +
                			"</div>" +
                			"<div class='comment'>" +
                  				"<p class='title'>" +
                    				"<a href='userInfo.html?user_id=" + comment["target_id"] + "'>" + comment["target_name"] + "</a> " +
                    				"<span>创建时间： " + comment['create_time'] + "</span>" +
                  				"</p>" +
                  				"<div class='context'>" + comment['content'] + "</div>" +
                			"</div>" +
             			"</li>");

			comments_list.append(li);
		}
	};
	$.getJSON("../php/takeAction.php", {"action": "getCommentsFromUser", "user_id": user_id, "pageId": 1}, function(res) {
		renderCommentsList(res);
	});
	// 获取评论的数量，并初始化分页插件
	var getNumberOfCommentsFromUser = function() {
		$.get("../php/takeAction.php", {"action": "getNumberOfCommentsFromUser", "user_id": user_id}, function(res) {
			var num = Math.ceil(res / 4);
			var paramObj = {
				"action": "getCommentsFromUser",
				"user_id": user_id
			}

			paging1.init(num, "#commentsPaging");
			paging1.addEventHandler(paramObj, renderCommentsList);
		});
	};
	getNumberOfCommentsFromUser();

	var paging2 = new window.Paging();
	var renderNotesList = function(res) {
		var notes_list = $("#notes_list");
		var length = res.length;
		notes_list.html("");

		for( var i = 0; i < length; i ++ ) {
			var note = res[i];
			var li = $(	"<li>" +
                			"<div class='commentator' title='Name'>" +
                  				"<a href='' alt=''><img src='../" + note['image'] + "' /></a>" +
                			"</div>" +
                			"<div class='comment'>" +
                  				"<p class='title'>" +
                    				"<a href='userInfo.html?user_id=" + note["target_id"] + "'>" + note["target_name"] + "</a> " +
                    				"<span>创建时间： " + note['create_time'] + "</span>" +
                  				"</p>" +
                  				"<div class='context'>" + note['content'] + "</div>" +
                			"</div>" +
             			"</li>");

			notes_list.append(li);
		}
	};
	$.getJSON("../php/takeAction.php", {"action": "getMyInformation"}, function(res) {
		if( res['user_id'] === user_id ) {
			
		} else {
			$.get("../php/takeAction.php", {"action": "checkIsFriend", "friend_id": user_id}, function(res) {
				var result = $.trim(res);

				if( result === "false" ) {
					$(".userInfo").append("<a id='addFriend' class='btn btn-small offset9'>+ 添加为好友</a>");
					$.getJSON("../php/takeAction.php", {"action": "getPublicNotesFromUser", "user_id": user_id, "pageId": 1}, function(res) {
						renderNotesList(res);
					});
					// 获取评论的数量，并初始化分页插件
					var getNumberOfPublicNotesFromUser = function() {
						$.get("../php/takeAction.php", {"action": "getNumberOfPublicNotesFromUser", "user_id": user_id}, function(res) {
							var num = Math.ceil(res / 4);
							var paramObj = {
								"action": "getPublicNotesFromUser",
								"user_id": user_id
							}

							paging2.init(num, "#notesPaging");
							paging2.addEventHandler(paramObj, renderNotesList);
						});
					};
					getNumberOfPublicNotesFromUser();
				} else {
					$(".userInfo").append("<a id='removeFriend' class='btn btn-small offset9'>- 删除好友</a>");
					$.getJSON("../php/takeAction.php", {"action": "getNotesFromUser", "user_id": user_id, "pageId": 1}, function(res) {
						renderNotesList(res);
					});
					// 获取评论的数量，并初始化分页插件
					var getNumberOfNotesFromUser = function() {
						$.get("../php/takeAction.php", {"action": "getNumberOfNotesFromUser", "user_id": user_id}, function(res) {
							var num = Math.ceil(res / 4);
							var paramObj = {
								"action": "getNotesFromUser",
								"user_id": user_id
							}

							paging2.init(num, "#notesPaging");
							paging2.addEventHandler(paramObj, renderNotesList);
						});
					};
					getNumberOfNotesFromUser();
				}
			});
		}
	});
	
	
	


	$.getJSON("../php/takeAction.php", {"action": "getGroupsByUser", "user_id": user_id}, function(res) {
		var group_list = $("#group_list");
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

			group_list.append(li);
		}
	});

	$("#addFriend").live("click", function() {
		var result = confirm("确定要将该用户加为好友吗？");

		if( result === true ) {
			$.post("../php/takeAction.php", {"action": "addFriend", "friend_id": user_id}, function(res) {
				alert("好友添加成功");
				window.location.href = "userInfo.html?user_id=" + user_id;
			});	
		}
	});

	$("#removeFriend").live("click", function() {
		var result = confirm("确定要删除该好友吗？");

		if( result === true ) {
			$.post("../php/takeAction.php", {"action": "removeFriend", "friend_id": user_id}, function(res) {
				alert("好友删除成功");
				window.location.href = "userInfo.html?user_id=" + user_id;
			});	
		}
	});
	
});