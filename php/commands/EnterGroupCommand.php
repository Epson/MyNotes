
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class EnterGroupCommand extends Command {
	private function enterGroup($user_id, $group_id, $enterTime) {
		$db = new DBManager();

		$db->excute( "INSERT INTO `in_group` (user_id, group_id, enter_time) VALUES ('$user_id', '$group_id', '$enterTime')" );
	}

	function excute(CommandContext $context) {
		date_default_timezone_set("PRC");
		
		$enterTime=date("Y-m-d H:i:s");
		$group_id = $context->get("group_id");
		$user_id = $context->get("user_id");


		$this->enterGroup($user_id, $group_id, $enterTime);
	}
}

?>