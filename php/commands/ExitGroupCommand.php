
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class ExitGroupCommand extends Command {
	private function exitGroup($user_id, $group_id) {
		$db = new DBManager();

		$db->excute( "DELETE FROM `in_group` WHERE user_id = '$user_id' AND group_id = '$group_id'" );
	}

	function excute(CommandContext $context) {
		$group_id = $context->get("group_id");
		$user_id = $context->get("user_id");

		$this->exitGroup($user_id, $group_id);
	}
}

?>