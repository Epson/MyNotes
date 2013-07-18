
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetTargetsByTheirIdCommand extends Command {
	private function getTargetsByTheirId($targets_id) {
		$db = new DBManager();

		$targets_mes = array();
		for( $i = 0; $i < count($targets_id); $i ++ ) {
			$target_id = $targets_id[$i];
			$result = $db->query( "SELECT * FROM `target` WHERE target_id='$target_id'" );
			$targets_mes[] = $result[0];
		}
		 
		return $targets_mes;
	}

	function excute(CommandContext $context) {
		$targets_id = $context->get('targets_id');

		$targets_mes = $this->getTargetsByTheirId($targets_id);

		$context->addParam("targets_mes", $targets_mes);

		return true;
	}
}

?>
