<?php
session_start();
require "vendor/autoload.php";

use Controller\Dashboard;
use Controller\Focus;

$controller = new Focus();
$controllerDash = new Dashboard();

try {
    if (isset($_GET['action'])):

      switch ($_GET['action']):
//DASHBOARD
        case 'dashboard':
            $dashboard = $controllerDash->dashboard();
        break;
//CLIENT LIST
        case 'listClients':
            $clientsList = $controller->listClients();
        break;
//CLIENT
        case 'client':
            $client = $controller->client();
        break;
//SEANCES LIST
        case 'listSeances':
            $seancesList = $controller->listSeances();
        break;
//SEANCE
        case 'seance':
            $seance = $controller->seance();
        break;
//COMMAND LIST
        case 'listCommands':
            $commandsList = $controller->listCommands();
        break;
//COMMAND
        case 'command':
            $command = $controller->command();
        break;
//TAXES LIST
        case 'listTaxes':
            $taxList = $controller->listTaxes();
        break;




//DEFAULT HOME
        default:
            header('Location: index.php?action=dashboard');
        break;
      endswitch;
    else :
      header('Location: index.php?action=dashboard');
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('view/errorView.php');
}
