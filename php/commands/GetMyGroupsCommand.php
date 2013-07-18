
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetMyGroupsCommand extends Command {
	private function getMyGroups($user_id) {
		$db = new DBManager();

		$my_groups = $db->query( "SELECT * FROM `in_group` WHERE user_id='$user_id'" );

		return $my_groups;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');

		$my_groups = $this->getMyGroups($user_id);

		$context->addParam("my_groups", $my_groups);

		return true;
	}
}

?>
