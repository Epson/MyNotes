
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getUsersByNameAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getUsersByName");
	    $context->addParam("username", $_REQUEST['username']);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $users = array();
	    for( $i = 0; $i < count($users_mes); $i ++ ) {
	    	$message = array();

	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["avatar"] = $users_mes[$i]->avatar; 
	    	$message["email"] = $users_mes[$i]->email; 
	    	$message["introduction"] = $users_mes[$i]->introduction; 

	    	$users[$i] = $message;
	    }

	    return json_encode($users);
	}
}