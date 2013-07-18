

$(document).ready(function(){

	var register = function(username, password) {
		$.get("../php/takeAction.php", {"username" : username, "password" : password, "action" : "register"}, function(res) {
		  	alert("注册成功");

		  	setTimeout(function() {
			  	window.location.href = "../index.php";
			}, 500);
		});
	};

	$("#registerButton").bind("click", function() {
		var username = $("#inputUsername").val();
		var password = $("#inputPassword").val();
		var reInputPassword = $("#reInputPassword").val();

		if( reInputPassword !== password ) {
			alert("两次输入密码不一致，请重新输入");
			return false;
		}

		register(username, password);
	});

	$("form").bind("submit", function() {
		return false;
	});
});