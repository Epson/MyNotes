

$(document).ready(function(){

	var createResource = function(target_name, category, introduction, marks, fileObj) {
		var form = new FormData();

		form.append("action", "createTarget");
		form.append("target_name", target_name);
		form.append("category", category);
		form.append("introduction", introduction);
		form.append("tags", marks);
		form.append("image", fileObj);

		// // XMLHttpRequest 对象
        var xhr = new XMLHttpRequest();
        xhr.open("post", "../php/takeAction.php", true);
        xhr.onreadystatechange = function() {
            if( xhr.readyState == 4 ) {
            	if (xhr.status==200) {// 200 = OK
            		var target_id = $.trim(xhr.responseText);
            		alert("创建成功");
            		// setTimeout(function() {
            		// 	window.location.href = "resourcesDetails.html?target_id=" + target_id;
            		// }, 500);
    			}
            }
        }
        xhr.send(form);
	};

	$("#createResource").bind("click", function() {
		var target_name = $("#title").val();
		var introduction = $("#contextBrief").val();
		var category = $("#category").val();
		var marks = $("#marks").val();
		var fileObj = document.getElementById("image").files[0];

		createResource(target_name, category, introduction, marks, fileObj);
	});

	$("form").live("submit", function() {
		return false;
	});
});