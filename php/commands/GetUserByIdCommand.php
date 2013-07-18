
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetUserByIdCommand extends Command {
	private function getUserById($user_id) {
		$db = new DBManager();

		$user_mes = $db->query( "SELECT * FROM `users` WHERE user_id='$user_id'" );

		return $user_mes[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');

		$user_mes = $this->getUserById($user_id);

		$context->addParam("user_mes", $user_mes);

		return true;
	}
}

?>
