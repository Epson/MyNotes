
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetGroupsByTheirIdCommand extends Command {
	private function getGroupsByTheirId($groups_id) {
		$db = new DBManager();

		$groups_mes = array();
		for( $i = 0; $i < count($groups_id); $i ++ ) {
			$group_id = $groups_id[$i];
			$group_mes = $db->query( "SELECT * FROM `groups` WHERE group_id='$group_id'" );
			$groups_mes[] = $group_mes[0];
		}
		
		
		return $groups_mes;
	}

	function excute(CommandContext $context) {
		$groups_id = $context->get('groups_id');

		$groups_mes = $this->getGroupsByTheirId($groups_id);

		$context->addParam("groups_mes", $groups_mes);

		return true;
	}
}

?>
