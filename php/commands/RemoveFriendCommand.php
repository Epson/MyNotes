
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class RemoveFriendCommand extends Command {
	private function removeFriend($user_id, $friend_id) {
		$db = new DBManager();
		$db->excute( "DELETE FROM `be_friends` WHERE user_id = '$user_id' AND friend_id = '$friend_id'" );
	}	

	function excute(CommandContext $context) {
		$friend_id = $context->get("friend_id");
		$user_id =$context->get("user_id");

		if( is_null($friend_id) ) {
			$context->setError("The friend does not exist");
			return false;
		} else {
			$this->removeFriend($user_id, $friend_id);
			return true;
		}
	}
}