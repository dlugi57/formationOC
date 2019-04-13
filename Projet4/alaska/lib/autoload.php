<?php
spl_autoload_register(function($classname)
{
    $parts = explode('\\', $classname);
    $classname = end($parts);

    if (file_exists($file = 'model/' . $classname . '.php'))
    {
      require $file;
    } else
    {
        throw new Exception('Pb autoload : Le fichier ' . $file . ' n\'existe pas.');
    }
});
/*spl_autoload_register(function($classname)
{


    $parts = explode('\\', $classname);
    require 'model/'.end($parts) . '.php';


});*/
