<?php

namespace Controller;

require_once "Model/ClientManager.php";
require_once "Model/SeanceManager.php";
require_once "Model/CommandManager.php";

use Model\SeanceManager;
use Model\ClientManager;
use Model\CommandManager;
use Exception;

class Backend
{
    public function dashboard()
    {
      $clientsManager = new ClientManager();
      $countClients = $clientsManager->countClients();
      $monthClients = $clientsManager->monthClients();
      $contactBy = $clientsManager->contactBy();
      $clientsList = $clientsManager->getClients();


      $seancesManager = new SeanceManager();
      $countSeances = $seancesManager->countSeances();
      $countFutureSeances = $seancesManager->countFutureSeances();
      $sumBrutSeances = $seancesManager->totals();
      $monthSeances = $seancesManager->monthSeances();
      $typeSession = $seancesManager->typeSession();
      $seancesList= $seancesManager->getSeances();

      $sumNet =  Backend::sumNet();


      require('View/dashboard.php');

    }

    public function sumNet(){
      $seancesManager = new SeanceManager();
      $sumNetSeances = $seancesManager->totals();

      $summary = $sumNetSeances['sumPrise'] - $sumNetSeances['sumDep'] - ($sumNetSeances['sumKm'] * 0.15);

      return $summary;

    }
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






    public function listSeances()
    {
      $seancesManager = new SeanceManager();
      $seances = $seancesManager->getSeances();

      if ($seances === false)
      {
          throw new Exception('Impossible d\'afficher le contenue !');
      }else
      {
          require('View/seancesList.php');
      }
    }

    public function listCommands()
    {
      $commandsManager = new CommandManager();
      $commands = $commandsManager->getCommands();
      if ($commands === false)
      {
          throw new Exception('Impossible d\'afficher le contenue !');
      }else
      {
          require('View/commandsList.php');
      }

    }
}
