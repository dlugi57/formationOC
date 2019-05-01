<?php

namespace Controller;

//require_once "Model/ClientManager.php";
//require_once "Model/SeanceManager.php";
//require_once "Model/CommandManager.php";
//require_once "Model/TaxesManager.php";

use Model\SeanceManager;
use Model\ClientManager;
use Model\CommandManager;
use Model\TaxesManager;
use Exception;

/**
 *
 */
class FocusBack
{

  //CLIENT
  public function addClientPage()
  {
      $clientsManager = new ClientManager();
      $newClientPage = $clientsManager->contactByList();
      if ($newClientPage === false):

          throw new Exception('Impossible d\'afficher le client !');

      else:

          require('View/backend/addClient.php');
      endif;

  }

  public function addClient()
  {
      $clientsManager = new ClientManager();
      $newClient = $clientsManager->newClient($_POST['name'], $_POST['tel'], $_POST['email'], $_POST['adress'], $_POST['city'], $_POST['post_code'], $_POST['contact_by'], $_POST['description']);
      if ($newClient === false):

          throw new Exception('Impossible d\'ajouter le client !');

      else:

          header('Location: index.php?action=client&id='.$_SESSION['last_id'].'');

      endif;

  }

  public function modifyClientPage()
  {
      $clientsManager = new ClientManager();
      $modifyClient = $clientsManager->getClient($_GET['id']);
      $modifyClientContact = $clientsManager->contactByList();


      if ($modifyClient === false):

          throw new Exception('Impossible d\'afficher le client !');

      else:

          require('View/backend/modifyClient.php');

      endif;

  }
  public function modifyClient()
  {
      $clientsManager = new ClientManager();
      $updateClient = $clientsManager->updateClient($_GET['id'],$_POST['name'], $_POST['tel'], $_POST['email'], $_POST['adress'], $_POST['city'], $_POST['post_code'], $_POST['contact_by'], $_POST['description']);
      if ($updateClient === false):

          throw new Exception('Impossible de modifier le client !');

      else:

          header('Location: index.php?action=client&id='.$_GET['id'].'');

      endif;

  }

  public function removeClient()
  {
    $clientsManager = new ClientManager();
    $deleteClient = $clientsManager->deleteClient($_GET['id']);
    if ($deleteClient === false):

        throw new Exception('Impossible de supprime client !');

    else:

        header('Location: index.php?action=dashboard');

    endif;
  }

  //SEANCE
  public function addSeancePage()
  {
      $seancesManager = new SeanceManager();
      $newSeancePage = $seancesManager->typeSeanceList();
      $clientsManager = new ClientManager();
      if (isset($_GET['id']) && $_GET['id'] > 0):

        $client = $clientsManager->getClient($_GET['id']);

      endif;

      $clientsList = $clientsManager->getClients();

      if ($newSeancePage === false):

          throw new Exception('Impossible d\'afficher le client !');

      else:

          require('View/backend/addSeance.php');
      endif;

  }

  public function addSeance()
  {
      $seancesManager = new SeanceManager();
      $newSeance = $seancesManager->newSeance($_POST['clients_id'], $_POST['type'], $_POST['seance_date'], $_POST['time_seance'], $_POST['prise'], $_POST['depenses'], $_POST['model'], $_POST['adresse_seance'], $_POST['city_seance'], $_POST['km'], $_POST['description_seance']);
      if ($newSeance === false):

          throw new Exception('Impossible d\'ajouter le seance !');

      else:

          header('Location: index.php?action=seance&id='.$_SESSION['last_id'].'');

      endif;
  }



  public function modifySeancePage()
  {
      $seancesManager = new SeanceManager();
      $modifySeance = $seancesManager->getSeance($_GET['id']);
      $modifySeanceType = $seancesManager->typeSeanceList();
      $clientsManager = new ClientManager();
      $modifySeanceClients = $clientsManager->getClients();


      if ($modifySeance === false):

          throw new Exception('Impossible d\'afficher le seance !');

      else:

          require('View/backend/modifySeance.php');

      endif;

  }
  public function modifySeance()
  {
      $seancesManager = new SeanceManager();
      $updateSeance = $seancesManager->updateSeance($_GET['id'],$_POST['clients_id'], $_POST['type'], $_POST['seance_date'], $_POST['time_seance'], $_POST['prise'], $_POST['depenses'], $_POST['model'], $_POST['adresse_seance'], $_POST['city_seance'], $_POST['km'], $_POST['description_seance']);
      if ($updateSeance === false):

          throw new Exception('Impossible de modifier le seance !');

      else:

          header('Location: index.php?action=seance&id='.$_GET['id'].'');

      endif;

  }

