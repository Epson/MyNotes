
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getMyFriendsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getMyFriends");
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	    $friends = $context->get("friends");

	    $friends_id = array();
	    for( $i = 0; $i < count($friends); $i ++ ) {
	    	$friends_id[] = $friends[$i]->friend_id;
	    }

	    $context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $friends_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $friends_mes = array();
	    for( $i = 0; $i < count($friends); $i ++ ) {
	    	$message = array();

	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["avatar"] = $users_mes[$i]->avatar; 
	    	$message["email"] = $users_mes[$i]->email; 
	    	$message["introduction"] = $users_mes[$i]->introduction; 

	    	$friends_mes[$i] = json_encode($message);
	    }

	    return json_encode($friends_mes);
	}
}