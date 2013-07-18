
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfUsersCommand extends Command {
	private function getNumberOfUsers() {
		$db = new DBManager();

		$numOfUsers = $db->query( "SELECT COUNT(*) AS amount FROM `users`" );

		return $numOfUsers[0];
	}

	function excute(CommandContext $context) {
		$numOfUsers = $this->getNumberOfUsers();

		$context->addParam("numOfUsers", $numOfUsers);

		return true;
	}
}

?>
