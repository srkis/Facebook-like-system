<?php

define("DB_HOST", "yourdatabase host");
define("DB_USER", "your database user");
define("DB_PASS","your database pass");
define("DB_NAME", "your database name");

spl_autoload_register(function($className){

    require_once($_SERVER['DOCUMENT_ROOT'] ."/likes/classes/{$className}.php");

});
