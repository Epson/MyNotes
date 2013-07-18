
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getGroupsByUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getGroupsByUser");
	    $context->addParam("user_id", $_REQUEST['user_id']);
	    $controller->process();
	    $groups = $context->get("groups");

	    $groups_id = array();
	    for( $i = 0; $i < count($groups); $i ++ ) {
			$groups_id[] = $groups[$i]->group_id;
		}
		$context->addParam("action", "getGroupsByTheirId");
		$context->addParam("groups_id", $groups_id);
		$controller->process();
		$groups_mes = $context->get("groups_mes");

	    $users_id = array();
		for( $i = 0; $i < count($groups); $i ++ ) {
			$users_id[] = $groups_mes[$i]->creator;
		}
		$context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $groups_mes_of_user = array();
	    for( $i = 0; $i < count($groups); $i ++ ) {
	    	$message = array();

	    	$message["group_id"] = $groups[$i]->group_id; 
	    	$message["group_name"] = $groups_mes[$i]->group_name; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["create_time"] = $groups_mes[$i]->create_time; 

	    	$groups_mes_of_user[$i] = $message;
	    }

	    return json_encode($groups_mes_of_user);
	}
}