<?php ob_start();
session_start();
include "params.php";

// we are using this function to include all classes from classes folder
function __autoload($className){
   require_once "classes/$className.php";
}

//Instantiating object from the classes
$user = new User();

$follow = new Follow();

$tweet = new Tweet();

//saving the base url in a constant
define("BASE_URL","http://localhost/campster_back/");