<?php
session_start();
require_once "Controller/Focus.php";
require_once "Controller/Dashboard.php";

//require('Controller/frontend.php');
//require('Controller/backend.php');
use Controller\Dashboard;
use Controller\Focus;

$controller = new Focus();
$controllerDash = new Dashboard();




try {
    if (isset($_GET['action'])):

      switch ($_GET['action']):
//DASHBOARD
        case 'dashboard':
      //  $sumBrut = $controller->sumBrut();

          //  $dashboard = $controllerDash->monthlyRecap();
            $dashboard = $controllerDash->dashboard();

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
            //$dashboard = $controller->dashboard();
            header('Location: index.php?action=dashboard');
            //dashboard();
        break;
      endswitch;
    else :
      header('Location: index.php?action=dashboard');
        //$dashboard = $controller->dashboard();
      //  dashboard();
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('view/errorView.php');
}
