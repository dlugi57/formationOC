<?php
session_start();
require_once "Controller/Backend.php";

//require('Controller/frontend.php');
//require('Controller/backend.php');
use Controller\Backend;

$controller = new Backend();




try {
    if (isset($_GET['action'])):
//POST LIST
      switch ($_GET['action']):

        case 'dashboard':
            $dashboard = $controller->dashboard();
            //dashboard();
        break;

        case 'listClients':
            $clientsList = $controller->listClients();
            //listClients();
        break;

//DEFAULT HOME
        default:
            $dashboard = $controller->dashboard();
            //dashboard();
        break;
      endswitch;
    else :
        $dashboard = $controller->dashboard();
      //  dashboard();
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('view/errorView.php');
}
