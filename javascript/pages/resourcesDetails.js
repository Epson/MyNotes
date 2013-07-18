

$(document).ready(function(){
	var str, es, target_id;

	str = window.location.href;
	es = /target_id=/;
	es.exec(str);
	target_id = RegExp.rightContext;

	var renderInfo = function(res) {
		var category;
		if( res["category"] == 0 ) {
			category = "书籍";
		} else if( res["category"] == 1 ) {
			category = "网页";
		} else {
			category = "论文";
		}

		$("#header").html("<h3>" + res["target_name"] + "</h3>");
		$("#info").html( "<span>创建者： </span>" + res["author"] + " <br /><br />" +
						 "<span>分类： </span>" + category + " <br />");
		$("#contextBrief").children().eq(1).html(res["introduction"]);
		$("#mainPic").html("<img src='../" + res["image"] + "' alt='" + res["target_name"] + "'>")
	};
	$.getJSON("../php/takeAction.php", {"action" : "getTargetById", "target_id": target_id}, function(res) {
		renderInfo(res);
	});

	var renderTags = function(res) {
		var marks = $("#marks");
		var length = res.length;

		for( var i = 0; i < length; i ++ ) {
			var mark = res[i];
			marks.append("<a class='mark-item' href='javascript:void(0)'>" + mark["content"] + "</a>");
		}
	};
	$.getJSON("../php/takeAction.php", {"action" : "getTagsFromTarget", "target_id": target_id}, function(res) {
		renderTags(res);
	});


	var renderComments = function(res) {
		var comments_list = $("#comments_list");
		var length = res.length;

		for( var i = 0; i < length; i ++ ) {
			var comment_mes = res[i];
			var li = $("<li>" +
                    		"<div class='commentator' title='Name'>" +
	                      		"<a href='?user_id=" + comment_mes["user_id"] + "'>" + 
	                      			"<img src='../" + comment_mes["avatar"] + "' alt=''>" + 
	                      		"</a>" +
	                    	"</div>" +
	                    	"<div class='comment'>" +
	                      		"<p class='title'>" +
	                        		"<a href='?user_id=" + comment_mes["user_id"] + "'>" + comment_mes["username"] + "</a>" +
			                    "</p>" +
	                      		"<div class='context'>" +
	                        		"<p>" + comment_mes["content"] + "</p>" +
	                      		"</div>" +
	                    	"</div>" +
	                  	"</li>");

			comments_list.append(li);
		}
	};
	$.getJSON("../php/takeAction.php", {"action" : "getCommentsFromTarget", "target_id": target_id}, function(res) {
		renderComments(res);
	});
});