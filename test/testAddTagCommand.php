<?php

    require_once("../php/Controller.php");

    session_start() ;

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "zhaojian");
    $context->addParam("password", "zhaojian");
    $controller->process();

    $context->addParam("action", "addTag");
    $context->addParam("user_id", $_SESSION['user_id']);
    $context->addParam("content", "玄幻");
    $context->addParam("associate", "1");
    $controller->process();
?>