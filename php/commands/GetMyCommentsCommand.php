
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetMyCommentsCommand extends Command {
	private function getMyComments($user_id, $beginId) {
		$db = new DBManager();

		$my_comments = $db->query( "SELECT * FROM `comments` WHERE user_id = '$user_id' LIMIT $beginId, 5" );

		return $my_comments;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 5;

		$my_comments = $this->getMyComments($user_id, $beginId);

		$context->addParam("my_comments", $my_comments);

		return true;
	}
}

?>
