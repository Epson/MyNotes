
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class AddCommentCommand extends Command {
	private function addComment($user_id, $content, $associate, $create_time) {
		$db = new DBManager();

		$db->excute("INSERT INTO `comments` VALUES (NULL, '$user_id', '$content', '$associate', '$create_time')");
	}
              
	function excute(CommandContext $context) {
		date_default_timezone_set("PRC");
		
		$user_id = $context->get('user_id');
        $content = $context->get('content');
        $associate = $context->get('associate');
        $create_time = date("Y-m-d H:i:s"); 	//这一句是放在action层好还是在command层好呢

        $this->addComment($user_id, $content, $associate, $create_time);

        return true;
	}
}

?>