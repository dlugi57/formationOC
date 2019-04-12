<?php

spl_autoload_register(function($classname)
{


    $parts = explode('\\', $classname);
    require 'model/'.end($parts) . '.php';


});

/*

spl_autoload_register(function($classname)
{
  if (file_exists($file = 'model/' .$classname . '.php'))
  {
    require_once $file;

  } else {
      throw new Exception('Pb autoload : Le fichier ' . $file . ' n\'existe pas.');
  }
});
*/
