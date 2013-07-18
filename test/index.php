<?php session_start() ; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>MyNotes</title>
    <link rel="shortcut icon" href="/favicon.ico">

    <!-- Metas-->
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="分享网页、书籍和论文等内容，增加评价和标签等功能，方便用户之间的交流" />
    <meta name="keywords" content="书籍 论文 网页 笔记 评价" />
    <meta name="team" content="floatingcloud" />

    <!--CSS-->

    <!--js-->

</head>

<body>
    <form action="../php/takeAction.php" method="post" enctype="multipart/form-data">
        <h4>register</h4>
        <input type="hidden" name="action" value="register" />
        username: <input type="text" name="username" /> 
        password: <input type="password" name="password" />
		avatar: <input type="file" name="avatar" />
        email: <input type="text" name="email" /> 
        introduction: <input type="text" name="introduction" /> 
        <input type="submit" value="submit" />
    </form>
	
	<form action="../php/takeAction.php" method="post">
        <h4>removeUser</h4>
        <input type="hidden" name="action" value="removeUser" />
        user_id: <input type="text" name="user_id" /> 
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>login</h4>
        <input type="hidden" name="action" value="login" />
        username: <input type="text" name="username" /> 
        password: <input type="password" name="password" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>createGroup</h4>
        <input type="hidden" name="action" value="createGroup" />
        groupName: <input type="text" name="groupName" /> 
        introduction: <input type="text" name="introduction" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>dissolveGroup</h4>
        <input type="hidden" name="action" value="dissolveGroup" />
        group_id: <input type="text" name="group_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>addFriend</h4>
        <input type="hidden" name="action" value="addFriend" />
        friend_id: <input type="text" name="friend_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>removeFriend</h4>
        <input type="hidden" name="action" value="removeFriend" />
        friend_id: <input type="text" name="friend_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>makeNotesPrivate</h4>
        <input type="hidden" name="action" value="makeNotesPrivate" />
        note_id: <input type="text" name="note_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>makeNotesPublic</h4>
        <input type="hidden" name="action" value="makeNotesPublic" />
        note_id: <input type="text" name="note_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>applyForEnteringGroup</h4>
        <input type="hidden" name="action" value="applyForEnteringGroup" />
        group_id: <input type="text" name="group_id" /> 
        remarks: <input type="text" name="remarks" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>enterGroup</h4>
        <input type="hidden" name="action" value="enterGroup" />
        group_id: <input type="text" name="group_id" />
        <input type="submit" value="submit" />
    </form>

    <form action="../php/takeAction.php" method="post">
        <h4>exitGroup</h4>
        <input type="hidden" name="action" value="exitGroup" />
        group_id: <input type="text" name="group_id" />
        <input type="submit" value="submit" />
    </form>
	
	<form action="../php/takeAction.php" method="post" enctype="multipart/form-data">
        <h4>createTarget</h4>
        <input type="hidden" name="action" value="createTarget" />
        targetName: <input type="text" name="targetName" /> 
        author: <input type="text" name="author" />
		category: <input type="text" name="category" />
        image: <input type="file" name="image" /> 
		introduction: <input type="text" name="introduction" />
        <input type="submit" value="submit" />
    </form>
	
	<form action="../php/takeAction.php" method="post">
        <h4>addComment</h4>
        <input type="hidden" name="action" value="addComment" />
        content: <input type="text" name="content" />
		associate: <input type="text" name="associate" />
        <input type="submit" value="submit" />
    </form>
	
	<form action="../php/takeAction.php" method="post">
        <h4>addNote</h4>
        <input type="hidden" name="action" value="addNote" />
        content: <input type="text" name="content" />
		associate: <input type="text" name="associate" />
		is_public: <input type="text" name="is_public" />
        <input type="submit" value="submit" />
    </form>
	
	<form action="../php/takeAction.php" method="post">
        <h4>addTag</h4>
        <input type="hidden" name="action" value="addTag" />
        content: <input type="text" name="content" />
		associate: <input type="text" name="associate" />
        <input type="submit" value="submit" />
    </form>
</body>
</html>