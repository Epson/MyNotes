
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetUsersByTheirIdCommand extends Command {
	private function getUsersByTheirId($users_id) {
		$db = new DBManager();

		$users_mes = array();
		for( $i = 0; $i < count($users_id); $i ++ ) {
			$user_id = $users_id[$i];
			$result = $db->query( "SELECT * FROM `users` WHERE user_id = '$user_id'" );
			$users_mes[] = $result[0];
		}
		
		return $users_mes;
	}

	function excute(CommandContext $context) {
		$users_id = $context->get('users_id');

		$users_mes = $this->getUsersByTheirId($users_id);

		$context->addParam("users_mes", $users_mes);

		return true;
	}
}

?>
