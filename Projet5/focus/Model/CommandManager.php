<?php
namespace Model;

require_once("Model/Manager.php");

class CommandManager extends Manager
{
  public function getCommands()
  {
    $db = $this->dbConnect();
    $req = $db->query('SELECT *,commands.command_date AS creation_date_command, DATE_FORMAT(command_date, \'%d/%m/%Y\') AS command_date_fr FROM commands INNER JOIN clients ON commands.client_id_cmd = clients.id_client INNER JOIN type_command ON type_command = id_type_command ORDER BY command_date ASC');

    return $req;
  }

  public function totalsCmd()
  {

    $db = $this->dbConnect();
    $sql = 'SELECT SUM(prise_command) AS sumPriseCmd,SUM(cost_command) AS sumDepCmd FROM commands';
    $result = $db->query($sql);
    $sumCmd = $result->fetch();
    return $sumCmd;

  }

  public function monthCmd()
  {
    $db = $this->dbConnect();
    $sql = 'SELECT Month(command_date) as month, Count(*) as nb, SUM(prise_command) as cash, SUM(cost_command) as paied FROM commands GROUP BY Month(command_date) LIMIT 0,6';
    $req = $db->query($sql);

    return $req;
  }




}
