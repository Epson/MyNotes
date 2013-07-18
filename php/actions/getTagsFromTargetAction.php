
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getTagsFromTargetAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getTagsFromTarget");
	    $context->addParam("target_id", $_REQUEST['target_id']);
	    $controller->process();
	    $tags = $context->get("tags");

	    $tags_array = array();
	    for( $i = 0 ; $i < count($tags); $i ++ ) {
	    	$tag_message = array();
	    	$tag_message["content"] = $tags[$i]->content;
	    	$tag_message["associate"] = $tags[$i]->associate;
	    	$tag_message["user_id"] = $tags[$i]->user_id;
	    	$tag_message["create_time"] = $tags[$i]->create_time;

	    	$tags_array[$i] = $tag_message;
	    }
	    

	    return json_encode($tags_array);
	}
}