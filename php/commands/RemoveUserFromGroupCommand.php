
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class RemoveUserFromGroupCommand extends Command {
	private function removeUserFromGroup($user_id, $group_id) {
		$db = new DBManager();
		$db->excute( "DELETE FROM `in_group` WHERE user_id=$user_id AND group_id=$group_id" );
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");
		$group_id = $context->get("group_id");

		$this->removeUserFromGroup($user_id, $group_id);

		return true;
	}
}