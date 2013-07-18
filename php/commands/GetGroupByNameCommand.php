
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetGroupByNameCommand extends Command {
	private function getGroupsByName($group_name) {
		$db = new DBManager();

		$group_mes = $db->query( "SELECT * FROM `groups` WHERE group_name='$group_name'" );
		
		return $group_mes;
	}

	function excute(CommandContext $context) {
		$group_name = $context->get('group_name');

		$group_mes = $this->getGroupsByName($group_name);

		$context->addParam("group_mes", $group_mes);

		return true;
	}
}

?>
