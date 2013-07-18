
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class logoutAction extends Action {
	public function takeAction() {
	    unset($_SESSION['user_id']);
	}
}