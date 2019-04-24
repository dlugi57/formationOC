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
    //  $instagram = Backend::instagram();
      $facebook = Backend::facebook();


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
    public function facebook(){
      $urlFB = "https://graph.facebook.com/";
      $fb_page = 'SunnyMomentsPhoto';
      $infosFB = '?fields=engagement,name,rating_count,overall_star_rating,username,cover,picture.height(300)&access_token=';
      $access_token = 'EAAGkpQmbZCR8BAL4au06FW7vxBmNMOl1ybndBuITDs2szMaapszs0YT7SZCWs1zLHdy7KyCRRur2MAxDTZADrO1bhGyVu47hDXRue2ew8RRw1fwdZBvgm94PtZAunlwFmHOg4mu6kWan0TLKMrBCteRe361D6sE9VNkeWZCvXZA1244UyY0syiW';
      $url = $urlFB.$fb_page.$infosFB.$access_token;
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($curl);
      curl_close($curl);
      $detailsFB = json_decode($result,true);
      return $detailsFB;
    }
}
