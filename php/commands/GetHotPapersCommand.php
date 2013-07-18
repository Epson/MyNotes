
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetHotPapersCommand extends Command {
	private function getHotPapers() {
		$db = new DBManager();

		$hot_papers = $db->query( "SELECT * FROM `target` WHERE category=2" );

		return $hot_papers;
	}

	function excute(CommandContext $context) {
		$hot_papers = $this->getHotPapers();

		$context->addParam("hot_papers", $hot_papers);

		return true;
	}
}

?>
