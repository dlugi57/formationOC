<?php
// Chargement des classes
/*
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');
*/

//require "lib/autoload.php";

function homePage()
{
  $postManager = new \OpenClassrooms\Blog\Model\PostManager();
  $lastPost1 = $postManager->newestPost();
  //shows extraits of the post
  $words = explode(' ', $lastPost1['content']);
  $count = 55;
  $extrait = '';
  for ($i = 0; $i < $count && isset($words[$i]); $i++)
  {
      $extrait .= " ".$words[$i];
  }

  require('view/frontend/homeViev.php');
  require('view/frontend/header.php');

}

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    if ($posts === false)
    {
        throw new Exception('Impossible d\'afficher le contenue !');
    }else
    {
        require('view/frontend/listPostsView.php');
    }

}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    if ($post === false)
    {
        throw new Exception('Impossible d\'afficher le chapitre !');
    }
    else
    {
        require('view/frontend/postView.php');
    }
}


function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else
    {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function reportComment($commentId, $commentReport)
{
  $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
  $comment = $commentManager->alertComment($commentId, $commentReport);

  if ($comment === false)
  {
      throw new Exception('Impossible d\'signaler le commentaire !');
  }else
  {
      if ($_GET['post_id'] == 'commentList')
      {
        header('Location: index.php?action=commentList');
      }else
      {
        header('Location: index.php?action=post&id=' . $_GET['post_id']);
      }
  }
}


function createPage()
{
  require('view/frontend/createMemberViev.php');
}


function newMember($nick, $pass, $email)
{
  $memberManager = new \OpenClassrooms\Blog\Model\MemberManager();

  $newMember = $memberManager->addMember($nick, $pass, $email);

  if ($newMember === false) {
      throw new Exception('Impossible d\'ajouter le membre !');
  }
}

function connect($login,$password)
{
  $memberManager = new \OpenClassrooms\Blog\Model\MemberManager();
  $connectMember = $memberManager->login($login,$password);

  if ($connectMember === false)
  {
      throw new Exception('Impossible de se connecter ! ');
  }
}

function logout()
{
  session_start();
  // Suppression des variables de session et de la session
  $_SESSION = array();
  session_destroy();
  header("Location: index.php?action=home");
}
