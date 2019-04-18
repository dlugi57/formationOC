<?php

namespace Controller;

require_once "Model/ClientManager.php";

use Model\ClientManager;
use Exception;

class Backend
{
    function dashboard()
    {


      require('View/dashboard.php');



    }
    function listClients()
    {
        $clientsManager = new ClientManager();
        $clients = $clientsManager->getClient();

        if ($clients === false)
        {
            throw new Exception('Impossible d\'afficher le contenue !');
        }else
        {
            require('View/clientsList.php');
        }

    }
}
