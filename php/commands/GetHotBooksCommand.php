
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetHotBooksCommand extends Command {
	private function getHotBooks() {
		$db = new DBManager();

		$hot_books = $db->query( "SELECT * FROM `target` WHERE category=0" );

		return $hot_books;
	}

	function excute(CommandContext $context) {
		$hot_books = $this->getHotBooks();

		$context->addParam("hot_books", $hot_books);

		return true;
	}
}

?>
