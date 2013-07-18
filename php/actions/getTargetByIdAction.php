
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getTargetByIdAction extends Action {
	public function takeAction() {

		$targets_id = array();
		$targets_id[] = $_REQUEST['target_id'];

		$controller = new Controller();
		$context = $controller->getContext();
		$context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");

	    $users_id = array();
	    $users_id[] = $targets_mes[0]->author;
	    $context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $target_mes = array();
	    $target_mes["target_name"] = $targets_mes[0]->target_name;
	    $target_mes["author"] = $users_mes[0]->username;
	    $target_mes["category"] = $targets_mes[0]->category;
	    $target_mes["image"] = $targets_mes[0]->image;
		$target_mes["introduction"] = $targets_mes[0]->introduction;
 
	    return json_encode($target_mes); 
	}
}