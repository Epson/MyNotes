
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetUsersByNameCommand extends Command {
	private function getUsersByName($username) {
		$db = new DBManager();

		$users_mes = array();
		$users_mes = $db->query( "SELECT * FROM `users` WHERE username like '%$username%'" );
		
		return $users_mes;
	}

	function excute(CommandContext $context) {
		$username = $context->get('username');

		$users_mes = $this->getUsersByName($username);

		$context->addParam("users_mes", $users_mes);

		return true;
	}
}

?>
