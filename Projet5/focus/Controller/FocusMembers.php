<?php
namespace Controller;
use Model\MemberManager;
use Exception;
class FocusMembers
{

  function newMember($nick, $pass, $email)
  {
    $memberManager = new MemberManager();

    $newMember = $memberManager->addMember($nick, $pass, $email);

    if ($newMember === false) {
        throw new Exception('Impossible d\'ajouter le membre !');
    }
  }

  function connect($login,$password)
  {
    $memberManager = new MemberManager();
    $connectMember = $memberManager->login($login,$password);

    if ($connectMember === false)
    {
        throw new Exception('Impossible de se connecter ! ');
    }
  }
}

 ?>
