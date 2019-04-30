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

class Dashboard
{
  public function dashboard()
  {
    $clientsManager = new ClientManager();
    $seancesManager = new SeanceManager();
    $commandsManager = new CommandManager();
    //GLOBAL CASH 4 mini widgets
    $sumNet =  Dashboard::sumNet();
    $sumBrut = Dashboard::sumBrut();
    $countClients = $clientsManager->countClients();
    $countSeances = $seancesManager->countSeances();

    //CLIENTS
    $contactBy = $clientsManager->contactBy();
    $clientsList = $clientsManager->getClients();

    //SEANCES
    $countFutureSeances = $seancesManager->countFutureSeances();
    $sumBrutSeances = $seancesManager->totals();
    $typeSession = $seancesManager->typeSession();
    $seancesList= $seancesManager->getSeances();

    //COMMANDS
    $sumMonthCmd = $commandsManager->monthCmd();

    //Monthly recaps send arrays into JS
    $resultsMonthPaiedTax = Dashboard::monthTax();
    $resultsNb = Dashboard::monthClients();
    $resultsMonth = Dashboard::monthList();
    $resultsNbSeance = Dashboard::monthBySeances();
    $resultsMonthCashNet = Dashboard::monthNet();
    $resultsMonthCash = Dashboard::monthBrut();

    //facebook
    $facebook = Dashboard::facebook();
    require('View/frontend/dashboard.php');

  }

  public function monthBrut()
  {
    $seancesManager = new SeanceManager();
    $monthSeancesCmd = $seancesManager->monthSeancesCmd();
    $resultsMonthCash = array();
    while ($data = $monthSeancesCmd->fetch())
    {
      $entrance = $data['seance_cash'] + $data['cmd_cash'];
      array_push($resultsMonthCash, intval($entrance));
    }
    return $resultsMonthCash;
  }

  public function monthNet()
  {
    $seancesManager = new SeanceManager();
    $monthSeancesCmd = $seancesManager->monthSeancesCmd();
    $resultsMonthCashNet = array();
    while ($data = $monthSeancesCmd->fetch())
    {
      $depenses = $data['seances_km'] * 0.15 + $data['cmd_km'] * 0.15 + $data['seance_depense'] + $data['cmd_depense'];
      $entrance = $data['seance_cash'] + $data['cmd_cash'];
      $cashNet = $entrance - $depenses;
      array_push($resultsMonthCashNet,intval($cashNet));
    }
    return $resultsMonthCashNet;
  }

  public function monthBySeances()
  {
    $seancesManager = new SeanceManager();
    $monthSeances = $seancesManager->monthSeances();
    $resultsNbSeance = array();
    while ($data = $monthSeances->fetch())
    {
      array_push($resultsNbSeance,intval($data['nb']));
    }
    return $resultsNbSeance;
  }

  public function monthList()
  {
    $clientsManager = new ClientManager();
    $monthClients = $clientsManager->monthClients();
    $resultsMonth = array();
    while ($data = $monthClients->fetch())
    {
      $monthNum  = $data['month'];
      $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
      array_push($resultsMonth, $monthName);
    }
    return $resultsMonth;
  }

  public function monthClients()
  {
    $clientsManager = new ClientManager();
    $monthClients = $clientsManager->monthClients();
    $resultsNb = array();
    while ($data = $monthClients->fetch())
    {
      array_push($resultsNb,intval($data['nb']));
    }
    return $resultsNb;
  }

  public function monthTax()
  {
    $taxesManager = new TaxesManager();
    $monthPaiedTax = $taxesManager->monthPaiedTax();
    $resultsMonthPaiedTax = array();
    while ($data = $monthPaiedTax->fetch())
    {
      $sumTax  = $data['taxesMonth'];
      array_push($resultsMonthPaiedTax, intval($sumTax));
    }
    return $resultsMonthPaiedTax;
  }

  public function sumNet(){
    $seancesManager = new SeanceManager();
    $sumNetSeances = $seancesManager->totals();
    $commandsManager = new CommandManager();
    $sumNetCmd = $commandsManager->totalsCmd();
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

  public function facebook()
  {
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
