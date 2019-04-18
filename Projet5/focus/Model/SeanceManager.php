<?php
namespace Model;

require_once("Model/Manager.php");

class SeanceManager extends Manager
{

  public function getSeances()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');

    return $req;
  }




}
