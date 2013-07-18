<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="utf-8">
    <title>MyNotes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MyNotes">
    <meta name="author" content="huanghuiquan">

    <!-- styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">   <!-- common styles -->
    <link href="../css/personal.css" rel="stylesheet">   <!-- common styles -->

    <!-- js -->
    <script type="text/javascript" src="../javascript/lib/jquery-1.8.3.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrap">
        <!-- Nav -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <ul class="nav pull-right">
                        <li><a class="nav-text" href="#"><span>登陆</span></a></li>
                    </ul>
                    <a class="brand" href="#">MyNotes</a> <!-- logo -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="../index.php">首页</a></li>
                            <li><a href="hotResources.html">热门资源</a></li>
                            <li><a href="newsFeed.html">好友动态</a></li>
                            <li class="active"><a href="personal.html">个人中心</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div><!-- /Nav -->

        <!-- placeholder for 60px -->
        <div class="push"></div>

        <!-- container -->
        <div class="container" >
            <div class="row">
                <div class="span2 leftside">
                    <ul class="nav nav-list">
                        <li class="active"><a href="myNotes.html">我的笔记</a></li>
                        <li><a href="myComment.html">我的评论</a></li>
                        <li><a href="friendsList.html">好友列表</a></li>
                        <li><a href="personalInfo.html">个人资料</a></li>
                    </ul>
                </div>
                <div class="span10 rightside">
                    <!-- ToDo: 4 parts:
                    我的笔记
                    -->
                    <div class="myNotes">
                        <div class="_title">
                            <h2>好友动态</h2>
                            <hr />
                        </div>
                        <ul class="item-list">
                        </ul>
                    </div>
                    <div class="pagination">
                        <span class="current prev">上一页</span>
                        <span class="current">1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#" class="next">下一页</a>
                    </div>
                </div>
            </div>

        </div> <!-- /container -->
        <div class="push_20"></div>
        <div class="push"></div>
    </div>

    <!-- footer -->
    <div id="footer">
        <div class="container">
            <p>For Web2.0 Project <span class="muted">by FloatCloud Team</span></p>
        </div>
    </div> <!-- /footer -->

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $.get("../php/takeAction.php", {"username" : "xiaoquan", "password" : "xiaoquan", "action" : "login"}, function(res) {
        console.log("success to login");
    });

    var item_list = $(".item-list");
    
    $.getJSON("../php/takeAction.php", {"action" : "getNewsFromFriends"}, function(res) {

        for( var i = 0; i < res.length; i ++ ) {
            var news = res[i];
            var li = $("<li></li>");

            var pic = $("<div class='pic'>" +
                            "<a href='" + notes['target_id'] + "' >" +
                                "<img src='../" + notes['image'] + "' alt='" + notes['target_name'] + "' />" +
                            "</a>" +
                        "</div>");
            var content = $("<div class='content min-height'>" + 
                                "<span class='titile'>" +
                                    "<a href='" + notes['target_id'] + "' >" +
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
    });
});
</script>



<?php

 //    require_once("../php/Controller.php");

 //    $controller = new Controller();
 //    $context = $controller->getContext();

 //    $context->addParam("action", "login");
 //    $context->addParam("username", "xiaoquan");
 //    $context->addParam("password", "xiaoquan");
 //    $controller->process();

 //    $context->addParam("action", "getNewsFromFriends");
	// $context->addParam("user_id", $_SESSION['user_id']);
	// $controller->process();
?>