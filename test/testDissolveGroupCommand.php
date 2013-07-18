<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "zhaojian");
    $context->addParam("password", "zhaojian");
    $controller->process();

    $context->addParam("action", "dissolveGroup");
    $context->addParam("group_id", 3);
    $controller->process();
?>