<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "zhaojian");
    $context->addParam("password", "zhaojian");
    $controller->process();

    $context->addParam("action", "addNote");
    $context->addParam("content", "helloworld");
    $context->addParam("associate", "2");
	$context->addParam("is_public", "0");
    $controller->process();
?>