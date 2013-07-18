
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetGroupByIdCommand extends Command {
	private function getGroupById($group_id) {
		$db = new DBManager();

		$group_mes = $db->query( "SELECT * FROM `groups` WHERE group_id= '$group_id'" );
		
		return $group_mes;
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');

		$group_mes = $this->getGroupById($group_id);

		$context->addParam("group_mes", $group_mes);

		return true;
	}
}

?>
