
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetMyNotesCommand extends Command {
	private function getMyNotes($user_id, $beginId) {
		$db = new DBManager();

		$my_notes = $db->query( "SELECT * FROM `notes` WHERE user_id='$user_id' LIMIT $beginId, 5" );

		return $my_notes;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 5;

		$my_notes = $this->getMyNotes($user_id, $beginId);

		$context->addParam("my_notes", $my_notes);

		return true;
	}
}

?>