  public function removeSeance()
  {
    $seancesManager = new SeanceManager();
    $deleteSeance = $seancesManager->deleteSeance($_GET['id']);
    if ($deleteSeance === false):

        throw new Exception('Impossible de supprimer le seance !');

    else:

        header('Location: index.php?action=dashboard');

    endif;
  }

  //COMMAND
  public function addCommandPage()
  {
      $commandsManager = new CommandManager();
      $newCommandPage = $commandsManager->typeCommandList();

      $clientsManager = new ClientManager();
      if (isset($_GET['id']) && $_GET['id'] > 0):

        $client = $clientsManager->getClient($_GET['id']);

      endif;

      $clientsList = $clientsManager->getClients();

      if ($newCommandPage === false):

          throw new Exception('Impossible d\'afficher le client !');

      else:

          require('View/backend/addCommand.php');
      endif;
  }

  public function addCommand()
  {
      $commandsManager = new CommandManager();
      $newCommand = $commandsManager->newCommand($_POST['client_id_cmd'], $_POST['type_command'], $_POST['description_command'], $_POST['prise_command'], $_POST['cost_command']);
      if ($newCommand === false):

          throw new Exception('Impossible d\'ajouter la commande !');

      else:

          header('Location: index.php?action=command&id='.$_SESSION['last_id'].'');

      endif;
  }

  public function modifyCommandPage()
  {
    $commandsManager = new CommandManager();
    $modifyCommand = $commandsManager->getCommand($_GET['id']);

    $modifyCommandType = $commandsManager->typeCommandList();
    $clientsManager = new ClientManager();
    $modifyCommandClients = $clientsManager->getClients();


    if ($modifyCommand === false):

        throw new Exception('Impossible d\'afficher la commande !');

    else:

        require('View/backend/modifyCommand.php');

    endif;
  }

  public function modifyCommand()
  {
    $commandsManager = new CommandManager();
    $updateCommand = $commandsManager->updateCommand($_GET['id'],$_POST['client_id_cmd'], $_POST['type_command'], $_POST['description_command'], $_POST['prise_command'], $_POST['cost_command']);
    if ($updateCommand === false):

        throw new Exception('Impossible de modifier le commande !');

    else:

        header('Location: index.php?action=command&id='.$_GET['id'].'');

    endif;
  }

  public function removeCommand()
  {
    $commandsManager = new CommandManager();
    $deleteCommand = $commandsManager->deleteCommand($_GET['id']);
    if ($deleteCommand === false):

        throw new Exception('Impossible de supprimer la commande !');

    else:

        header('Location: index.php?action=dashboard');

    endif;
  }

  //TAXES



  public function addTaxes()
  {
    $taxesManager = new TaxesManager();
    $newTaxe = $taxesManager->newTaxes($_POST['tax_date'], $_POST['tax_declare'], $_POST['tax_paid'], $_POST['tax_description']);
    if ($newTaxe === false):

        throw new Exception('Impossible d\'ajouter la taxe !');

    else:

        header('Location: index.php?action=taxe&id='.$_SESSION['last_id'].'');

    endif;

  }

  public function modifyTaxesPage()
  {
    $taxesManager = new TaxesManager();
    $modifyTax = $taxesManager->getTaxe($_GET['id']);


    if ($modifyTax === false):

        throw new Exception('Impossible d\'afficher le taxe page !');

    else:

        require('View/backend/modifyTax.php');

    endif;
  }

  public function modifyTaxes()
  {





    $taxesManager = new TaxesManager();
    $updateTaxe = $taxesManager->updateTaxe($_GET['id'], $_POST['tax_date'], $_POST['tax_declare'], $_POST['tax_paid'], $_POST['tax_description']);
    if ($updateTaxe === false):

        throw new Exception('Impossible de modifier la taxe !');

    else:

        header('Location: index.php?action=taxe&id='.$_GET['id'].'');

    endif;
  }

  public function removeTaxe()
  {
    $taxesManager = new TaxesManager();
    $deleteTaxe = $taxesManager->deleteTaxe($_GET['id']);
    if ($deleteTaxe === false):

        throw new Exception('Impossible de supprimer la taxe !');

    else:

        header('Location: index.php?action=dashboard');

    endif;
  }

}
