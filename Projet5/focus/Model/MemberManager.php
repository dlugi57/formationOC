<?php

namespace Model;

class MemberManager extends Manager
{
    public function addMember($nick, $pass, $email)
    {
        $db = $this->dbConnect();
        $nickCheck = $db->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ?');
        $nickCheck->execute(array($nick));
        $nickCheckData = $nickCheck->fetch();

            if($nickCheckData['COUNT(*)'] == 0):

                $member = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, admin) VALUES(?, ?, ?, NOW(),0)');
                $newMember = $member->execute(array($nick, $pass, $email));
                session_start();
                $_SESSION['nick'] = $nick;
                $_SESSION['admin'] = 0;
                $last_id = $db->lastInsertId();
                $_SESSION['userId'] = $last_id;

                return $newMember;

            else:

              return "nickExist";

            endif;

    }

    public function login($login, $password){

      $db = $this->dbConnect();
      $user = $db->prepare('SELECT admin, pass, id FROM membres WHERE pseudo = :pseudo');
      $user->execute(array('pseudo' => $login));
      $connectMember = $user->fetch();

      return $connectMember;

    }

    public function getMembers()
    {
      $db = $this->dbConnect();
      $req = $db->query('SELECT *, DATE_FORMAT(date_inscription, \'%d/%m/%Y\') AS inscription_date_fr FROM membres  ORDER BY date_inscription DESC');

      return $req;
    }

    public function changeStatus($memberId, $memberStatus)
    {
        $db = $this->dbConnect();
        $status = $db->prepare('UPDATE membres SET admin = :admin WHERE id = :id');
        $status->execute(array('admin' => $memberStatus, 'id' => $memberId));

        return $status;
    }

    public function deleteMember($id)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM membres WHERE id = :id');
        $request->execute(array('id' => $id));

        $request->closeCursor();
    }    
}
