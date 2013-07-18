$(document).ready(function(){

	$.getJSON("../php/takeAction.php", {"action" : "getAllTags"}, function(res) {
		var marks_ul = $(".marks:first").find("ul:first");

		var length = res.length;
	  	for( var i = 0; i < length; i ++ ) {
	  		var mark = res[i];
	  		var li = $(	"<li>" + 
	  						"<a href='javascript:void(0);'>" + mark['content'] + "</a>" +
	  				   	"</li>");

	  		marks_ul.append(li);
	  	}
	});

	$.getJSON("../php/takeAction.php", {"action" : "getHotBooks"}, function(res) {
		var hot_books = $("#hotBooks");

		var length = res.length;
		for( var i = 0; i < length; i ++ ) {
			var hootBook = res[i];
			var div = $("<div class='hotBooksItem span2'>" +
              				"<div>" +
                				"<a href='resourcesDetails.html?target_id=" + hootBook["target_id"] + "'><img src='../" + hootBook['image'] + "' alt=''></a>" + 
              				"</div>" +
              				"<div class='intro'>" +
                				"<p>" + hootBook['target_name'] +　"</p>" + 
                				"<span class='muted'>" + hootBook['author'] + "</span>" +
              				"</div>" +
            			"</div>" );
			div.appendTo(hot_books);
		}
	});

	$.getJSON("../php/takeAction.php", {"action" : "getHotPapers"}, function(res) {
		var hot_papers = $("#hotPapers");

		var length = res.length;
		for( var i = 0; i < length; i ++ ) {
			var hotPaper = res[i];
			var div = $("<div class='hotBooksItem span2'>" +
              				"<div>" +
                				"<a href='resourcesDetails.html'><img src='../" + hotPaper['image'] + "' alt=''></a>" + 
              				"</div>" +
              				"<div class='intro'>" +
                				"<p>" + hotPaper['target_name'] +　"</p>" + 
                				"<span class='muted'>" + hotPaper['author'] + "</span>" +
              				"</div>" +
            			"</div>" );
			div.appendTo(hot_papers);
		}
	});

	$.getJSON("../php/takeAction.php", {"action" : "getHotComments"}, function(res) {
		var hot_comments = $("#hotComments");

		var length = res.length;
		for( var i = 0; i < length; i ++ ) {
			var hotComment = res[i];
			var div = $("<div class='hotCommentsItem span4'>" +
              				"<div class='commentatorAvatar'>" +
                				"<img src='../" + hotComment['avatar'] + "' alt=''>" +
              				"</div>" + 
  			    	        "<div class='context'>" +
                				"<div class='commentatorName'>" +
                  					"<a href='userInfo.html?user_id=" + hotComment['user_id'] + "'>" + hotComment['username'] + "</a>" +
                				"</div>" +
				                "<div class='commentBook'>评论 " + hotComment['target_name'] + "</div>" +
                					"<div class='commentTitle'>" +
                  						"<a href='" + hotComment['comment_id'] + "'>" + hotComment['content'] + "</a>" +
                					"</div>" +
                				"<div class='dateTime muted'>" + hotComment['create_time'] + "</div>" +
              				"</div>" +
            			"</div>");
			div.appendTo(hot_comments);
		}
	});
});