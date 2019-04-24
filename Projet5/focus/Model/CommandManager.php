<?php
namespace Model;

require_once("Model/Manager.php");

class CommandManager extends Manager
{
  public function getCommands()
  {

    //'SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC'

    $db = $this->dbConnect();
    //$req = $db->query('SELECT *, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances ORDER BY creation_date DESC');
    $req = $db->query('SELECT *,commands.command_date AS creation_date_command, DATE_FORMAT(command_date, \'%d/%m/%Y\') AS command_date_fr FROM commands INNER JOIN clients ON commands.client_id_cmd = clients.id_client INNER JOIN type_command ON type_command = id_type_command ORDER BY command_date ASC');

    return $req;
  }

}
