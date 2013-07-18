<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "xuan");
    $context->addParam("password", "000");
    $controller->process();

    $context->addParam("action", "addComment");
    $context->addParam("content", "okok");
    $context->addParam("associate", "2");
    $controller->process();
?>