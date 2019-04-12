<?php
spl_autoload_register(function($classname)
{


    $parts = explode('\\', $classname);
require 'model/'.end($parts) . '.php';


});
