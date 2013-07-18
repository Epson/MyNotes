
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetUsersInGroupCommand extends Command {
	private function getUsersInGroup($group_id, $beginId) {
		$db = new DBManager();

		$users_in_group = $db->query( "SELECT * FROM `in_group` WHERE group_id='$group_id' LIMIT $beginId, 10" );

		return $users_in_group;
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 10;

		$users_in_group = $this->getUsersInGroup($group_id, $beginId);

		$context->addParam("users_in_group", $users_in_group);

		return true;
	}
}

?>
