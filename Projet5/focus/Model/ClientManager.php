<?php

namespace Model;

//require_once("Model/Manager.php");

class ClientManager extends Manager
{
    public function getClients()
    {
        $db = $this->dbConnect();

        //$req = $db->query('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance ORDER BY seance_date ASC');

        $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients INNER JOIN contact_by ON contact_by = id_contact_by ORDER BY creation_date DESC');
        //  $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients ORDER BY creation_date DESC');

        return $req;
    }

    public function getClient($clientId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients INNER JOIN contact_by ON contact_by = id_contact_by WHERE id_client = ?');
        $req->execute(array($clientId));
        $post = $req->fetch();

        return $post;
    }


    public function newClient($name, $tel, $email, $adress, $city, $post, $contact, $description)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO clients(name, tel, email, adress, city, post_code, contact_by, description, creation_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $addedClient = $req->execute(array($name, $tel, $email, $adress, $city, $post, $contact, $description));
        $last_id = $db->lastInsertId();
        $_SESSION['last_id'] = $last_id;

        return $addedClient;
    }

    public function updateClient($id_client, $name, $tel, $email, $adress, $city, $post_code, $contact_by, $description)
    {
        $db = $this->dbConnect();
        //$db = $this->dbConnect($id_client, $name, $tel, $email, $adress, $city, $post_code, $contact_by, $description);
        //$request = $db->prepare('UPDATE clients SET name = :name, tel = :tel, email = :email, adress = :adress, city = :city, post_code = :post_code, contact_by = :contact_by, description = :description,creation_date = NOW() WHERE id_client = :id_client');
        $request = $db->prepare('UPDATE clients SET name = :name, tel = :tel, email = :email, adress = :adress, city = :city, post_code = :post_code, contact_by = :contact_by, description = :description WHERE id_client = :id_client');
        $request->execute(array('name' => $name,
                                'tel' => $tel,
                                'email' => $email,
                                'adress' => $adress,
                                'city' => $city,
                                'post_code' => $post_code,
                                'contact_by' => $contact_by,
                                'description' => $description,
                                'id_client' => $id_client));

        return $request;

    }

    public function countClients()
    {
      $db = $this->dbConnect();
      $sql = 'SELECT COUNT(*) AS nb FROM clients';
      $result = $db->query($sql);
      $countClients = $result->fetch();
      return $countClients;

    }

    public function monthClients(){
      $db = $this->dbConnect();
      $sql = 'SELECT Month(creation_date) as month, Count(*) as nb FROM clients GROUP BY Month(creation_date) LIMIT 0,7';
      $req = $db->query($sql);

      return $req;
    }

    public function contactBy(){
      $db = $this->dbConnect();
      //$sql = 'SELECT count(s.id_seance) as nb, s.type, t.nom_type, t.color_camembert, t.color_dash, t.color_boot FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type';
      $sql = 'SELECT count(c.id_client) as nb, c.contact_by, b.nom_contact_by, b.color_camembert, b.color_dash, b.color_boot FROM clients c INNER JOIN contact_by b ON c.contact_by = b.id_contact_by GROUP BY b.nom_contact_by ORDER BY nb DESC';
      //$sql = 'SELECT count(*) as nb, contact_by FROM clients GROUP BY contact_by LIMIT 0,8';
      $req = $db->query($sql);

      return $req;
    }

    public function contactByList(){
      $db = $this->dbConnect();
      //$sql = 'SELECT count(s.id_seance) as nb, s.type, t.nom_type, t.color_camembert, t.color_dash, t.color_boot FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type';
      $sql = 'SELECT * FROM contact_by';
      //$sql = 'SELECT count(*) as nb, contact_by FROM clients GROUP BY contact_by LIMIT 0,8';
      $req = $db->query($sql);

      return $req;
    }

    public function deleteClient($id_client)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM clients WHERE id_client = :id_client');
        $request->execute(array('id_client' => $id_client));

        $deleteSeance = $db->prepare('DELETE FROM seances WHERE clients_id = :clients_id');
        $deleteSeance->execute(array('clients_id' => $id_client));

        $deleteCommand = $db->prepare('DELETE FROM commands WHERE client_id_cmd = :client_id_cmd');
        $deleteCommand->execute(array('client_id_cmd' => $id_client));

        $request->closeCursor();
    }

}
