
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfMyFriendsCommand extends Command {
	private function getNumberOfMyFriends($user_id) {
		$db = new DBManager();
		$numOfMyFriends = $db->query( "SELECT COUNT(*) AS amount FROM `be_friends` WHERE user_id=$user_id" );

		return $numOfMyFriends[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");
		$numOfMyFriends = $this->getNumberOfMyFriends($user_id);

		$context->addParam("numOfMyFriends", $numOfMyFriends);

		return true;
	}
}

?>
