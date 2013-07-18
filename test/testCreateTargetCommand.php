<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "欧阳");
    $context->addParam("password", "000");
    $controller->process();

    $context->addParam("action", "createTarget");
    $context->addParam("targetName", "京华烟云");
    $context->addParam("author", "林语堂");
    $context->addParam("category", "0");
    $context->addParam("image", "upload/avatar/1.jpg");
    $context->addParam("introduction", "好看啊啊");
    $controller->process();
?>