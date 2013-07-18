<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "findUser");
    $context->addParam("username", "zhaojian");
    $controller->process();

?>