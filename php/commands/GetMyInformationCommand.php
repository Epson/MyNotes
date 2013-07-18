
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetMyInformationCommand extends Command {
	private function getMyInformation($user_id) {
		$db = new DBManager();
		$user = $db->query( "SELECT user_id, username, avatar, email, introduction FROM `users` WHERE user_id='$user_id'" );

		return $user[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$user = $this->getMyInformation($user_id);
		$context->addParam("user", $user);

		return true;
	}
}