<?php

namespace Controller;

class Backend
{
    public function dashboard()
    {


      require('view/dashboard.php');



    }
    public function listClients()
    {
        $clientsManager = new Model\ClientManager();
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
