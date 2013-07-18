
<?php 

/****************************************************************************************
 * 作    者：	赵剑
 * 创建日期：	2012.12.11
 * 描    述：	数据库环境变量与数据库初始化: sys_conf.inc
 * 注意事项：	一定要完成初始化函数init()的定义
 * 遗留 BUG：	无
 * 修改日期：	2012.12.11
 ****************************************************************************************/
 
 class sys_conf
 {
	 public static $DBHOST = "localhost";
	 public static $DBUSER = "root";
	 public static $DBPWD = "";
	 public static $DBNAME = "mynotes";
	 
	 /******************************************
	 * 函数名：	init
	 * 描     述：	一个静态的数据库初始化接口
	 * 参     数：	无
	 * 返回值：	无
	 */
	 
	 public static function init()
	 {
		 //创建users表
		 $sql = "CREATE TABLE `mynotes`.`users` (
		 	`user_id` INT AUTO_INCREMENT,
			`username` VARCHAR(30) NOT NULL UNIQUE,
			`password` VARCHAR(40) NOT NULL,
			`avatar` VARCHAR(70),
			`email` VARCHAR(40),
			`introduction` VARCHAR(50),
			`is_super` BOOL NOT NULL,
			PRIMARY KEY (`user_id`)
		)" ;
		mysql_query($sql);
		$encrypted_password = md5("adminadmin");
		mysql_query( "INSERT INTO `users` VALUES (NULL, 'admin', '$encrypted_password', 'upload/avatar/1.jpg', '121927532@qq.com', '我是管理员', false)" );
		
	
		//创建groups表
		$sql = "CREATE TABLE `mynotes`.`groups` (
			`group_id` INT AUTO_INCREMENT,
			`group_name` VARCHAR(30) NOT NULL UNIQUE,
			`creator` INT NOT NULL,
			`introduction` VARCHAR(50) NOT NULL,
			`create_time` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`group_id`),
			FOREIGN KEY (`creator`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
		)" ;
		date_default_timezone_set("PRC");
		$showtime=date("Y-m-d H:i:s");
		mysql_query($sql) ;
		mysql_query( "INSERT INTO `groups` VALUES (NULL, '浮云小组', 1, '神马都是浮云', '$showtime')" );
		mysql_query( "INSERT INTO `groups` VALUES (NULL, '神马小组', 1, '浮云都是神马', '$showtime')" );
		

		//创建in_group表
		$sql = "CREATE TABLE `mynotes`.`in_group` (
			`user_id` INT NOT NULL,
			`group_id` INT NOT NULL,
			`enter_time` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`user_id`, `group_id`),
			FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`group_id`) REFERENCES groups(`group_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
		)" ;
		$showtime=date("Y-m-d H:i:s");
		mysql_query($sql) ;
		mysql_query( "INSERT INTO `in_group` (user_id, group_id, enter_time) VALUES (1, 1, '$showtime')" ) ;
		

		//创建be_friends表
		$sql = "CREATE TABLE `mynotes`.`be_friends` (
			`user_id` INT  NOT NULL,
			`friend_id` INT NOT NULL,
			PRIMARY KEY (`user_id`,`friend_id`),
			FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`friend_id`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE 
		)" ;
		mysql_query($sql) ;
		

		//创建target表
		$sql = "CREATE TABLE `mynotes`.`target` (
			`target_id` INT AUTO_INCREMENT UNIQUE,
			`target_name` VARCHAR(30) NOT NULL,
			`author` VARCHAR(25) NOT NULL,
			`category` INT NOT NULL,
			`image` VARCHAR(50) NOT NULL,
			`introduction` TEXT NOT NULL,
			
			PRIMARY KEY (`target_name`, `author`, `category`)
		 )";
		 mysql_query($sql) ;
		 mysql_query( "INSERT INTO `target` VALUES (NULL, '花之绘', '飞乐鸟', 0, 'upload/frontImage/花之绘.jpg', '38种花的色铅笔图绘')" ) ;
		 

		//创建notes表
		$sql = "CREATE TABLE `mynotes`.`notes` (
		 	`note_id` INT AUTO_INCREMENT,
			`user_id` INT NOT NULL,
			`content` TEXT NOT NULL,
			`associate` INT NOT NULL,
			`create_time` VARCHAR(50) NOT NULL,
			`is_public` BOOL NOT NULL,
			PRIMARY KEY (`note_id`),
			FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`associate`) REFERENCES target(`target_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
		)" ;
		mysql_query($sql) ;
		$showtime=date("Y-m-d H:i:s");
		mysql_query( "INSERT INTO `notes` VALUES (NULL, 1, '水军飘过', 1, '$showtime', false)" ) ;
		mysql_query( "INSERT INTO `notes` VALUES (NULL, 2, '发一条试试', 1, '$showtime', true)" ) ;
		 

		 //创建tags表
		 $sql = "CREATE TABLE `mynotes`.`tags` (
			`tag_id` INT AUTO_INCREMENT UNIQUE,
			`user_id` INT NOT NULL,
			`content` TEXT NOT NULL,
			`associate` INT NOT NULL,
			`create_time` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`tag_id`,`associate`),
			FOREIGN KEY (`associate`) REFERENCES target (`target_id`) 
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`user_id`) REFERENCES users(`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
		 )" ;
		 mysql_query($sql) ;
		 $showtime=date("Y-m-d H:i:s");
		 mysql_query( "INSERT INTO `tags` VALUES (NULL, 1, '艺术', 1, '$showtime')" ) ;
		 

		 //创建comments表
		 $sql = "CREATE TABLE `mynotes`.`comments` (
		 	`comment_id` INT AUTO_INCREMENT,
		 	`user_id` INT NOT NULL,
			`content` TEXT NOT NULL,
			`associate` INT NOT NULL,
			`create_time` VARCHAR(50) NOT NULL,
			PRIMARY KEY (`comment_id`),
			FOREIGN KEY (`user_id`) REFERENCES users (`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`associate`) REFERENCES target (`target_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
	 	)" ;
		mysql_query($sql) ;
		$showtime=date("Y-m-d H:i:s");
		mysql_query( "INSERT INTO `comments` VALUES (NULL, 1, '这本书不错', 1, '$showtime')" ) ;

		//创建enter_apply表
		$sql = "CREATE TABLE `mynotes`.`enter_apply` (
		 	`user_id` INT NOT NULL,
		 	`group_id` INT NOT NULL,
			`remarks` TEXT NOT NULL,
			PRIMARY KEY (`user_id`, `group_id`),
			FOREIGN KEY (`user_id`) REFERENCES users (`user_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE,
			FOREIGN KEY (`group_id`) REFERENCES groups (`group_id`)
						ON DELETE CASCADE
						ON UPDATE CASCADE
	 	)" ;
		mysql_query($sql) ;
		mysql_query( "INSERT INTO `enter_apply` VALUES (2, 1, '求加入')" ) ;
		mysql_query( "INSERT INTO `enter_apply` VALUES (3, 1, '请加我谢谢')" ) ;
	 }
 }
 
 ?>