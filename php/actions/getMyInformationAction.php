
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getMyInformationAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getMyInformation");
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	    $user = $context->get("user");

	    $user_mes = array();
	    $user_mes["user_id"] = $user->user_id;
	    $user_mes["username"] = $user->username;
		$user_mes["email"] = $user->email;
		$user_mes["avatar"] = $user->avatar;
		$user_mes["introduction"] = $user->introduction;

	    return json_encode($user_mes);
	}
}