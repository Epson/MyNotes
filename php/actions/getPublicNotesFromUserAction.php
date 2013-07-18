
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getPublicNotesFromUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getPublicNotesFromUser");
	    $context->addParam("user_id", $_REQUEST['user_id']);
	    $context->addParam("pageId", $_REQUEST['pageId']);
	    $controller->process();
	    $public_notes = $context->get("public_notes");

	    $targets_id = array();
	    for( $i = 0; $i < count($public_notes); $i ++ ) {
	    	$targets_id[] = $public_notes[$i]->associate;
	    }

	    $context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");

	    $notes_array = array();
	    for( $i = 0 ; $i < count($public_notes); $i ++ ) {
	    	$note_message = array();
	    	$note_message["target_id"] = $targets_mes[$i]->target_id;
	    	$note_message["content"] = $public_notes[$i]->content;
	    	$note_message["create_time"] = $public_notes[$i]->create_time;
	    	$note_message["target_name"] = $targets_mes[$i]->target_name;
	    	$note_message["image"] = $targets_mes[$i]->image;
	    	$notes_array[$i] = $note_message;
	    }

	    return json_encode($notes_array);
	}
}