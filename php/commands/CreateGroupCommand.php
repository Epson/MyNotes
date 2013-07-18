
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class CreateGroupCommand extends Command {
	private function createGroup($groupName, $creator, $introduction, $createTime) {
		$db = new DBManager();

		$db->excute("INSERT INTO `groups` VALUES (NULL, '$groupName', $creator, '$introduction', '$createTime')");
		$group = $db->query( "SELECT * FROM groups WHERE group_id = (SELECT Max(group_id) FROM groups WHERE creator=$creator)" );
		$group_id = $group[0]->group_id;

		$db->excute("INSERT INTO `in_group` VALUES ($creator, $group_id, '$createTime')");
	}

	function excute(CommandContext $context) {

		date_default_timezone_set("PRC");
		
		$groupName = $context->get('groupName');
		$introduction = $context->get('introduction');
		$creator = $context->get('creator');;
		$createTime=date("Y-m-d H:i:s");
		$this->createGroup($groupName, $creator, $introduction, $createTime);

		return true;
	}
}

?>