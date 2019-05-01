<?php
namespace Model;

//require_once("Model/Manager.php");

class SeanceManager extends Manager
{

  public function getSeances()
  {

    //'SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC'

    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->query('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance ORDER BY seance_date ASC');

    return $req;
  }

  public function getFutureSeances()
  {

  //  $sql = 'SELECT COUNT(*) AS nb FROM seances WHERE seance_date >= CURDATE()';




    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->query('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance WHERE seance_date >= CURDATE() ORDER BY seance_date ASC LIMIT 0,7');

    return $req;

  }


  public function getClientSeance($clientId)
  {

    //'SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC'

    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->prepare('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance WHERE clients_id = ? ORDER BY seance_date ASC');
    $req->execute(array($clientId));

    return $req;
  }

  public function getSeance($seanceId)
  {
      $db = $this->dbConnect();
      $request = $db->prepare('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance WHERE id_seance = ?');
      $request->execute(array($seanceId));
      $seance = $request->fetch();
      $request->closeCursor();

      return $seance;
  }


  public function updateSeance($id_seance, $clients_id, $type, $seance_date, $time_seance, $prise, $depenses, $model, $adresse_seance, $city_seance, $km, $description_seance)
  {
      $db = $this->dbConnect();
      $request = $db->prepare('UPDATE seances SET clients_id = :clients_id, type = :type, seance_date = :seance_date, time_seance = :time_seance, prise = :prise, depenses = :depenses, model = :model, adresse_seance = :adresse_seance, city_seance = :city_seance, km = :km, description_seance = :description_seance WHERE id_seance = :id_seance');
      $request->execute(array('clients_id' => $clients_id,
                              'type' => $type,
                              'seance_date' => $seance_date,
                              'time_seance' => $time_seance,
                              'prise' => $prise,
                              'depenses' => $depenses,
                              'model' => $model,
                              'adresse_seance' => $adresse_seance,
                              'city_seance' => $city_seance,
                              'km' => $km,
                              'description_seance' => $description_seance,
                              'id_seance' => $id_seance));

      return $request;

  }


  public function newSeance($clients_id, $type, $seance_date, $time_seance, $prise, $depenses, $model, $adresse_seance, $city_seance, $km, $description_seance)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('INSERT INTO seances(clients_id, type, seance_date, time_seance, prise, depenses, model, adresse_seance, city_seance, km, description_seance, creation_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
      $addedSeance = $req->execute(array($clients_id, $type, $seance_date, $time_seance, $prise, $depenses, $model, $adresse_seance, $city_seance, $km, $description_seance));
      $last_id = $db->lastInsertId();
      $_SESSION['last_id'] = $last_id;

      return $addedSeance;
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
    $sql = 'SELECT SUM(prise) AS sumPrise,SUM(depenses) AS sumDep, SUM(km) AS sumKm FROM seances';
    $result = $db->query($sql);
    $sumSeances = $result->fetch();
    return $sumSeances;

  }

  public function monthSeances()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT Month(creation_date) as month, Count(*) as nb, SUM(prise) as cash, SUM(depenses) as paied, SUM(km) as drove FROM seances GROUP BY Month(creation_date) LIMIT 0,7';
    $req = $db->query($sql);

    return $req;
  }

  public function monthSeancesCmd(){
    $db = $this->dbConnect();
    $sql = 'SELECT monthname(creation_date), sum(val1) seance_cash, sum(val2) cmd_cash, sum(val3) seance_depense, sum(val4) cmd_depense, sum(val5) seances_km, sum(val6) cmd_km from (select creation_date, val1, val2 , val3, val4, val5, val6
            from (select creation_date, prise val1, 0 val2 , depenses val3, 0 val4, km val5, 0 val6
            from seances) s1
            union
            (select command_date m, 0 val1, prise_command val2 , 0 val3 , cost_command val4, 0 val5, km_cmd val6
             from commands ) ) t
             group by month(creation_date)
             order by creation_date
             LIMIT 0,7';
   $req = $db->query($sql);

   return $req;

  }

  public function typeSession(){
    $db = $this->dbConnect();

//'SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client ORDER BY creation_date_seance DESC'
  //  SELECT count(s.id_seance) as nb, s.type, t.nom_type FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type LIMIT 0,8

    //$sql = 'SELECT count(*) as nb, type FROM seances GROUP BY type LIMIT 0,8';
    $sql = 'SELECT count(s.id_seance) as nb, s.type, t.nom_type, t.color_camembert, t.color_dash, t.color_boot FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type ORDER BY nb DESC';
    $req = $db->query($sql);

    return $req;
  }

  public function typeCashSession(){
    $db = $this->dbConnect();
    $sql = 'SELECT sum(prise) AS summaryType, color_boot, nom_type FROM `seances` INNER JOIN type_seance ON id_type_seance = type GROUP BY type ORDER BY summaryType DESC LIMIT 0,4';
    $req = $db->query($sql);

    return $req;
  }

  public function typeSeanceList()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT * FROM type_seance';
    $req = $db->query($sql);
    return $req;
  }

  public function deleteSeance($id_seance)
  {
      $db = $this->dbConnect();
      $request = $db->prepare('DELETE FROM seances WHERE id_seance = :id_seance');
      $request->execute(array('id_seance' => $id_seance));

      $request->closeCursor();
  }

  /*public function test(){
$db = $this->dbConnect();
    $sql = 'SELECT monthname(creation_date), sum(val1) DESPESAS, sum(val2) RECEITAS
   from (
     select creation_date, val1, val2
        from (select creation_date, prise val1, 0 val2
                 from seances) s1
              union
              (select command_date m, 0 val1, prise_command val2
                 from commands ) ) t
   group by month(creation_date)
   order by creation_date';
   $req = $db->query($sql);

   return $req;
 }*/




}


//select monthname(creation_date), sum(val1) seance_cash, sum(val2) cmd_cash, sum(val3) seance_depense, sum(val4) cmd_depense, sum(val5) seances_km, sum(val6) cmd_km from (   select creation_date, val1, val2 , val3, val4, val5, val6      from (select creation_date, prise val1, 0 val2 , depenses val3, 0 val4, km val5, 0 val6               from seances) s1              union             (select command_date m, 0 val1, prise_command val2 , 0 val3 , cost_command val4, 0 val5, km_cmd val6               from commands ) ) t  group by month(creation_date)  order by creation_date
