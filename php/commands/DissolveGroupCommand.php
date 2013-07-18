
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class DissolveGroupCommand extends Command {
	private function dissolveGroup($group_id, $user_id) {
		$db = new DBManager();

		$db->excute( "DELETE FROM `groups` WHERE group_id=$group_id AND creator=$user_id" ); 
	}

	function excute(CommandContext $context) {
		$group_id = $context->get("group_id");
		$user_id = $context->get("user_id");

		$this->dissolveGroup($group_id, $user_id);
	}
}

?>