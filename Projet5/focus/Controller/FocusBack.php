<?php
namespace Controller;

use Model\SeanceManager;
use Model\ClientManager;
use Model\CommandManager;
use Model\TaxesManager;
use Exception;
use DateTime;

class FocusBack
{

    //-----------
    //- CLIENTS -
    //-----------
    public function addClientPage()
    {
        $clientsManager = new ClientManager();
        $newClientPage = $clientsManager->contactByList();

        if ($newClientPage === false):
            throw new Exception('Impossible d\'afficher le client ajout page!');
        else:
            require('View/backend/addClient.php');
        endif;
    }

    public function addClient()
    {
        $clientsManager = new ClientManager();

        if (!empty($_POST['name']) && trim($_POST['name']) !== '' && !empty($_POST['tel']) && trim($_POST['tel']) !== ''):

            if(empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
                $newClient = $clientsManager->newClient($_POST['name'], $_POST['tel'], $_POST['email'], $_POST['adress'], $_POST['city'], $_POST['post_code'], $_POST['contact_by'], $_POST['description']);
            else:
                throw new Exception("Format d'adresse mail non valide");
            endif;

        else:
            throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
        endif;


        if ($newClient === false):
            throw new Exception('Impossible d\'ajouter le client !');
        else:
            header('Location: index.php?action=client&id='.$_SESSION['last_id'].'');
        endif;
    }

    public function modifyClientPage()
    {
        $clientsManager = new ClientManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $modifyClient = $clientsManager->getClient($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de client envoyé");
        endif;

        $modifyClientContact = $clientsManager->contactByList();

        if ($modifyClient === false || $modifyClientContact === false):
            throw new Exception('Impossible d\'afficher le client modifier page!');
        else:
            require('View/backend/modifyClient.php');
        endif;
    }

    public function modifyClient()
    {
        $clientsManager = new ClientManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):

            if (!empty($_POST['name']) && trim($_POST['name']) !== '' && !empty($_POST['tel']) && trim($_POST['tel']) !== ''):

                if(empty($_POST['email']) || filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):
                    $updateClient = $clientsManager->updateClient($_GET['id'],$_POST['name'], $_POST['tel'], $_POST['email'], $_POST['adress'], $_POST['city'], $_POST['post_code'], $_POST['contact_by'], $_POST['description']);
                else:
                    throw new Exception("Format d'adresse mail non valide");
                endif;

            else:
                throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
            endif;

        else:
            throw new Exception("Aucun identifiant de client envoyé");
        endif;

        if ($updateClient === false):
            throw new Exception('Impossible de modifier le client !');
        else:
            header('Location: index.php?action=client&id='.$_GET['id'].'');
        endif;
    }

    public function removeClient()
    {
      $clientsManager = new ClientManager();

      if (isset($_GET['id']) && $_GET['id'] > 0):
          $deleteClient = $clientsManager->deleteClient($_GET['id']);
      else:
          throw new Exception("Aucun identifiant de client envoyé");
      endif;

      if ($deleteClient === false):
          throw new Exception('Impossible de supprime client !');
      else:
          header('Location: index.php?action=dashboard');
      endif;
    }

    //----------------
    //- SEANCE
    //----------------
    public function addSeancePage()
    {
        $seancesManager = new SeanceManager();
        $newSeancePage = $seancesManager->typeSeanceList();
        $clientsManager = new ClientManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $client = $clientsManager->getClient($_GET['id']);
        endif;

        $clientsList = $clientsManager->getClients();

        if ($newSeancePage === false || $clientsList === false):
            throw new Exception('Impossible d\'afficher le seance page !');
        else:
            require('View/backend/addSeance.php');
        endif;
    }

    public function addSeance()
    {
        $seancesManager = new SeanceManager();

        if (!empty($_POST['clients_id']) && trim($_POST['clients_id']) !== '' && !empty($_POST['type']) && trim($_POST['type']) !== '' && !empty($_POST['seance_date']) && trim($_POST['seance_date']) !== '' && !empty($_POST['prise']) && trim($_POST['prise']) !== ''):

            if (!empty($_POST['depenses']) && trim($_POST['depenses']) !== ''):
                $depenses = $_POST['depenses'];
            else:
                $depenses = 0;
            endif;

            if (!empty($_POST['km']) && trim($_POST['km']) !== ''):
                $kilometers = $_POST['km'];
            else:
                $kilometers = 0;
            endif;

            if (filter_var($_POST['prise'], FILTER_VALIDATE_INT) === false && filter_var($depenses, FILTER_VALIDATE_INT) === false && filter_var($kilometers, FILTER_VALIDATE_INT) === false):
                throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
            else:

                if (DateTime::createFromFormat('Y-m-d', $_POST['seance_date']) !== FALSE):
                    $newSeance = $seancesManager->newSeance($_POST['clients_id'], $_POST['type'], $_POST['seance_date'], $_POST['time_seance'], $_POST['prise'], $depenses, $_POST['model'], $_POST['adresse_seance'], $_POST['city_seance'], $kilometers, $_POST['description_seance']);
                else:
                    throw new Exception("Le formats de date est invalide !");
                endif;

            endif;

        else:
            throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
        endif;

        if ($newSeance === false):
            throw new Exception('Impossible d\'ajouter le seance !');
        else:
            header('Location: index.php?action=seance&id='.$_SESSION['last_id'].'');
        endif;
    }

    public function modifySeancePage()
    {
        $seancesManager = new SeanceManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $modifySeance = $seancesManager->getSeance($_GET['id']);

            if ($modifySeance === false):
                throw new Exception('Impossible d\'afficher le seance modifier page!');
            endif;

        else:
            throw new Exception("Aucun identifiant de seance envoyé");
        endif;

        $modifySeanceType = $seancesManager->typeSeanceList();
        $clientsManager = new ClientManager();
        $modifySeanceClients = $clientsManager->getClients();

        if ($modifySeanceType === false || $modifySeanceClients === false):
            throw new Exception('Impossible d\'afficher le seance modifier page!');
        else:
            require('View/backend/modifySeance.php');
        endif;
    }

    public function modifySeance()
    {
        $seancesManager = new SeanceManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):

            if (!empty($_POST['clients_id']) && trim($_POST['clients_id']) !== '' && !empty($_POST['type']) && trim($_POST['type']) !== '' && !empty($_POST['seance_date']) && trim($_POST['seance_date']) !== '' && !empty($_POST['prise']) && trim($_POST['prise']) !== ''):

                if (!empty($_POST['depenses']) && trim($_POST['depenses']) !== ''):
                    $depenses = $_POST['depenses'];
                else:
                    $depenses = 0;
                endif;
                if (!empty($_POST['km']) && trim($_POST['km']) !== ''):
                    $kilometers = $_POST['km'];
                else:
                    $kilometers = 0;
                endif;

                    if (filter_var($_POST['prise'], FILTER_VALIDATE_INT) === false && filter_var($depenses, FILTER_VALIDATE_INT) === false && filter_var($kilometers, FILTER_VALIDATE_INT) === false):
                        throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
                    else:

                        if (DateTime::createFromFormat('Y-m-d', $_POST['seance_date']) !== FALSE):
                            $updateSeance = $seancesManager->updateSeance($_GET['id'],$_POST['clients_id'], $_POST['type'], $_POST['seance_date'], $_POST['time_seance'], $_POST['prise'], $depenses, $_POST['model'], $_POST['adresse_seance'], $_POST['city_seance'], $kilometers, $_POST['description_seance']);
                        else:
                            throw new Exception("Le formats de date est invalide !");
                        endif;

                    endif;

            else:
                throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
            endif;

        else:
            throw new Exception("Aucun identifiant de seance envoyé");
        endif;

        if ($updateSeance === false):
            throw new Exception('Impossible de modifier le seance !');
        else:
            header('Location: index.php?action=seance&id='.$_GET['id'].'');
        endif;
    }

