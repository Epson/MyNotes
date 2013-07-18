
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getUsersInGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getUsersInGroup");
		$context->addParam("pageId", $_REQUEST['pageId']);
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $controller->process();
	    $users_in_group = $context->get("users_in_group");

	    $users_id = array();
	    for( $i = 0; $i < count($users_in_group); $i ++ ) {
	    	$users_id[] = $users_in_group[$i]->user_id;
	    }

	    $context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $users = array();
	    for( $i = 0; $i < count($users_mes); $i ++ ) {
	    	$message = array();

	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["avatar"] = $users_mes[$i]->avatar; 
	    	$message["email"] = $users_mes[$i]->email; 
	    	$message["enter_time"] = $users_in_group[$i]->enter_time; 

	    	$users[$i] = $message;
	    }

	    return json_encode($users);
	}
}