<?php

spl_autoload_register(function($class){

    if (file_exists($class . '.php')) {
		require ($class . '.php');

	} elseif (file_exists('src/' . $class . '.php')) {
		require ('src/' . $class . '.php');
	}
   
});