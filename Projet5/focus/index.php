<?php
session_start();
require_once "Controller/Backend.php";

//require('Controller/frontend.php');
//require('Controller/backend.php');
use Controller\Backend;

$controller = new Backend();




try {
    if (isset($_GET['action'])):

      switch ($_GET['action']):
//DASHBOARD
        case 'dashboard':
      //  $sumBrut = $controller->sumBrut();
            $dashboard = $controller->dashboard();

            //dashboard();
        break;
//CLIENT LIST
        case 'listClients':
            $clientsList = $controller->listClients();
            //listClients();
        break;

//CLIENT LIST
        case 'listSeances':
            $seancesList = $controller->listSeances();
            //listClients();
        break;
//CLIENT LIST
        case 'listCommands':
            $commandsList = $controller->listCommands();
            //listClients();
        break;
//CLIENT LIST
        case 'listTaxes':
            $taxList = $controller->listTaxes();
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
