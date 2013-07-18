
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetHotCommentsCommand extends Command {
	private function getHotComments() {
		$db = new DBManager();

		$hot_comments = $db->query( "SELECT * FROM `comments`" );

		return $hot_comments;
	}

	function excute(CommandContext $context) {
		$hot_comments = $this->getHotComments();

		$context->addParam("hot_comments", $hot_comments);

		return true;
	}
}

?>
