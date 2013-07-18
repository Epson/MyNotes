<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "register");
    $context->addParam("username", "小泉");
    $context->addParam("password", "xiaoquan");
    $context->addParam("avatar", "upload/avatar/1.jpg");
    $context->addParam("email", "121@qq.com");
    $controller->process();
?>