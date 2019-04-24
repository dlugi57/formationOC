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
      $sumBrut = Backend::sumBrut();
      $instagram = Backend::instagram();


      require('View/dashboard.php');

    }

    public function sumNet(){
      $seancesManager = new SeanceManager();
      $sumNetSeances = $seancesManager->totals();
      $commandsManager = new CommandManager();
      $sumNetCmd = $commandsManager->totalsCmd();

      $summarySeances = $sumNetSeances['sumPrise'] - $sumNetSeances['sumDep'] - ($sumNetSeances['sumKm'] * 0.15);
      $sumaryCmd = $sumNetCmd['sumPriseCmd'] - $sumNetCmd['sumDepCmd'];
      $summary = $summarySeances + $sumaryCmd;

      return $summary;

    }

    public function sumBrut(){
      $seancesManager = new SeanceManager();
      $sumBrutSeances = $seancesManager->totals();
      $commandsManager = new CommandManager();
      $sumBrutCmd = $commandsManager->totalsCmd();

      $summary = $sumBrutSeances['sumPrise'] + $sumBrutCmd['sumPriseCmd'];
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

    public function instagram(){
      $url = 'https://api.instagram.com/v1/users/self/?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
      //$url = 'https://api.instagram.com/v1/users/sunnymoments.photo?access_token=6995657814.d948bef.c504d590713243449dd958d4c3b31495';
      $api_response = file_get_contents($url);
      $record = json_decode($api_response);
      return $record;
    //  echo $record->data->counts->followed_by;

      // if nothing is echoed try
      //echo '<pre>' . print_r($api_response, true) . '</pre>';
    //  echo '<pre>' . print_r($record, true) . '</pre>';
    }
}
