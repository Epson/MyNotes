
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetGroupsByUserCommand extends Command {
	private function getGroupsByUser($user_id) {
		$db = new DBManager();

		$groups = $db->query( "SELECT * FROM `in_group` WHERE user_id='$user_id'" );

		return $groups;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');

		$groups = $this->getGroupsByUser($user_id);

		$context->addParam("groups", $groups);

		return true;
	}
}

?>
