
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetCommentsFromTargetCommand extends Command {
	private function getCommentsFromTarget($target_id) {
		$db = new DBManager();

		$comments = $db->query( "SELECT * FROM `comments` WHERE associate='$target_id'" );

		return $comments;
	}

	function excute(CommandContext $context) {
		$target_id = $context->get('target_id');

		$comments = $this->getCommentsFromTarget($target_id);

		$context->addParam("comments", $comments);

		return true;
	}
}

?>
