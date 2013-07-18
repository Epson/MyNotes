
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getMyIdAction extends Action {
	public function takeAction() {
		$my_id = $_SESSION['user_id'];

	    return $my_id;
	}
}