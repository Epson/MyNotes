

$(document).ready(function(){

	var login = function(username, password) {
		$.get("../php/takeAction.php", {"username" : username, "password" : password, "action" : "login"}, function(res) {
		  	var message = $.trim(res);
		  	
		  	if( message == "1" ) {
		  		alert("登陆成功");
		  		setTimeout(function() {
		  			if( username === "admin" ) {
		  				window.location.href = "admin.html";
		  			} else {
		  				window.location.href = "../index.php";
		  			}			  		
			  	}, 500);
		  	} else {
		  		alert("用户名或密码错误，请重新输入");
		  	}
		});
	};

	$("#loginButton").bind("click", function() {
		var username = $("#inputUsername").val();
		var password = $("#inputPassword").val();

		login(username, password);
	});

	$("form").bind("submit", function() {
		return false;
	});
});