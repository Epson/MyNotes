$(document).ready(function(){
    var item_list = $(".item-list");
    
    $.getJSON("../php/takeAction.php", {"action" : "getNewsFromFriends"}, function(res) {
        for( var i = res.length - 1; i >= 0; i -- ) {
            var news = res[i];
            var li = $("<li></li>");

            var pic = $("<div class='pic'>" +
                            "<a href='" + news['user_id'] + "' >" +
                                "<img src='../" + news['avatar'] + "' alt='" + news['username'] + "' />" +
                            "</a>" +
                        "</div>");
            if( news["type"] === "comment" ) {
                var content = $("<div class= 'content min-height'>" +
                                    "<span class='name'>" + 
                                        "<a href='userInfo.html?user_id=" + news['user_id'] + "' >" + news['username'] + "</a>" + 
                                    "</span>" + "发表了对" +
                                    "<span class='name'>" + 
                                        "<a href='resourcesDetails.html?target_id=" + news["target_id"] + "'>" + news['target_name'] + "</a>" + 
                                    "</span>" + "的评价" +
                                    "<br/>" +
                                    "<span class= 'time'>" +
                                        news['create_time'] +
                                    "</span>" +
                                    "<div class= 'news'>" +
                                        "评论内容：" + news['content'] +
                                    "</div>" + 
                                "</div>");
            } else if( news["type"] === "note" ) {
                var content = $("<div class='content min-height'>" +
                                    "<span class='name'>" + 
                                        "<a href='userInfo.html?user_id=" + news['user_id'] + "' >" + news['username'] + "</a>" + 
                                    "</span>" + "发表了关于" +
                                    "<span class='name'>" + 
                                        "<a href= 'resourcesDetails.html?target_id=" + news["target_id"] + "'>" + news['target_name'] + "</a>" + 
                                    "</span>" + "的笔记" +
                                    "<br/>" +
                                    "<span class= 'time'>" +
                                        news['create_time'] +
                                    "</span>" +
                                    "<div class= 'news'>" +
                                        "笔记内容：" + news['content'] +
                                    "</div>" + 
                                "</div>");
            } else {
                var content = $("<div class='content min-height'>" +
                                    "<span class='name'>" + 
                                        "<a href='userInfo.html?user_id=" + news['user_id'] + "' >" + news['username'] + "</a>" + 
                                    "</span>" + "为" +
                                    "<span class='name'>" + 
                                        "<a href= 'resourcesDetails.html?target_id=" + news["target_id"] + "'>" + news['target_name'] + "</a>" + 
                                    "</span>" + "添加了标签" +
                                    "<br/>" +
                                    "<span class= 'time'>" +
                                        news['create_time'] +
                                    "</span>" +
                                    "<div class= 'news'>" +
                                        "新增标签： " + news['content'] +
                                    "</div>" + 
                                "</div>");
            }
            
            var hr = $("<hr />");

            li.append(pic);
            li.append(content);
            li.append(hr);

            item_list.append(li);
        }
    });
});