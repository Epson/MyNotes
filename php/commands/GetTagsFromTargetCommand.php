
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetTagsFromTargetCommand extends Command {
	private function getTagsFromTarget($target_id) {
		$db = new DBManager();

		$tags = $db->query( "SELECT * FROM `tags` WHERE associate='$target_id'" );

		return $tags;
	}

	function excute(CommandContext $context) {
		$target_id = $context->get('target_id');

		$tags = $this->getTagsFromTarget($target_id);

		$context->addParam("tags", $tags);

		return true;
	}
}

?>
