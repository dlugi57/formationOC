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

          throw new Exception('Impossible d\'ajouter la command !');

      else:

          header('Location: index.php?action=command&id='.$_SESSION['last_id'].'');

      endif;
  }

}
