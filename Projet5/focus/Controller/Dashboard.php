<?php

namespace Controller;

require_once "Model/ClientManager.php";
require_once "Model/SeanceManager.php";
require_once "Model/CommandManager.php";
require_once "Model/TaxesManager.php";

use Model\SeanceManager;
use Model\ClientManager;
use Model\CommandManager;
use Model\TaxesManager;
use Exception;

/**
 *
 */
class Dashboard
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
    $monthSeancesCmd = $seancesManager->monthSeancesCmd();

    //$test = $seancesManager->test();

    $typeSession = $seancesManager->typeSession();
    $seancesList= $seancesManager->getSeances();

    $commandsManager = new CommandManager();
    $sumMonthCmd = $commandsManager->monthCmd();

    $taxesManager = new TaxesManager();
    $monthPaiedTax = $taxesManager->monthPaiedTax();


    $sumNet =  Dashboard::sumNet();
    $sumBrut = Dashboard::sumBrut();
  //  $instagram = Backend::instagram();
    $facebook = Dashboard::facebook();
    //create array to send them into js
    $resultsNb = array();
    $resultsMonth = array();
    $resultsNbSeance = array();
    $resultsMonthCash = array();
    $resultsMonthCashNet = array();
    $resultsMonthPaiedTax = array();

    while ($data = $monthClients->fetch())
    {
      $monthNum  = $data['month'];
      $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
      array_push($resultsNb,intval($data['nb']));
      array_push($resultsMonth, $monthName);
    }

    while ($data = $monthPaiedTax->fetch())
    {
      $sumTax  = $data['taxesMonth'];

      array_push($resultsMonthPaiedTax, intval($sumTax));
    }

    while ($data = $monthSeances->fetch())
    {
      //$depenses = $data['drove'] * 0.15 + $data['paied'];
      //$cashNet = $data['cash'] - $depenses;
    //  array_push($resultsMonthCashNet,$cashNet);
      array_push($resultsNbSeance,intval($data['nb']));
    //  array_push($resultsMonthCash, $data['cash']);
    }

    while ($data = $monthSeancesCmd->fetch())
    {
    //  monthname(creation_date), sum(val1) seance_cash, sum(val2) cmd_cash, sum(val3) seance_depense, sum(val4) cmd_depense, sum(val5) seances_km, sum(val6) cmd_km
      $depenses = $data['seances_km'] * 0.15 + $data['cmd_km'] * 0.15 + $data['seance_depense'] + $data['cmd_depense'];
      $entrance = $data['seance_cash'] + $data['cmd_cash'];
      $cashNet = $entrance - $depenses;
      array_push($resultsMonthCashNet,intval($cashNet));
    //  array_push($resultsNbSeance,$data['nb']);
      array_push($resultsMonthCash, intval($entrance));
    }



    require('View/dashboard.php');

  }


  public function sumNet(){
    $seancesManager = new SeanceManager();
    $sumNetSeances = $seancesManager->totals();
    $commandsManager = new CommandManager();
    $sumNetCmd = $commandsManager->totalsCmd();
    //$sumMonthCmd = $commandsManager->monthCmd();
    $taxesManager = new TaxesManager();
    $sumTaxes = $taxesManager->totalsTax();

    $summarySeances = $sumNetSeances['sumPrise'] - $sumNetSeances['sumDep'] - ($sumNetSeances['sumKm'] * 0.15);
    $sumaryCmd = $sumNetCmd['sumPriseCmd'] - $sumNetCmd['sumDepCmd'];
    $summary = $summarySeances + $sumaryCmd - $sumTaxes['sumPaidTax'];

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
