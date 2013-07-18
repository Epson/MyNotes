
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNotesFromUserCommand extends Command {
	private function getNotesFromUser($user_id, $beginId) {
		$db = new DBManager();

		$notes = $db->query( "SELECT * FROM `notes` WHERE user_id=$user_id LIMIT $beginId, 4" );

		return $notes;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 4;

		$notes = $this->getNotesFromUser($user_id, $beginId);

		$context->addParam("notes", $notes);

		return true;
	}
}

?>
