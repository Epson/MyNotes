
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class AddTagsCommand extends Command {
	private function addTags($user_id, $tags, $associate, $showtime) {
		$db = new DBManager();

		for( $i = 0; $i < count($tags); $i ++ ) {
			$content = $tags[$i];
			$db->excute("INSERT INTO `tags` VALUES (NULL, $user_id, '$content', $associate, '$showtime')");
		}
		
	}
       
	function excute(CommandContext $context) {
		date_default_timezone_set("PRC");
		$showtime=date("Y-m-d H:i:s");
        $tags_str = $context->get('tags');
        $associate = $context->get('associate');
        $user_id = $context->get('user_id');

        $tags = explode(" ", $tags_str);

        $this->addTags($user_id, $tags, $associate, $showtime);

        return true;
	}
}