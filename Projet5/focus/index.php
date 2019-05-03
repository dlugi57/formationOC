<?php
session_start();
require "vendor/autoload.php";

use Controller\Dashboard;
use Controller\Focus;
use Controller\FocusBack;
use Controller\FocusMembers;

$controller = new Focus();
$controllerDash = new Dashboard();
$controllerBack = new FocusBack();
$controllerMembers = new FocusMembers();

try {
    if (isset($_GET['action'])):

        if (isset($_SESSION['admin']) && ($_SESSION['admin'] == 1 || $_SESSION['admin'] == 2)):

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
      //MODIFY CLIENT
              case 'modifyClientPage':

                  $modifyClientPage = $controllerBack->modifyClientPage();

              break;
              case 'modifyClient':
                  $modifyClient = $controllerBack->modifyClient();
              break;
      //REMOVE CLIENT
              case 'removeClient':
                  $removeClient = $controllerBack->removeClient();
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
      //MODIFY SEANCE
              case 'modifySeancePage':
                  $modifySeancePage = $controllerBack->modifySeancePage();
              break;
              case 'modifySeance':
                  $modifySeance = $controllerBack->modifySeance();
              break;
      //REMOVE SEANCE
              case 'removeSeance':
                  $removeSeance = $controllerBack->removeSeance();
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
                  $addCommandPage = $controllerBack->addCommandPage();
              break;
              case 'addCommand':
                  $addCommand = $controllerBack->addCommand();
              break;
      //MODIFY COMMAND
              case 'modifyCommandPage':
                  $modifyCommandPage = $controllerBack->modifyCommandPage();
              break;
              case 'modifyCommand':
                  $modifyCommand = $controllerBack->modifyCommand();
              break;
      //REMOVE COMMAND
              case 'removeCommand':
                  $removeCommand = $controllerBack->removeCommand();
              break;
      //TAXES LIST
              case 'listTaxes':
                  $taxList = $controller->listTaxes();
              break;
      //TAXES LIST
              case 'taxe':
                  $taxe = $controller->taxe();
              break;
      //ADD TAXE
              case 'addTaxesPage':
                  require('View/backend/addTaxes.php');
              break;
              case 'addTaxes':
                  $addTaxes = $controllerBack->addTaxes();
              break;
      //ADD TAXE
              case 'modifyTaxesPage':
                  $modifyTaxesPage = $controllerBack->modifyTaxesPage();
              break;
              case 'modifyTaxes':
                  $modifyTaxes = $controllerBack->modifyTaxes();
              break;
      //REMOVE TAXE
              case 'removeTaxe':
                  $removeTaxe = $controllerBack->removeTaxe();
              break;


      //MEMBERS LIST
              case 'membersList':
                  $membersList = $controllerMembers->membersList();
              break;
      //MEMBERS LIST
              case 'status':
                  $status = $controllerMembers->status();
              break;
      //MEMBERS LIST
              case 'removeMember':
                  $removeMember = $controllerMembers->removeMember();
              break;
      //HOME PAGE
              case 'home':
                  require('View/frontend/homePage/homeViev.php');
              break;
      //DECONNECT
              case 'deconnect':
                  $logout = $controllerMembers->logout();
              break;
      //DEFAULT HOME
              default:
                  header('Location: index.php?action=dashboard');
              break;
            endswitch;//in admin and logged user

        else:

            switch ($_GET['action']):
      //HOME PAGE
              case 'home':
                  require('View/frontend/homePage/homeViev.php');
              break;
      // LOGIN PAGE
              case 'loginPage':
                  require('View/frontend/homePage/connectViev.php');
              break;
      //LOGIN
              case 'login':
                    $connect = $controllerMembers->connect();
              break;
      // NEW MEMBER PAGE
              case 'createMember':
                  require('View/frontend/homePage/createMemberViev.php');
              break;
      //NEW MEMBER
              case 'newMember':
                  $memberNew = $controllerMembers->newMember();
              break;
      //ACCEPT MEMBER
              case 'acceptMember':
                  require('View/frontend/homePage/acceptMember.php');
              break;
      //DECONNECT
              case 'deconnect':
                  $logout = $controllerMembers->logout();
              break;
      //DEFAULT HOME
              default:
                  header('Location: index.php?action=home');
              break;
            endswitch;
        endif;//acces permission

    else ://else of isset action

        if (isset($_SESSION['admin']) && $_SESSION['admin'] !== 0):
          header('Location: index.php?action=dashboard');
        else:
          header('Location: index.php?action=home');
        endif;

    endif;//isset action

}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('View/frontend/errorView.php');
}
