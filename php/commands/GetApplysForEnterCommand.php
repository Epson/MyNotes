
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetApplysForEnterCommand extends Command {
	private function getApplysForEnter($group_id) {
		$db = new DBManager();

		$applys_in_group = $db->query( "SELECT * FROM `enter_apply` WHERE group_id='$group_id'" );

		return $applys_in_group;
	}

	function excute(CommandContext $context) {
		$group_id = $context->get('group_id');

		$applys_in_group = $this->getApplysForEnter($group_id);

		$context->addParam("applys_in_group", $applys_in_group);

		return true;
	}
}

?>
