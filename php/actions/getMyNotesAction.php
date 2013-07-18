<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getMyNotesAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getMyNotes");
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $context->addParam("pageId", $_REQUEST['pageId']);
	    $controller->process();
	    $my_notes = $context->get("my_notes");

	    $targets_id = array();
	    for( $i = 0; $i < count($my_notes); $i ++ ) {
	    	$targets_id[] = $my_notes[$i]->associate;
	    }

	    $context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");

	    $notes_array = array();
	    for( $i = 0 ; $i < count($my_notes); $i ++ ) {
	    	$note_message = array();
	    	$note_message["target_id"] = $targets_mes[$i]->target_id;
	    	$note_message["content"] = $my_notes[$i]->content;
	    	$note_message["create_time"] = $my_notes[$i]->create_time;
	    	$note_message["target_name"] = $targets_mes[$i]->target_name;
	    	$note_message["image"] = $targets_mes[$i]->image;
	    	$notes_array[$i] = json_encode($note_message);
	    }

	    return json_encode($notes_array);
	}
}