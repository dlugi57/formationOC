<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class MemberManager extends Manager
{
  /*  public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }*/

    public function addMember($nick, $pass, $email)
    {
        $db = $this->dbConnect();

        $nickCheck = $db->prepare('SELECT COUNT(*) FROM membres WHERE pseudo = ?');
        $nickCheck->execute(array($nick));
        $nickCheckData = $nickCheck->fetch();
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if($nickCheckData['COUNT(*)'] == 0){


            $pass_hache = password_hash($pass, PASSWORD_DEFAULT);
            $member = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, admin) VALUES(?, ?, ?, NOW(),0)');
            $newMember = $member->execute(array($nick, $pass_hache, $email));
            session_start();
            $_SESSION['nick'] = $nick;
            $_SESSION['admin'] = 0;
            header("Location: index.php?action=home&nick=".$_SESSION['nick']);
            return $newMember;

          }else {
            $errorMsg = "Identifiant déjà utilisé";
            header('Location: ?action=createMember&error='. urlencode($errorMsg) .'');
          }
        }else {
          $errorMsg = "Format d'adresse mail non valide";
          header('Location: ?action=createMember&error='. urlencode($errorMsg) .'');
        }
    }

    public function login($login, $password){

      $db = $this->dbConnect();
      //  Récupération de l'utilisateur et de son pass hashé
      $user = $db->prepare('SELECT admin, pass, id FROM membres WHERE pseudo = :pseudo');
      $user->execute(array(
          'pseudo' => $login));
      $connectMember = $user->fetch();

      // Comparaison du pass envoyé via le formulaire avec la base
      $isPasswordCorrect = password_verify($password, $connectMember['pass']);

      if (!$connectMember)
      {
          echo '<p>Mauvais identifiant ou mot de passe nie ma wyniku bazy  !</p>';
      }
      else
      {
          if ($isPasswordCorrect) {
              session_start();
              $_SESSION['admin'] = $connectMember['admin'];
              $_SESSION['nick'] = $login;
              $_SESSION['userId'] = $connectMember['id'];
              echo 'Vous êtes connecté !';
              header("Location: index.php?action=home&nick=".$_SESSION['nick']);

              //return $connectMember;
          }
          else {
              echo '<p>Mauvais identifiant ou mot de passe sprawdzil poprawnosc !</p>';
          }
      }
    }



  /*  public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $request->execute(array($commentId));
        $comment = $request->fetch();
        $request->closeCursor();
        return $comment;
    }

    public function editComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET author = :author, comment = :comment, comment_date = NOW() WHERE id = :id');
        $request->execute(array('author' => $author, 'comment' => $comment, 'id' => $commentId));
        return $request;
    }*/
}
