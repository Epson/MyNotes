
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class MakeNotesPublicCommand extends Command {
	private function makeNotesPublic($note_id) {
		$db = new DBManager();
		$result = $db->excute( "UPDATE `notes` SET is_public = true WHERE note_id = $note_id" );
	}

	function excute(CommandContext $context) {
		$note_id = $context->get("note_id");

		$this->makeNotesPublic($note_id);
	}
}

?>