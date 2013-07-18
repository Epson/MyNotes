
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class AddFriendCommand extends Command {
	private function addFriend($user_id, $friend_id) {
		$db = new DBManager();

		$db->excute( "INSERT INTO `be_friends` (user_id, friend_id) VALUES ($user_id, $friend_id)" );
	}

	function excute(CommandContext $context) {
		$friend_id = $context->get("friend_id");
		$user_id = $context->get("user_id");

		if( is_null($friend_id) ) {
			$context->setError("The friend does not exist");
			return false;
		} else {
			$this->addFriend($user_id, $friend_id);
			// $context->addParam("user", $user_obj);
			return true;
		}
	}
}

?>