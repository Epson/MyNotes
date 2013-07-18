
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class CreateTargetCommand extends Command {
	private function createTarget($targetName, $author, $category, $image, $introduction) {
		$db = new DBManager();

		$db->excute("INSERT INTO `target` VALUES (NULL, '$targetName', '$author', '$category', '$image', '$introduction')");

		$target = $db->query( "SELECT * FROM target WHERE target_id = (SELECT Max(target_id) FROM target WHERE author=$author)" );
		$target_id = $target[0]->target_id;

		return $target_id;
	}
        
	function excute(CommandContext $context) {		
		$targetName = $context->get('targetName');
		$author = $context->get('author');
		$category = $context->get('category');
		$image = $context->get('image');
        $introduction = $context->get('introduction');
                                           
		$target_id = $this->createTarget($targetName, $author, $category, $image, $introduction);
                                
		$context->addParam("target_id", $target_id);

		return true;
	}
}

?>