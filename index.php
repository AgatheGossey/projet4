<?php

session_start();

require('Framework/Router.php');

$router = new Router ();
$router->requestRouter();
