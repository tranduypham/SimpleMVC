<?php
session_start();
include_once "mvc/Model/ProductModel.php";

include_once "mvc/Controller/ProductController.php";

include_once "mvc/route.php";

$Route = new Route();
$Route->run();