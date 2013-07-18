
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetGroupsCommand extends Command {
	private function getGroups($beginId) {
		$db = new DBManager();

		$group_mes = $db->query( "SELECT * FROM `groups` LIMIT $beginId, 6" );
		
		return $group_mes;
	}

	function excute(CommandContext $context) {
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 6;

		$group_mes = $this->getGroups($beginId);

		$context->addParam("group_mes", $group_mes);

		return true;
	}
}

?>
