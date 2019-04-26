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

class Focus
{
    public function listClients()
    {
        $clientsManager = new ClientManager();
        $clients = $clientsManager->getClients();
        if ($clients === false)
        {
            throw new Exception('Impossible d\'afficher le contenue !');
        }else
        {
            require('View/clientsList.php');
        }
    }

    //SEANCES
    public function listSeances()
    {
      $seancesManager = new SeanceManager();
      $seances = $seancesManager->getSeances();
      //$seancesMonthly = $seancesManager->monthSeances();
      $cashTypeSeance = $seancesManager->typeCashSession();
      $cashSummarySeance = $seancesManager->totals();
      $monthSeances = $seancesManager->monthSeances();
      $resultsMonthSeance = array();
      $resultsSeancesCash = array();
      $resultsSeancesDepenses = array();
      while ($data = $monthSeances->fetch())
      {
        $monthNum  = $data['month'];
        $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
        $depensesSeance = $data['drove'] * 0.15 +$data['paied'];
        $depensesSeanceSummary = $data['cash'] - intval($depensesSeance);
        array_push($resultsMonthSeance, $monthName);
        array_push($resultsSeancesCash, intval($data['cash']));
        array_push($resultsSeancesDepenses, $depensesSeanceSummary);
      }
      if ($seances === false)
      {
          throw new Exception('Impossible d\'afficher le contenue !');
      }else
      {
          require('View/seancesList.php');
      }
    }

    /*public function recapSeanceMonth(){
      $seancesManager = new SeanceManager();

      return $resultsMonthSeance;
    }*/


    public function listCommands()
    {
      $commandsManager = new CommandManager();
      $commands = $commandsManager->getCommands();
      $commandsTotal = $commandsManager->totalsCmd();
      if ($commands === false)
      {
          throw new Exception('Impossible d\'afficher le contenue !');
      }else
      {
          require('View/commandsList.php');
      }

    }

    public function listTaxes()
    {
      $taxesManager = new TaxesManager();
      $taxes = $taxesManager->getTaxes();
      if ($taxes === false)
      {
          throw new Exception('Impossible d\'afficher le contenue !');
      }else
      {
          require('View/taxesList.php');
      }

    }

    /*public function instagram(){
      $url = 'https://api.instagram.com/v1/users/self/?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
      $api_response = file_get_contents($url);
      $record = json_decode($api_response);
      return $record;

    }*/

}
