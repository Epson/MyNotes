
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class FindUserCommand extends Command {
	private function getUserByUserName($username) {
		$db = new DBManager();
		$user = $db->query( "SELECT user_id FROM `users` WHERE username = '$username'" );

		if( empty($user) ) {
			return null;
		} else {
			return $user[0];
		}
	}	

	function excute(CommandContext $context) {
		$username = $context->get("username");
		$user_obj = $this->getUserByUserName($username);

		if( is_null($user_obj) ) {
			$context->setError("The friend does not exist");
			return false;
		} else {
			$context->addParam("user", $user_obj);
			return true;
		}
	}
}

?>