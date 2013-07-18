
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfMyCommentsCommand extends Command {
	private function getNumberOfMyComments($user_id) {
		$db = new DBManager();
		$numOfMyComments = $db->query( "SELECT COUNT(*) AS amount FROM `comments` WHERE user_id=$user_id" );

		return $numOfMyComments[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");
		$numOfMyComments = $this->getNumberOfMyComments($user_id);

		$context->addParam("numOfMyComments", $numOfMyComments);

		return true;
	}
}

?>
