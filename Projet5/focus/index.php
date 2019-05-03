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
            if (!empty($_POST['login']) && !empty($_POST['pass']) && trim($_POST['login']) !== '' && trim($_POST['pass']) !== '')
            {
              $connect = $controllerMembers->connect($_POST['login'],$_POST['pass']);
            }else
            {
              throw new Exception("Les champs ne sont pas remplis !");
            }
        break;
// NEW MEMBER PAGE
        case 'createMember':
            require('View/frontend/homePage/createMemberViev.php');
        break;
//NEW MEMBER
        case 'newMember':
            if (!empty($_POST['nick']) && !empty($_POST['email'])&& !empty($_POST['email_confirm'])&& !empty($_POST['password'])&& !empty($_POST['password_confirm']) && trim($_POST['nick']) !== '' && trim($_POST['email']) !== '' && trim($_POST['email_confirm']) !== '' && trim($_POST['password']) !== '' && trim($_POST['password_confirm']) !== ''):

                if ($_POST['email'] !== $_POST['email_confirm']):

                    throw new Exception("Email doit être identique !");

                endif;

                if ($_POST['password'] !== $_POST['password_confirm']):

                    throw new Exception("Le mot de passe doit être identique !");

                endif;

                $memberNew = $controllerMembers->newMember($_POST['nick'], $_POST['password'], $_POST['email']);

            else:

                throw new Exception("Tous les champs ne sont pas remplis !");

            endif;
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
