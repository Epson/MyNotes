
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfMyNotesCommand extends Command {
	private function getNumberOfMyNotes($user_id) {
		$db = new DBManager();
		$numOfMyNotes = $db->query( "SELECT COUNT(*) AS amount FROM `notes` WHERE user_id=$user_id" );

		return $numOfMyNotes[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");
		$numOfMyNotes = $this->getNumberOfMyNotes($user_id);

		$context->addParam("numOfMyNotes", $numOfMyNotes);

		return true;
	}
}

?>
