
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getGroupsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getGroups");
	    $context->addParam("pageId", $_REQUEST['pageId']);
	    $controller->process();
	    $groups = $context->get("group_mes");

	    $users_id = array();
		for( $i = 0; $i < count($groups); $i ++ ) {
			$users_id[] = $groups[$i]->creator;
		}
		$context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $groups_mes = array();
	    for( $i = 0; $i < count($groups); $i ++ ) {
	    	$message = array();

	    	$message["group_id"] = $groups[$i]->group_id; 
	    	$message["group_name"] = $groups[$i]->group_name; 
	    	$message["username"] = $users_mes[$i]->username; 
	    	$message["user_id"] = $users_mes[$i]->user_id; 
	    	$message["create_time"] = $groups[$i]->create_time; 

	    	$groups_mes[$i] = $message;
	    }

	    return json_encode($groups_mes);
	}
}