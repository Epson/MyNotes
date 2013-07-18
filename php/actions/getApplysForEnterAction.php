
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getApplysForEnterAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getApplysForEnter");
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $controller->process();
	    $applys_in_group = $context->get("applys_in_group");

	    $users_id = array();
	    for( $i = 0; $i < count($applys_in_group); $i ++ ) {
	    	$users_id[] = $applys_in_group[$i]->users_id;
	    }

	    $context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $users_apply = array();
	    for( $i = 0; $i < count($applys_in_group); $i ++ ) {
	    	$message = array();

	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["avatar"] = $users_mes[$i]->avatar; 
	    	$message["remarks"] = $applys_in_group[$i]->remarks; 

	    	$users_apply[$i] = json_encode($message);
	    }

	    return json_encode($users_apply);
	}
}