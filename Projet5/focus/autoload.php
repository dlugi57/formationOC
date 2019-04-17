<?php
spl_autoload_register(function($classname)
{
    $parts = explode('\\', $classname);
    $classname = end($parts);

    if (file_exists($file = 'Controller/' . $classname . '.php'))
    {
      require $file;
    } else
    {
        throw new Exception('Pb autoload : Le fichier ' . $file . ' n\'existe pas.');
    }
});
