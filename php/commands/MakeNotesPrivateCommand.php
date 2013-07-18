
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class MakeNotesPrivateCommand extends Command {
	private function makeNotesPrivate($note_id) {
		$db = new DBManager();
		$db->excute( "UPDATE `notes` SET is_public = false WHERE note_id = $note_id" );
	}

	function excute(CommandContext $context) {
		$note_id = $context->get("note_id");

		$this->makeNotesPrivate($note_id);
	}
}

?>