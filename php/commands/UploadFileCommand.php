
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class UploadFileCommand extends Command {
	private function uploadFile($file_name, $type, $size, $error, $name, $tmp_name) {
		if (( ($type == "image/gif") || ($type == "image/jpeg") || ($type == "image/jpg") || 
			  ($type == "image/png") || ($type == "image/pjpeg") ) && ($size < 200000) ) {

			if( $error == 0 ) {

				$tempname = explode('.',$name);					//将文件名以'.'分割得到后缀名,得到一个数组
				$newname = $file_name . "." . $tempname[1] ;
				$filepath = "upload/" . $newname ;
				move_uploaded_file($tmp_name, "../upload/" . $newname);
				
			} else {
				return null;
			}
		} else {
			return null;
		}

		return $filepath;
	}

	function excute(CommandContext $context) {
		$name = $context->get("name");
		$type = $context->get("type");
		$size = $context->get("size");
		$error = $context->get("error");
		$tmp_name = $context->get("tmp_name");
		$file_name = $context->get("file_name");

		$filepath = $this->uploadFile($file_name, $type, $size, $error, $name, $tmp_name);

		if( is_null($filepath) ) {
			$context->setError("Failed to upload file");
			return false;
		} else {
			$context->addParam("filepath", iconv("GB2312", "UTF-8", $filepath));
			return true;
		}
	}
}

?>