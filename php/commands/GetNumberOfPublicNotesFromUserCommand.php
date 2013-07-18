
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNumberOfPublicNotesFromUserCommand extends Command {
	private function getNumberOfPublicNotesFromUser($user_id, $beginId) {
		$db = new DBManager();

		$numOfPublicNotesFromUser = $db->query( "SELECT COUNT(*) AS amount FROM `notes` WHERE user_id=$user_id AND is_public=1" );

		return $numOfPublicNotesFromUser[0];
	}

	function excute(CommandContext $context) {
		$user_id = $context->get('user_id');
		$pageId = $context->get('pageId');
		$beginId = ($pageId - 1) * 5;

		$numOfPublicNotesFromUser = $this->getNumberOfPublicNotesFromUser($user_id, $beginId);

		$context->addParam("numOfPublicNotesFromUser", $numOfPublicNotesFromUser);

		return true;
	}
}

?>
