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

  public function countSeances()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT COUNT(*) AS nb FROM seances';
    $result = $db->query($sql);
    $countSeances = $result->fetch();
    return $countSeances;

  }

  public function countFutureSeances()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT COUNT(*) AS nb FROM seances WHERE seance_date >= CURDATE()';
    $result = $db->query($sql);
    $countFutureSeances = $result->fetch();
    return $countFutureSeances;
  }

  public function totals()
  {

    $db = $this->dbConnect();
    $sql = 'SELECT SUM(prise) AS sumPrise,SUM(depenses) AS sumDep, SUM(km) AS sumKm FROM `seances`';
    $result = $db->query($sql);
    $sumSeances = $result->fetch();
    return $sumSeances;

  }




}
