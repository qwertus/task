<?php

//fetching all necessary classes to initialize the application and allows autoloading system
spl_autoload_register(function($className) {
    
    $path = dirname(__DIR__, 1);
    
    require_once $path . '/classes/' . $className . '.php';
});

