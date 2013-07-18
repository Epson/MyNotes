
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetAllTagsCommand extends Command {
	private function getAllTags() {
		$db = new DBManager();

		$tags = $db->query( "SELECT * FROM `tags` WHERE tag_id IN (SELECT max(tag_id) FROM `tags` GROUP BY content)" );

		return $tags;
	}

	function excute(CommandContext $context) {
		$tags = $this->getAllTags();

		$context->addParam("tags", $tags);

		return true;
	}
}

?>
