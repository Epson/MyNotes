<html lang="zh_cn">
  	<head>
    	<meta charset="utf-8">
    	<title>testGetUsersInGroup</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="MyNotes">
	    <meta name="author" content="huanghuiquan">

	    <!-- styles -->
	    <link href="../css/bootstrap.css" rel="stylesheet">
	    <link href="../css/style.css" rel="stylesheet">   <!-- common styles -->

	    <script src="../javascript/lib/jquery-1.8.3.min.js"></script>

	    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->

		<style>
			table {
				margin-left:100px;
				text-align:center;
			}

			td {
				height: 50px;
				width: 200px;
				display: inline-block;
			}
		</style>
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
				                <li class="active"><a href="newsFeed.html">好友动态</a></li>
				                <li><a href="personal.html">个人中心</a></li>
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
	          		<div id="index-search"  class="span12">
	            		<div class="span6 offset3">
	              			<form class="form-search">
	                			<div class="input-append">
	                  				<input type="text" placeholder="搜索资源/成员" class="span5 search-query">
	                  				<button type="submit" class="btn ">Search</button>
	                			</div>
	              			</form>
	            		</div>
	          		</div>
	        	</div>

	        	<div class="row" style="padding-left:20px;">
	        		<input type="hidden" name="action" id="action" value="getUsersInGroup" />
		        	group_id: <input type="text" id="group_id" name="group_id" />
		        	<input type="submit" id="submit" />
	        	</div>
	      	</div> <!-- /container -->

	      	<table id="users">

		    </table>
	    </div>

	    <!-- footer -->
	    <div id="footer">
	      	<div class="container">
	        	<p>For Web2.0 Project <span class="muted">by FloatCloud Team</span></p>
	      	</div>
	    </div> <!-- /footer -->
  	</body>
</html>

<script>

$(document).ready(function(){
  	var table = $("#users");
  	var text = document.getElementById("group_id");
  	var submit = document.getElementById("submit");
  	var action = document.getElementById("action").value;

	
  	var getUsersInGroup = function() {
  		var group_id = text.value;
  		var tbody = $("<tbody></tbody>");
  		var tr = $("<tr></tr>");

	  	tr.append($("<td> user_id 	</td>"));
	  	tr.append($("<td> username 	</td>"));
	  	tr.append($("<td> avatar 	</td>"));
	  	tr.append($("<td> email		</td>"));
	  	tr.append($("<td> enter_time </td>"));
	  	tbody.append(tr);

  		$.getJSON("../php/takeAction.php", {"group_id" : group_id, "action" : action}, function(res) {
	  		for( var i = 0; i < res.length; i ++ ) {
	  			var user = jQuery.parseJSON(res[i]);
	  			var tr = $("<tr></tr>");

	  			tr.append($("<td>" + user["user_id"] 	+ "</td>"));
	  			tr.append($("<td>" + user["username"] 	+ "</td>"));
	  			tr.append($("<td>" + user["avatar"] 	+ "</td>"));
	  			tr.append($("<td>" + user["email"] 		+ "</td>"));
	  			tr.append($("<td>" + user["enter_time"] + "</td>"));
	  			tbody.append(tr);
	  		}

	  		table.html(tbody);
	  	});
  	};

  	submit.onclick = getUsersInGroup;
});

</script>