
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class ApplyForEnteringGroupCommand extends Command {
	private function applyForEnteringGroup($user_id, $group_id, $remarks) {
		$db = new DBManager();

		$db->excute( "INSERT INTO `enter_apply` (user_id, group_id, remarks) VALUES ('$user_id', '$group_id', '$remarks')" );
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');
		$remarks = $context->get('remarks');
		$user_id = $_SESSION['user_id'];

		$this->applyForEnteringGroup($user_id, $group_id, $remarks);

		return true;
	}
}

?>