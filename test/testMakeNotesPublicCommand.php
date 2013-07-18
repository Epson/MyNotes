<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "makeNotesPublic");
    $context->addParam("note_id", 1);
    $controller->process();