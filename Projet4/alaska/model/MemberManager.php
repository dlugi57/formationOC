<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class MemberManager extends Manager
{
    public function addMember($nick, $pass, $email)
    {
        $db = $this->dbConnect();
        $nickCheck = $db->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ?');
        $nickCheck->execute(array($nick));
        $nickCheckData = $nickCheck->fetch();
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            if($nickCheckData['COUNT(*)'] == 0)
            {
                $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
                $member = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, admin) VALUES(?, ?, ?, NOW(),0)');
                $newMember = $member->execute(array($nick, $pass_hache, $email));
                session_start();
                $_SESSION['nick'] = $nick;
                $_SESSION['admin'] = 0;
                header("Location: index.php?action=home&nick=".$_SESSION['nick']);
                
                return $newMember;
            }else
            {
                $errorMsg = "Identifiant déjà utilisé";
                header('Location: ?action=createMember&error='. urlencode($errorMsg) .'');
            }
        }else
        {
            $errorMsg = "Format d'adresse mail non valide";
            header('Location: ?action=createMember&error='. urlencode($errorMsg) .'');
        }
    }

    public function login($login, $password){

      $db = $this->dbConnect();
      $user = $db->prepare('SELECT admin, pass, id FROM membres WHERE pseudo = :pseudo');
      $user->execute(array(
          'pseudo' => $login));
      $connectMember = $user->fetch();

      $isPasswordCorrect = password_verify($password, $connectMember['pass']);

      if (!$connectMember)
      {
          $errorMsg = "Mauvais identifiant ou mot de passe !";
          header('Location: ?action=loginPage&error='. urlencode($errorMsg) .'');
      }
      else
      {
          if ($isPasswordCorrect)
          {
              session_start();
              $_SESSION['admin'] = $connectMember['admin'];
              $_SESSION['nick'] = $login;
              $_SESSION['userId'] = $connectMember['id'];

              header("Location: index.php?action=home&nick=".$_SESSION['nick']);
          }
          else
          {
              $errorMsg = "Mauvais identifiant ou mot de passe !";
              header('Location: ?action=loginPage&error='. urlencode($errorMsg) .'');
          }
      }
    }
}
