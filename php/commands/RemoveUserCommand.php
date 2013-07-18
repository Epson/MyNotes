
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class RemoveUserCommand extends Command {
	private function removeUser($user_id) {
		$db = new DBManager();
		$db->excute( "DELETE FROM `users` WHERE user_id = '$user_id'" );
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");

		$this->removeUser($user_id);
		return true;
	}
}