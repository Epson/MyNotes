$(document).ready(function(){

	$(".form-horizontal").live("submit", function() {
		return false;
	});
	
	var render = function(username, avatar, email, introduction) {
		var img = document.createElement("img");
		img.src = "../" + avatar ;
		document.getElementById("avatar").appendChild(img);

		document.getElementById("email").value = email;
		document.getElementById("username").value = username;
		document.getElementById("introduction").innerHTML = introduction;
	};

	$.getJSON("../php/takeAction.php", {"action" : "getMyInformation"}, function(res) {
		var username = res["username"];
		var avatar = res["avatar"];
		var email = res["email"];
		var introduction = res["introduction"];
		
		render(username, avatar, email, introduction);
	});

	var validate = function(username, email, introduction) {
		if( !username || !email || !introduction ) {
			return false;
		}
	};	

	var updateMyInfo = function() {
		var username = document.getElementById("username").value;
		var email = document.getElementById("email").value;
		var introduction = document.getElementById("introduction").value;
		var fileObj = document.getElementById("image").files[0];
		var form = new FormData();
	
		// validate(username, email, introduction);

		form.append("action", "updateMyInformation");
		form.append("username", username);
		form.append("email", email);
		form.append("introduction", introduction);
		form.append("avatar", fileObj);

		// // XMLHttpRequest 对象
        var xhr = new XMLHttpRequest();
        xhr.open("post", "../php/takeAction.php", true);
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 ) {
            	if (xhr.status==200) {// 200 = OK
            		var src = $.trim(xhr.responseText);
					var avatar = document.getElementById("avatar");

					avatar.innerHTML = "<img src='../" + src + "' />";
					alert("修改成功");
    			}
            }
        }
        xhr.send(form);


	};

	$("#submit").live("click", updateMyInfo);
});