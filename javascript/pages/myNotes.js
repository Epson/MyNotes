$(document).ready(function(){

	var paging = new window.Paging();

	var renderNotesList = function(res) {
		var item_list = $(".item-list");
		item_list.html("");

	  	for( var i = 0; i < res.length; i ++ ) {
	  		var notes = jQuery.parseJSON(res[i]);
	  		var li = $("<li></li>");

	  		var pic = $("<div class='pic'>" +
                            "<a href='resourcesDetails.html?target_id=" + notes['target_id'] + "' >" +
                                "<img src='../" + notes['image'] + "' alt='" + notes['target_name'] + "' />" +
                            "</a>" +
                        "</div>");
	  		var content = $("<div class='content min-height'>" + 
                                "<span class='titile'>" +
                                    "<a href='resourcesDetails.html?target_id=" + notes['target_id'] + "' >" +
                                        notes['target_name'] +
                                        "<br />" +
                                    "</a>" + 
                                "</span>" +
                                "<span class='time'>" +
                                    notes['create_time'] +
                                "</span>" +
                                "<div class='note_desc'>" +
                                    "<strong>我的笔记：</strong>" +
                                    notes['content'] +
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
	var getNumberOfMyNotes = function() {
		$.get("../php/takeAction.php", {"action" : "getNumberOfMyNotes"}, function(res) {
			var num = Math.ceil(res / 5);
			var paramObj = {
				"action": "getMyNotes"
			}

			paging.init(num);
			paging.addEventHandler(paramObj, renderNotesList);
		});
	};
	getNumberOfMyNotes();

	// 页面初始化时第一次自动从数据库获取数据
	$.getJSON("../php/takeAction.php", {"action" : "getMyNotes", "pageId" : 1}, function(res) {
		renderNotesList(res);
	});
});