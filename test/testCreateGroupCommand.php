<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "login");
    $context->addParam("username", "zhaojian");
    $context->addParam("password", "zhaojian");
    $controller->process();

    $context->addParam("action", "createGroup");
    $context->addParam("groupName", "第三小组");
    $context->addParam("introduction", "没有简介");
    $context->addParam("creator", 4);
    $controller->process();
?>