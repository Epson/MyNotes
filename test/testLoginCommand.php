<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "zhaojian");
    $context->addParam("password", "zhaojian");
    $controller->process();
?>