<?php
namespace Controller;

use Model\SeanceManager;
use Model\ClientManager;
use Model\CommandManager;
use Model\TaxesManager;
use Exception;

class Focus
{
    //----------------
    //- CLIENTS
    //----------------
    public function listClients()
    {
        $clientsManager = new ClientManager();
        $clients = $clientsManager->getClients();
        if ($clients === false):

            throw new Exception('Impossible d\'afficher le contenue de clients list !');

        else:

            require('View/frontend/clientsList.php');

        endif;
    }

    function client()
    {
        $clientsManager = new ClientManager();
        $client = $clientsManager->getClient($_GET['id']);
        $seancesManager = new SeanceManager();
        $seance = $seancesManager->getClientSeance($_GET['id']);
        $commandsManager = new CommandManager();
        $command = $commandsManager->getClientCommand($_GET['id']);

        if ($client === false || $seance === false || $command === false):

            throw new Exception('Impossible d\'afficher le client contenue !');

        else:

            require('View/frontend/client.php');

        endif;
    }

    //----------------
    //- SEANCES
    //----------------
    public function listSeances()
    {
        $seancesManager = new SeanceManager();
        $seances = $seancesManager->getSeances();
        $cashTypeSeance = $seancesManager->typeCashSession();
        $cashSummarySeance = $seancesManager->totals();
        $monthSeances = $seancesManager->monthSeances();


        if ($seances === false || $cashTypeSeance === false || $cashSummarySeance === false || $monthSeances === false):

            throw new Exception('Impossible d\'afficher le listSeances contenue !');

        else:

            $resultsMonthSeance = array();
            $resultsSeancesCash = array();
            $resultsSeancesDepenses = array();
            while ($data = $monthSeances->fetch()):

                $monthNum  = htmlspecialchars($data['month']);
                $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
                $depensesSeance = htmlspecialchars($data['drove']) * 0.15 +htmlspecialchars($data['paied']);
                $depensesSeanceSummary = htmlspecialchars($data['cash']) - intval($depensesSeance);
                array_push($resultsMonthSeance, $monthName);
                array_push($resultsSeancesCash, intval(htmlspecialchars($data['cash'])));
                array_push($resultsSeancesDepenses, $depensesSeanceSummary);
            endwhile;

            require('View/frontend/seancesList.php');

        endif;
    }

    public function seance()
    {
        $seancesManager = new SeanceManager();
        $seance = $seancesManager->getSeance($_GET['id']);
        if ($seance === false):

            throw new Exception('Impossible d\'afficher le seance contenue !');
        else:

            require('View/frontend/seance.php');

        endif;
    }

    //----------------
    //- COMMANDS
    //----------------
    public function listCommands()
    {
        $commandsManager = new CommandManager();
        $commands = $commandsManager->getCommands();
        $commandsTotal = $commandsManager->totalsCmd();

        if ($commands === false || $commandsTotal === false):

            throw new Exception('Impossible d\'afficher le listCommands contenue !');

        else:

            require('View/frontend/commandsList.php');

        endif;
    }

    public function command()
    {
        $commandsManager = new CommandManager();
        $command = $commandsManager->getCommand($_GET['id']);

        if ($command === false):

            throw new Exception('Impossible d\'afficher le command contenue !');

        else:

            require('View/frontend/command.php');

        endif;
    }

    //----------------
    //- TAXES
    //----------------
    public function listTaxes()
    {
        $taxesManager = new TaxesManager();
        $taxes = $taxesManager->getTaxes();
        $totalTaxes = $taxesManager->totalsTax();
        if ($taxes === false || $totalTaxes === false):

            throw new Exception('Impossible d\'afficher le listTaxes contenue !');

        else:

            require('View/frontend/taxesList.php');

        endif;

    }

    public function taxe()
    {
        $taxesManager = new TaxesManager();
        $taxe = $taxesManager->getTaxe($_GET['id']);

        if ($taxe === false):

            throw new Exception('Impossible d\'afficher le contenue !');

        else:

            require('View/frontend/taxe.php');

        endif;
    }

    /*public function instagram(){
      $url = 'https://api.instagram.com/v1/users/self/?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
      $api_response = file_get_contents($url);
      $record = json_decode($api_response);
      return $record;
    }*/

}
