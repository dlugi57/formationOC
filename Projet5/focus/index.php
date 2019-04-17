<?php
session_start();
require "autoload.php";
//require('Controller/frontend.php');
//require('Controller/backend.php');
use Controller\Backend;

$controller = new Backend();
$dashboard = $controller->dashboard();


try {
    if (isset($_GET['action'])):
//POST LIST
      switch ($_GET['action']):

        case 'dashboard':
            $dashboard;
        break;

//DEFAULT HOME
        default:
            $dashboard;
        break;
      endswitch;
    else :
        $dashboard;
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
  //  require('view/frontend/errorView.php');
}
