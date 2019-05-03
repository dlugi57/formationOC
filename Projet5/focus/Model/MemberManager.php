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
}
