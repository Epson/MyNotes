<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "removeUser");
    $context->addParam("user_id", 1);
    $controller->process();
?>