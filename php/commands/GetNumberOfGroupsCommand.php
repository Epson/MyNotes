
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfGroupsCommand extends Command {
	private function getNumberOfGroups() {
		$db = new DBManager();
		$numOfGroups = $db->query( "SELECT COUNT(*) AS amount FROM `groups`" );

		return $numOfGroups[0];
	}

	function excute(CommandContext $context) {
		$numOfGroups = $this->getNumberOfGroups();

		$context->addParam("numOfGroups", $numOfGroups);

		return true;
	}
}

?>
