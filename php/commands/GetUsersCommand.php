
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetUsersCommand extends Command {
	private function getUsers($beginId) {
		$db = new DBManager();

		$users_mes = array();
		$users_mes = $db->query( "SELECT * FROM `users` LIMIT $beginId, 10" );
		
		return $users_mes;
	}

	function excute(CommandContext $context) {
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 10;

		$users_mes = $this->getUsers($beginId);

		$context->addParam("users_mes", $users_mes);

		return true;
	}
}

?>
