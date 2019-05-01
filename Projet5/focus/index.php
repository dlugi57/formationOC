<?php
session_start();
require "vendor/autoload.php";

use Controller\Dashboard;
use Controller\Focus;
use Controller\FocusBack;

$controller = new Focus();
$controllerDash = new Dashboard();
$controllerBack = new FocusBack();

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
//ADD CLIENT
        case 'addClientPage':
            $addClientPage = $controllerBack->addClientPage();
        break;
        case 'addClient':
            $addClient = $controllerBack->addClient();
        break;
//SEANCES LIST
        case 'listSeances':
            $seancesList = $controller->listSeances();
        break;
//SEANCE
        case 'seance':
            $seance = $controller->seance();
        break;
//ADD SEANCE
        case 'addSeancePage':
            $addSeancePage = $controllerBack->addSeancePage();
        break;
        case 'addSeance':
            $addSeance = $controllerBack->addSeance();
        break;
//COMMAND LIST
        case 'listCommands':
            $commandsList = $controller->listCommands();
        break;
//COMMAND
        case 'command':
            $command = $controller->command();
        break;
//ADD COMMAND
        case 'addCommandPage':
            $addCommandPage = $controller->addCommandPage();
        break;
        case 'addCommand':
            $addCommand = $controller->addCommand();
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
    require('View/frontend/errorView.php');
}
