
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class CheckIsGroupCreatorCommand extends Command {
	private function checkIsGroupCreator($group_id, $user_id) {
		$db = new DBManager();

		$result = $db->query( "SELECT * FROM `groups` WHERE creator=$user_id AND group_id=$group_id" );

		if( empty($result) ) {
			return false;
		} else {
			return true;
		}
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');
		$user_id = $context->get('user_id');

		$result = $this->checkIsGroupCreator($group_id, $user_id);

		if( $result ) {
			$context->addParam("checkResult", "true");
		} else {
			$context->addParam("checkResult", "false");
		}

		return true;
	}
}

?>
