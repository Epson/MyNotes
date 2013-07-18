
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetCommentsFromUserCommand extends Command {
	private function getCommentsFromUser($user_id, $beginId) {
		$db = new DBManager();

		$comments = $db->query( "SELECT * FROM `comments` WHERE user_id='$user_id' LIMIT $beginId, 4" );

		return $comments;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 4;

		$comments = $this->getCommentsFromUser($user_id, $beginId);

		$context->addParam("comments", $comments);

		return true;
	}
}

?>
