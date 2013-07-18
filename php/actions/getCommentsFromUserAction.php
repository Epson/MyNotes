<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getCommentsFromUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getCommentsFromUser");
	    $context->addParam("user_id", $_REQUEST['user_id']);
	    $context->addParam("pageId", $_REQUEST['pageId']);
	    $controller->process();
	    $comments = $context->get("comments");

	    $targets_id = array();
	    for( $i = 0; $i < count($comments); $i ++ ) {
	    	$targets_id[] = $comments[$i]->associate;
	    }

	    $context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");

	    $comments_array = array();
	    for( $i = 0 ; $i < count($comments); $i ++ ) {
	    	$comment_message = array();
	    	$comment_message["target_id"] = $targets_mes[$i]->target_id;
	    	$comment_message["content"] = $comments[$i]->content;
	    	$comment_message["create_time"] = $comments[$i]->create_time;
	    	$comment_message["target_name"] = $targets_mes[$i]->target_name;
	    	$comment_message["image"] = $targets_mes[$i]->image;
	    	$comments_array[$i] = $comment_message;
	    }

	    return json_encode($comments_array);
	}
}