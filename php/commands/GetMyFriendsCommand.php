
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetMyFriendsCommand extends Command {
	private function getMyFriends($user_id) {
		$db = new DBManager();

		$friends = $db->query( "SELECT * FROM `be_friends` WHERE user_id='$user_id'" );

		return $friends;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');

		$friends = $this->getMyFriends($user_id);

		$context->addParam("friends", $friends);

		return true;
	}
}

?>
