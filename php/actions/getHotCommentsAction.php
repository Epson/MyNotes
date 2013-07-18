<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getHotCommentsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getHotComments");
	    $controller->process();
	    $hot_comments = $context->get("hot_comments");

	    $users_id = array();
		for( $i = 0; $i < count($hot_comments); $i ++ ) {
			$users_id[] = $hot_comments[$i]->user_id;
		}
		$context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $targets_id = array();
	    for( $i = 0; $i < count($hot_comments); $i ++ ) {
	    	$targets_id[] = $hot_comments[$i]->associate;
	    }
	    $context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");

	    $hot_comments_array = array();
	    for( $i = 0 ; $i < count($hot_comments); $i ++ ) {
	    	$hot_comment_message = array();
	    	$hot_comment_message["comment_id"] = $hot_comments[$i]->comment_id;
	    	$hot_comment_message["user_id"] = $hot_comments[$i]->user_id;
	    	$hot_comment_message["username"] = $users_mes[$i]->username;
	    	$hot_comment_message["avatar"] = $users_mes[$i]->avatar;
	    	$hot_comment_message["target_id"] = $targets_mes[$i]->target_id;
	    	$hot_comment_message["target_name"] = $targets_mes[$i]->target_name;
	    	$hot_comment_message["content"] = $hot_comments[$i]->content;
	    	$hot_comment_message["create_time"] = $hot_comments[$i]->create_time;

	    	$hot_comments_array[$i] = $hot_comment_message;
	    }

	    return json_encode($hot_comments_array);
	}
}