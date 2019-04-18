<?php

namespace Controller;

require_once "Model/ClientManager.php";

use Model\ClientManager;
use Exception;

class Backend
{
    public function dashboard()
    {
      $clientsManager = new ClientManager();
      $countClients = $clientsManager->countClients();

      require('View/dashboard.php');

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
}
