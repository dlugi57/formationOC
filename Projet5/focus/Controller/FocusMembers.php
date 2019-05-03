<?php
namespace Controller;
use Model\MemberManager;
use Exception;
class FocusMembers
{

  public function newMember(){
    if (!empty($_POST['nick']) && !empty($_POST['email'])&& !empty($_POST['email_confirm'])&& !empty($_POST['password'])&& !empty($_POST['password_confirm']) && trim($_POST['nick']) !== '' && trim($_POST['email']) !== '' && trim($_POST['email_confirm']) !== '' && trim($_POST['password']) !== '' && trim($_POST['password_confirm']) !== ''):

        if ($_POST['email'] !== $_POST['email_confirm']):

            throw new Exception("Email doit être identique !");

        endif;

        if ($_POST['password'] !== $_POST['password_confirm']):

            throw new Exception("Le mot de passe doit être identique !");

        endif;

        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)):

            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $memberManager = new MemberManager();
            $newMember = $memberManager->addMember($_POST['nick'], $pass_hache, $_POST['email']);

        else:

            throw new Exception("Format d'adresse mail non valide");

        endif;

    else:

        throw new Exception("Tous les champs ne sont pas remplis !");

    endif;

    if ($newMember === false):

        throw new Exception('Impossible d\'ajouter le membre !');

    elseif ($newMember === "nickExist"):

      $errorMsg = "Identifiant déjà utilisé";
      header('Location: ?action=createMember&error='. urlencode($errorMsg) .'');

    else:

      header("Location: index.php?action=acceptMember&nick=".$_SESSION['userId']);

    endif;
  }

  public function connect()
  {

    if (!empty($_POST['login']) && !empty($_POST['pass']) && trim($_POST['login']) !== '' && trim($_POST['pass']) !== ''):

      $memberManager = new MemberManager();
      $connectMember = $memberManager->login($_POST['login'],$_POST['pass']);

    else:

      throw new Exception("Les champs ne sont pas remplis !");

    endif;

    $isPasswordCorrect = password_verify($_POST['pass'], $connectMember['pass']);

    if (!$connectMember):

        $errorMsg = "Mauvais identifiant ou mot de passe !";
        header('Location: ?action=loginPage&error='. urlencode($errorMsg) .'');

    else:

        if ($isPasswordCorrect):

            session_start();
            $_SESSION['admin'] = $connectMember['admin'];
            $_SESSION['nick'] = $_POST['login'];
            $_SESSION['userId'] = $connectMember['id'];

            if($connectMember['admin'] == 0):

              header("Location: index.php?action=acceptMember&nick=".$_SESSION['nick']);

            else:

              header("Location: index.php?action=dashboard&nick=".$_SESSION['nick']);

            endif;

        else:

            $errorMsg = "Mauvais identifiant ou mot de passe !";
            header('Location: ?action=loginPage&error='. urlencode($errorMsg) .'');

        endif;

    endif;

    if ($connectMember === false):

        throw new Exception('Impossible de se connecter ! ');

    endif;
  }

  function logout()
  {
    session_start();
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?action=home");
  }

  public function membersList()
  {
    $memberManager = new MemberManager();
    $members = $memberManager->getMembers();
    if ($members === false):

        throw new Exception('Impossible d\'afficher le contenue de members list !');

    else:

        require('View/backend/membersList.php');

    endif;
  }
}

 ?>
