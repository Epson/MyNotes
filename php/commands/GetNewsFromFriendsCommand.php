
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class GetNewsFromFriendsCommand extends Command {
	private function getCommentsFromUser($user_id) {
		$db = new DBManager();

		$comments = $db->query( "SELECT * FROM `comments` WHERE user_id=$user_id" );

		return $comments;
	}

	private function getPublicNotesFromUser($user_id) {
		$db = new DBManager();

		$public_notes = $db->query( "SELECT * FROM `notes` WHERE user_id =$user_id AND is_public = 1" );

		return $public_notes;
	}

	private function getTagsFromUser($user_id) {
		$db = new DBManager();

		$tags = $db->query( "SELECT * FROM `tags` WHERE user_id = $user_id" );

		return $tags;
	}

	private function getMyFriends($user_id) {
		$db = new DBManager();

		$friends = $db->query( "SELECT * FROM `be_friends` WHERE user_id=$user_id" );

		return $friends;
	}

	function excute(CommandContext $context) {

		$user_id = $context->get('user_id');
		$friends = $this->getMyFriends($user_id);

		if( empty($friends) ) {
			return NULL;
		}

		for( $i = 0; $i < count($friends); $i ++ ) {
			$comments = $this->getCommentsFromUser($friends[$i]->friend_id);
			$public_notes = $this->getPublicNotesFromUser($friends[$i]->friend_id);
			$tags = $this->getTagsFromUser($friends[$i]->friend_id);
			
			$news = array();


			for( $i = 0; $i < count($comments); $i ++ ) {
				$comment = array();

				$comment["comment_id"] = $comments[$i]->comment_id;
				$comment["user_id"] = $comments[$i]->user_id;
				$comment["content"] = $comments[$i]->content;
				$comment["associate"] = $comments[$i]->associate;
				$comment["create_time"] = $comments[$i]->create_time;
				
				$news[] = $comment;
			}

			for( $i = 0; $i < count($public_notes); $i ++ ) {
				$public_note = array();

				$public_note["note_id"] = $public_notes[$i]->note_id;
				$public_note["user_id"] = $public_notes[$i]->user_id;
				$public_note["content"] = $public_notes[$i]->content;
				$public_note["associate"] = $public_notes[$i]->associate;
				$public_note["create_time"] = $public_notes[$i]->create_time;
				
				$news[] = $public_note;
			}

			for( $i = 0; $i < count($tags); $i ++ ) {
				$tag = array();

				$tag["tag_id"] = $tags[$i]->tag_id;
				$tag["content"] = $tags[$i]->content;
				$tag["associate"] = $tags[$i]->associate;
				$tag["user_id"] = $tags[$i]->user_id;
				$tag["create_time"] = $tags[$i]->create_time;

				$news[] = $tag;
			}
		}

		$this->quickSort($news, 0, count($news)-1);

		$context->addParam("news", $news);

		return true;
	}

	private function partition(&$array, $low, $high) {
		$temp = $array[$low] ;
        $array[$low] = $array[floor(($low + $high) / 2)] ;
        $array[floor(($low + $high) / 2)] = $temp ;

        $pivot = $array[$low]["create_time"] ;
        $last_small = $low ;

        for( $i = $low + 1; $i <= $high; $i ++ ) {
            if( $array[$i]["create_time"] < $pivot ) {
                $last_small = $last_small + 1 ;
                $temp = $array[$last_small] ;
                $array[$last_small] = $array[$i] ;
                $array[$i] = $temp ;
            }
        }

        $temp = $array[$last_small] ;
	    $array[$last_small] = $array[$low] ;
	    $array[$low] = $temp ;

	    return $last_small ;
	}

	private function quickSort(&$src, $low, $high) {
		if( $low < $high ) {
            $pivot_position = $this->partition($src, $low, $high);
            $this->quickSort($src, $low, $pivot_position - 1);
            $this->quickSort($src, $pivot_position + 1, $high);
        }
	}
}

?>
