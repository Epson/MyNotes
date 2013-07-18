
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class GetUserByIdAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getUserById");
	    $context->addParam("user_id", $_REQUEST['user_id']);
	    $controller->process();
	    $user_mes = $context->get("user_mes");

	    $message = array();
	    $message["username"] = $user_mes->username; 
	    $message["group_name"] = $user_mes->user_id; 
	    $message["avatar"] = $user_mes->avatar; 
	    $message["email"] = $user_mes->email; 
	    $message["introduction"] = $user_mes->introduction; 

	    return json_encode($message);
	}
}