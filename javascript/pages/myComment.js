$(document).ready(function(){
	var paging = new window.Paging();

	var renderMyCommentsList = function(res) {
		var item_list = $(".item-list");
		item_list.html("");

	  	for( var i = 0; i < res.length; i ++ ) {
	  		var comments = jQuery.parseJSON(res[i]);
	  		var li = $("<li></li>");

	  		var pic = $("<div class='pic'>" +
                            "<a href='" + comments['target_id'] + "' >" +
                                "<img src='../" + comments['image'] + "' alt='" + comments['target_name'] + "' />" +
                            "</a>" +
                        "</div>");
	  		var content = $("<div class='content min-height'>" + 
                                "<span class='titile'>" +
                                    "<a href='resourcesDetails.html?target_id=" + comments['target_id'] + "' >" +
                                        comments['target_name'] +
                                        "<br />" +
                                    "</a>" + 
                                "</span>" + 
                                "<span class='time'>" +
                                    comments['create_time'] +
                                "</span>" +
                                "<div class='note_desc'>" +
                                    "<strong>我的评论：</strong>" +
                                    comments['content'] +
                                "</div>" +
                            "</div>");
	  		var hr = $("<hr />");

	  		li.append(pic);
	  		li.append(content);
	  		li.append(hr);

	  		item_list.append(li);
	  	}
	};
	
	// 获取笔记的数量，并初始化分页插件
	var getNumberOfMyComments = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfMyComments"}, function(res) {
			var num = Math.ceil(res / 5);
			var paramObj = {
				"action": "getMyComments"
			}
			
			paging.init(num);
			paging.addEventHandler(paramObj, renderMyCommentsList);
		});
	};
	getNumberOfMyComments();

	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action" : "getMyComments", "pageId" : 1}, function(res) {
		renderMyCommentsList(res);
	});
});