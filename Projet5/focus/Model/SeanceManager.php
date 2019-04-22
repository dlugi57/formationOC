<?php
namespace Model;

require_once("Model/Manager.php");

class SeanceManager extends Manager
{

  public function getSeances()
  {

    //'SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC'

    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->query('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client ORDER BY creation_date_seance DESC');

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

  public function monthSeances()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT Month(creation_date) as month, Count(*) as nb, SUM(prise) as cash, SUM(depenses) as paied, SUM(km) as drove FROM seances GROUP BY Month(creation_date) LIMIT 0,6';
    $req = $db->query($sql);

    return $req;
  }

  public function typeSession(){
    $db = $this->dbConnect();

//'SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client ORDER BY creation_date_seance DESC'
  //  SELECT count(s.id_seance) as nb, s.type, t.nom_type FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type LIMIT 0,8

    //$sql = 'SELECT count(*) as nb, type FROM seances GROUP BY type LIMIT 0,8';
    $sql = 'SELECT count(s.id_seance) as nb, s.type, t.nom_type FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type';
    $req = $db->query($sql);

    return $req;
  }




}
