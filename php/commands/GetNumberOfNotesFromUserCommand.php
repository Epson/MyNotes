
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfNotesFromUserCommand extends Command {
	private function getNumberOfNotesFromUser($user_id, $beginId) {
		$db = new DBManager();

		$numOfNotesFromUser = $db->query( "SELECT COUNT(*) AS amount FROM `notes` WHERE user_id=$user_id" );

		return $numOfNotesFromUser[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 5;

		$numOfNotesFromUser = $this->getNumberOfNotesFromUser($user_id, $beginId);

		$context->addParam("numOfNotesFromUser", $numOfNotesFromUser);

		return true;
	}
}

?>
