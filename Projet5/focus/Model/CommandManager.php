<?php
namespace Model;

//require_once("Model/Manager.php");

class CommandManager extends Manager
{
  public function getCommands()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT *,commands.command_date AS creation_date_command, DATE_FORMAT(command_date, \'%d/%m/%Y\') AS command_date_fr FROM commands INNER JOIN clients ON commands.client_id_cmd = clients.id_client INNER JOIN type_command ON type_command = id_type_command ORDER BY command_date ASC');

    return $req;
  }

  public function getClientCommand($clientId)
  {

    //'SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC'

    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->prepare('SELECT *,commands.command_date AS creation_date_command, DATE_FORMAT(command_date, \'%d/%m/%Y\') AS command_date_fr FROM commands INNER JOIN clients ON commands.client_id_cmd = clients.id_client INNER JOIN type_command ON type_command = id_type_command WHERE client_id_cmd = ? ORDER BY command_date ASC');
    $req->execute(array($clientId));

    return $req;
  }

  public function getCommand($commandId)
  {
      $db = $this->dbConnect();
      $request = $db->prepare('SELECT *,commands.command_date AS creation_date_command, DATE_FORMAT(command_date, \'%d/%m/%Y\') AS command_date_fr FROM commands INNER JOIN clients ON commands.client_id_cmd = clients.id_client INNER JOIN type_command ON type_command = id_type_command  WHERE id_command = ? ORDER BY command_date ASC');
      $request->execute(array($commandId));
      $command = $request->fetch();
      $request->closeCursor();

      return $command;
  }

  public function totalsCmd()
  {

    $db = $this->dbConnect();
    $sql = 'SELECT COUNT(*) AS totalCmd, SUM(prise_command) AS sumPriseCmd,SUM(cost_command) AS sumDepCmd FROM commands';
    $result = $db->query($sql);
    $sumCmd = $result->fetch();
    return $sumCmd;
  }

  public function monthCmd()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT Month(command_date) as month, Count(*) as nb, SUM(prise_command) as cash, SUM(cost_command) as paied FROM commands GROUP BY Month(command_date) LIMIT 0,7';
    $req = $db->query($sql);

    return $req;
  }

  public function typeCommandList()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT * FROM type_command';
    $req = $db->query($sql);
    return $req;
  }




}
