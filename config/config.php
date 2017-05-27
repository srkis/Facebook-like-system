<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS","123");
define("DB_NAME", "likes");

spl_autoload_register(function($className){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/likes/classes/{$className}.php");

});