    public function removeSeance()
    {
        $seancesManager = new SeanceManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $deleteSeance = $seancesManager->deleteSeance($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de seance envoyé");
        endif;

        if ($deleteSeance === false):
            throw new Exception('Impossible de supprimer le seance !');
        else:
            header('Location: index.php?action=dashboard');
        endif;
    }

    //----------------
    //- COMMAND
    //----------------
    public function addCommandPage()
    {
        $commandsManager = new CommandManager();
        $newCommandPage = $commandsManager->typeCommandList();
        $clientsManager = new ClientManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $client = $clientsManager->getClient($_GET['id']);

            if ($client === false):
                throw new Exception('Impossible d\'afficher le commande page !');
            endif;

        endif;

        $clientsList = $clientsManager->getClients();

        if ($newCommandPage === false || $clientsList === false):
            throw new Exception('Impossible d\'afficher le commande page !');
        else:
            require('View/backend/addCommand.php');
        endif;
    }

    public function addCommand()
    {
        $commandsManager = new CommandManager();

        if (!empty($_POST['client_id_cmd']) && trim($_POST['client_id_cmd']) !== '' && !empty($_POST['type_command']) && trim($_POST['type_command']) !== '' && !empty($_POST['prise_command']) && trim($_POST['prise_command']) !== ''):

            if (!empty($_POST['cost_command']) && trim($_POST['cost_command']) !== ''):
                $costs = $_POST['cost_command'];
            else:
                $costs = 0;
            endif;

            if (filter_var($_POST['prise_command'], FILTER_VALIDATE_INT) === false && filter_var($costs, FILTER_VALIDATE_INT) === false):
                throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
            else:
                $newCommand = $commandsManager->newCommand($_POST['client_id_cmd'], $_POST['type_command'], $_POST['description_command'], $_POST['prise_command'], $costs);
            endif;

        else:
            throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
        endif;

        if ($newCommand === false):
            throw new Exception('Impossible d\'ajouter la commande !');
        else:
            header('Location: index.php?action=command&id='.$_SESSION['last_id'].'');
        endif;
    }

    public function modifyCommandPage()
    {
        $commandsManager = new CommandManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $modifyCommand = $commandsManager->getCommand($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de commande envoyé");
        endif;

        $modifyCommandType = $commandsManager->typeCommandList();
        $clientsManager = new ClientManager();
        $modifyCommandClients = $clientsManager->getClients();

        if ($modifyCommand === false || $modifyCommandType === false || $modifyCommandClients === false):
            throw new Exception('Impossible d\'afficher la commande modifier page !');
        else:
            require('View/backend/modifyCommand.php');
        endif;
    }

    public function modifyCommand()
    {
        $commandsManager = new CommandManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):

            if (!empty($_POST['client_id_cmd']) && trim($_POST['client_id_cmd']) !== '' && !empty($_POST['type_command']) && trim($_POST['type_command']) !== '' && !empty($_POST['prise_command']) && trim($_POST['prise_command']) !== ''):

                if (!empty($_POST['cost_command']) && trim($_POST['cost_command']) !== ''):
                    $costs = $_POST['cost_command'];
                else:
                    $costs = 0;
                endif;

                if (filter_var($_POST['prise_command'], FILTER_VALIDATE_INT) === false && filter_var($costs, FILTER_VALIDATE_INT) === false):
                    throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
                else:
                    $updateCommand = $commandsManager->updateCommand($_GET['id'],$_POST['client_id_cmd'], $_POST['type_command'], $_POST['description_command'], $_POST['prise_command'], $costs);
                endif;

            else:
                throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
            endif;

        else:
            throw new Exception("Aucun identifiant de commande envoyé");
        endif;

        if ($updateCommand === false):
            throw new Exception('Impossible de modifier le commande !');
        else:
            header('Location: index.php?action=command&id='.$_GET['id'].'');
        endif;
    }

    public function removeCommand()
    {
        $commandsManager = new CommandManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $deleteCommand = $commandsManager->deleteCommand($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de commande envoyé");
        endif;

        if ($deleteCommand === false):
            throw new Exception('Impossible de supprimer la commande !');
        else:
            header('Location: index.php?action=dashboard');
        endif;
    }

    //----------------
    //- TAXES
    //----------------
    public function addTaxes()
    {
        $taxesManager = new TaxesManager();

        if (!empty($_POST['tax_date']) && trim($_POST['tax_date']) !== '' && !empty($_POST['tax_declare']) && trim($_POST['tax_declare']) !== '' && !empty($_POST['tax_paid']) && trim($_POST['tax_paid']) !== ''):

            if (filter_var($_POST['tax_declare'], FILTER_VALIDATE_INT) === false && filter_var($_POST['tax_paid'], FILTER_VALIDATE_INT) === false):
                throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
            else:
                $newTaxe = $taxesManager->newTaxes($_POST['tax_date'], $_POST['tax_declare'], $_POST['tax_paid'], $_POST['tax_description']);
            endif;

        else:
            throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
        endif;

        if ($newTaxe === false):
            throw new Exception('Impossible d\'ajouter la taxe !');
        else:
            header('Location: index.php?action=taxe&id='.$_SESSION['last_id'].'');
        endif;
    }

    public function modifyTaxesPage()
    {
        $taxesManager = new TaxesManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $modifyTax = $taxesManager->getTaxe($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de taxe envoyé");
        endif;

        if ($modifyTax === false):
            throw new Exception('Impossible d\'afficher le taxe page !');
        else:
            require('View/backend/modifyTax.php');
        endif;
    }

    public function modifyTaxes()
    {
        $taxesManager = new TaxesManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):

            if (!empty($_POST['tax_date']) && trim($_POST['tax_date']) !== '' && !empty($_POST['tax_declare']) && trim($_POST['tax_declare']) !== '' && !empty($_POST['tax_paid']) && trim($_POST['tax_paid']) !== ''):

                if (filter_var($_POST['tax_declare'], FILTER_VALIDATE_INT) === false && filter_var($_POST['tax_paid'], FILTER_VALIDATE_INT) === false):
                    throw new Exception("Le formats de donnes est invalide ex. letrres a la place de chiffres !");
                else:
                    $updateTaxe = $taxesManager->updateTaxe($_GET['id'], $_POST['tax_date'], $_POST['tax_declare'], $_POST['tax_paid'], $_POST['tax_description']);
                endif;

            else:
                throw new Exception("Tous les champs obligatoires ne sont pas remplis !");
            endif;

        else:
            throw new Exception("Aucun identifiant de taxe envoyé");
        endif;

        if ($updateTaxe === false):
            throw new Exception('Impossible de modifier la taxe !');
        else:
            header('Location: index.php?action=taxe&id='.$_GET['id'].'');
        endif;
    }

    public function removeTaxe()
    {
        $taxesManager = new TaxesManager();

        if (isset($_GET['id']) && $_GET['id'] > 0):
            $deleteTaxe = $taxesManager->deleteTaxe($_GET['id']);
        else:
            throw new Exception("Aucun identifiant de taxe envoyé");
        endif;

        if ($deleteTaxe === false):
            throw new Exception('Impossible de supprimer la taxe !');
        else:
            header('Location: index.php?action=dashboard');
        endif;
    }
}
