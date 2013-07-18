
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfUsersInGroupCommand extends Command {
	private function getNumberOfUsersInGroup($group_id) {
		$db = new DBManager();
		$numOfUsersInGroup = $db->query( "SELECT COUNT(*) AS amount FROM `in_group` WHERE group_id=$group_id" );

		return $numOfUsersInGroup[0];
	}

	function excute(CommandContext $context) {
		$group_id = $context->get("group_id");

		$numOfUsersInGroup = $this->getNumberOfUsersInGroup($group_id);

		$context->addParam("numOfUsersInGroup", $numOfUsersInGroup);

		return true;
	}
}

?>
