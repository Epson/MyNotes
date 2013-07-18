
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class CheckIsFriendCommand extends Command {
	private function checkIsFriend($friend_id, $user_id) {
		$db = new DBManager();

		$result = $db->query( "SELECT * FROM `be_friends` WHERE user_id=$user_id AND friend_id=$friend_id" );

		if( empty($result) ) {
			return false;
		} else {
			return true;
		}
	}

	function excute(CommandContext $context) {
		$friend_id = $context->get('friend_id');
		$user_id = $context->get('user_id');

		$result = $this->checkIsFriend($friend_id, $user_id);

		if( $result ) {
			$context->addParam("checkResult", "true");
		} else {
			$context->addParam("checkResult", "false");
		}

		return true;
	}
}

?>
