<?php

namespace Controller;

require_once "Model/ClientManager.php";
require_once "Model/SeanceManager.php";

use Model\SeanceManager;
use Model\ClientManager;
use Exception;

class Backend
{
    public function dashboard()
    {
      $clientsManager = new ClientManager();
      $countClients = $clientsManager->countClients();

      $seancesManager = new SeanceManager();
      $countSeances = $seancesManager->countSeances();
      $countFutureSeances = $seancesManager->countFutureSeances();
      $sumNetSeances = $seancesManager->totals();

      $sumBrut =  Backend::sumBrut();


      require('View/dashboard.php');

    }

    public function sumBrut(){
      $seancesManager = new SeanceManager();
      $sumBrutSeances = $seancesManager->totals();

      $summary = $sumBrutSeances['sumPrise'] - $sumBrutSeances['sumDep'] - ($sumBrutSeances['sumKm'] * 0.15);

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
}
