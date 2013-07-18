

$(document).ready(function(){

	var createGroup = function(groupName, groupIntro) {
		$.get("../php/takeAction.php", {"groupName": groupName, "introduction": groupIntro, "action": "createGroup"}, function(res) {
		  	alert("小组创建成功");
		  	window.location.href = "group.html";
		});
	};

	$("#createGroupButton").bind("click", function() {
		var groupName = $("#groupName").val();
		var groupIntro = $("#groupIntro").val();

		createGroup(groupName, groupIntro);
	});
});