<?php
namespace Controller;

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
        $seancesList= $seancesManager->getFutureSeances();

        //COMMANDS
        $sumMonthCmd = $commandsManager->monthCmd();
        $countCommands = $commandsManager->totalsCmd();

        //Monthly recaps send arrays into JS
        $resultsMonthPaiedTax = Dashboard::monthTax();
        $resultsNb = Dashboard::monthClients();
        $resultsMonth = Dashboard::monthList();
        $resultsNbSeance = Dashboard::monthBySeances();
        $resultsMonthCashNet = Dashboard::monthNet();
        $resultsMonthCash = Dashboard::monthBrut();

        //facebook
        $facebook = Dashboard::facebook();

        if ($countClients === false || $countSeances === false):
            throw new Exception('Impossible d\'afficher le widgets contenue !');
        elseif($contactBy === false || $clientsList === false) :
            throw new Exception('Impossible d\'afficher le client contenue !');
        elseif($countFutureSeances === false || $sumBrutSeances === false || $typeSession === false || $seancesList === false) :
            throw new Exception('Impossible d\'afficher le seance contenue !');
        elseif($sumMonthCmd === false) :
            throw new Exception('Impossible d\'afficher le command contenue !');
        else:
            require('View/frontend/dashboard.php');
        endif;
    }

    public function monthBrut()
    {
        $seancesManager = new SeanceManager();
        $monthSeancesCmd = $seancesManager->monthSeancesCmd();

        if ($monthSeancesCmd === false):
            throw new Exception('Impossible d\'afficher le month brut contenue !');
        else:
            $resultsMonthCash = array();

            while ($data = $monthSeancesCmd->fetch()):
                $entrance = htmlspecialchars($data['seance_cash']) + htmlspecialchars($data['cmd_cash']);
                array_push($resultsMonthCash, intval($entrance));
            endwhile;

            return $resultsMonthCash;

        endif;
    }

    public function monthNet()
    {
        $seancesManager = new SeanceManager();
        $monthSeancesCmd = $seancesManager->monthSeancesCmd();

        if ($monthSeancesCmd === false):
            throw new Exception('Impossible d\'afficher le month net contenue!');
        else:
            $resultsMonthCashNet = array();

            while ($data = $monthSeancesCmd->fetch()):
                $depenses = htmlspecialchars($data['seances_km']) * 0.15 + htmlspecialchars($data['cmd_km']) * 0.15 + htmlspecialchars($data['seance_depense']) + htmlspecialchars($data['cmd_depense']);
                $entrance = htmlspecialchars($data['seance_cash']) + htmlspecialchars($data['cmd_cash']);
                $cashNet = $entrance - $depenses;
                array_push($resultsMonthCashNet,intval($cashNet));
            endwhile;

            return $resultsMonthCashNet;

        endif;
    }

    public function monthBySeances()
    {
        $seancesManager = new SeanceManager();
        $monthSeances = $seancesManager->monthSeances();

        if ($monthSeances === false):
            throw new Exception('Impossible d\'afficher le monthBySeances contenue!');
        else:
            $resultsNbSeance = array();
            while ($data = $monthSeances->fetch()):

                array_push($resultsNbSeance,intval(htmlspecialchars($data['nb'])));
            endwhile;

            return $resultsNbSeance;

        endif;
    }

    public function monthList()
    {
        $clientsManager = new ClientManager();
        $monthClients = $clientsManager->monthClients();

        if ($monthClients === false):
            throw new Exception('Impossible d\'afficher le monthList contenue!');
        else:
            $resultsMonth = array();

            while ($data = $monthClients->fetch()):
                $monthNum  = htmlspecialchars($data['month']);
                $monthNameEng = date('F', mktime(0, 0, 0, $monthNum, 10));
                setlocale (LC_TIME, 'fr_FR.utf8','fra');
                $monthName = utf8_encode(strftime( "%B", strtotime($monthNameEng)));
                array_push($resultsMonth, ucfirst($monthName));
            endwhile;

            return $resultsMonth;

        endif;
    }

    public function monthClients()
    {
        $clientsManager = new ClientManager();
        $monthClients = $clientsManager->monthClients();

        if ($monthClients === false):
            throw new Exception('Impossible d\'afficher le monthClients contenue!');
        else:
            $resultsNb = array();

            while ($data = $monthClients->fetch()):
                array_push($resultsNb,intval(htmlspecialchars($data['nb'])));
            endwhile;

            return $resultsNb;

        endif;
    }

    public function monthTax()
    {
        $taxesManager = new TaxesManager();
        $monthPaiedTax = $taxesManager->monthPaiedTax();

        if ($monthPaiedTax === false):
            throw new Exception('Impossible d\'afficher le monthTax contenue!');
        else:
            $resultsMonthPaiedTax = array();

            while ($data = $monthPaiedTax->fetch()):
                $sumTax  = htmlspecialchars($data['taxesMonth']);
                array_push($resultsMonthPaiedTax, intval($sumTax));
            endwhile;

            return $resultsMonthPaiedTax;

        endif;
    }

    public function sumNet()
    {
        $seancesManager = new SeanceManager();
        $sumNetSeances = $seancesManager->totals();
        $commandsManager = new CommandManager();
        $sumNetCmd = $commandsManager->totalsCmd();
        $taxesManager = new TaxesManager();
        $sumTaxes = $taxesManager->totalsTax();

        if ($sumNetSeances === false || $sumNetCmd === false || $sumTaxes === false):
            throw new Exception('Impossible d\'afficher le sumNet contenue!');
        else:
            $summarySeances = htmlspecialchars($sumNetSeances['sumPrise']) - htmlspecialchars($sumNetSeances['sumDep']) - (htmlspecialchars($sumNetSeances['sumKm']) * 0.15);
            $sumaryCmd = htmlspecialchars($sumNetCmd['sumPriseCmd']) - htmlspecialchars($sumNetCmd['sumDepCmd']);
            $summary = $summarySeances + $sumaryCmd - htmlspecialchars($sumTaxes['sumPaidTax']);

            return $summary;

        endif;
    }

    public function sumBrut()
    {
        $seancesManager = new SeanceManager();
        $sumBrutSeances = $seancesManager->totals();
        $commandsManager = new CommandManager();
        $sumBrutCmd = $commandsManager->totalsCmd();

        if ($sumBrutSeances === false || $sumBrutCmd === false):
            throw new Exception('Impossible d\'afficher le sumNet contenue!');
        else:
            $summary = htmlspecialchars($sumBrutSeances['sumPrise']) + htmlspecialchars($sumBrutCmd['sumPriseCmd']);
            
            return $summary;

        endif;
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
