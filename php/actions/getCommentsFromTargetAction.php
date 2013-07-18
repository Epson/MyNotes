
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getCommentsFromTargetAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getCommentsFromTarget");
	    $context->addParam("target_id", $_REQUEST['target_id']);
	    $controller->process();
	    $comments = $context->get("comments");

	    $users_id = array();
		for( $i = 0; $i < count($comments); $i ++ ) {
			$users_id[] = $comments[$i]->user_id;
		}
		$context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $comments_array = array();
	    for( $i = 0 ; $i < count($comments); $i ++ ) {
	    	$comment_message = array();
	    	$comment_message["user_id"] = $users_mes[$i]->user_id;
	    	$comment_message["username"] = $users_mes[$i]->username;
	    	$comment_message["avatar"] = $users_mes[$i]->avatar;
	    	$comment_message["content"] = $comments[$i]->content;

	    	$comments_array[$i] = $comment_message;
	    }

	    return json_encode($comments_array);
	}
}