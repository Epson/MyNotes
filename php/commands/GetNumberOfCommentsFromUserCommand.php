
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfCommentsFromUserCommand extends Command {
	private function getNumberOfCommentsFromUser($user_id, $beginId) {
		$db = new DBManager();

		$numOfCommentsFromUser = $db->query( "SELECT COUNT(*) AS amount FROM `comments` WHERE user_id=$user_id" );

		return $numOfCommentsFromUser[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 5;

		$numOfCommentsFromUser = $this->getNumberOfCommentsFromUser($user_id, $beginId);

		$context->addParam("numOfCommentsFromUser", $numOfCommentsFromUser);

		return true;
	}
}

?>
