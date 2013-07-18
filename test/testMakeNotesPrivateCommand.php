<?php

    require_once("../php/Controller.php");

    $controller = new Controller();
    $context = $controller->getContext();

    $context->addParam("action", "makeNotesPrivate");
    $context->addParam("note_id", 1);
    $controller->process();