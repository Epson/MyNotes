
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class isLoginAction extends Action {
	public function takeAction() {
		if( isset($_SESSION['user_id']) ) {
			$users_id = array();
			$users_id[] = $_SESSION['user_id'];

			$controller = new Controller();
			$context = $controller->getContext();
			$context->addParam("action", "getUsersByTheirId");
		    $context->addParam("users_id", $users_id);
		    $controller->process();
		    $users_mes = $context->get("users_mes");

		    return $users_mes[0]->username;

		} else {
			return "";
		}
	}
}