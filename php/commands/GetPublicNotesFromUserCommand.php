
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetPublicNotesFromUserCommand extends Command {
	private function getPublicNotesFromUser($user_id, $beginId) {
		$db = new DBManager();

		$public_notes = $db->query( "SELECT * FROM `notes` WHERE user_id =$user_id AND is_public = 1 LIMIT $beginId, 4" );
		
		return $public_notes;
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 4;

		$public_notes = $this->getPublicNotesFromUser($user_id, $beginId);

		$context->addParam("public_notes", $public_notes);

		return true;
	}
}

?>
