
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class CheckInGroupCommand extends Command {
	private function checkInGroup($group_id, $user_id) {
		$db = new DBManager();

		$result = $db->query( "SELECT * FROM `in_group` WHERE user_id=$user_id AND group_id=$group_id" );

		if( empty($result) ) {
			return false;
		} else {
			return true;
		}
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');
		$user_id = $context->get('user_id');

		$result = $this->checkInGroup($group_id, $user_id);

		if( $result ) {
			$context->addParam("checkResult", "true");
		} else {
			$context->addParam("checkResult", "false");
		}

		return true;
	}
}

?>
