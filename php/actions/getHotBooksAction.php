<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getHotBooksAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getHotBooks");
	    $controller->process();
	    $hot_books = $context->get("hot_books");

	    $hot_books_array = array();
	    for( $i = 0 ; $i < count($hot_books); $i ++ ) {
	    	$hot_book_message = array();
	    	$hot_book_message["target_id"] = $hot_books[$i]->target_id;
	    	$hot_book_message["image"] = $hot_books[$i]->image;
	    	$hot_book_message["target_name"] = $hot_books[$i]->target_name;
	    	$hot_book_message["author"] = $hot_books[$i]->author;

	    	$hot_books_array[$i] = $hot_book_message;
	    }

	    return json_encode($hot_books_array);
	}
}