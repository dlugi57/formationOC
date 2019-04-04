<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');

function homePage(){
  
  require('view/frontend/homeViev.php');
}

function listPosts()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function reportComment($commentId, $commentReport)
{
  $commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

  $comment = $commentManager->alertComment($commentId, $commentReport);

  header('Location: index.php?action=post&id=' . $_GET['post_id']);
}








function createPage(){
  require('view/frontend/createMemberViev.php');
}

function newMember($nick, $pass, $email){

  $memberManager = new \OpenClassrooms\Blog\Model\MemberManager();

  $newMember = $memberManager->addMember($nick, $pass, $email);

  if ($newMember === false) {
      throw new Exception('Impossible d\'ajouter le commentaire !');
  }
  else {
      echo "<p>udalo sie</p> ";
  }
}

function connect($login,$password){
  $memberManager = new \OpenClassrooms\Blog\Model\MemberManager();

  $connectMember = $memberManager->login($login,$password);

  /*if ($connectMember === false) {
      echo "<p>nie udalo sie juz w frontend</p> ";
  }
  else {
      echo "<p>udalo sie zalogowac</p> ";
  }*/
}

function logout(){
  session_start();
  // Suppression des variables de session et de la session
  $_SESSION = array();
  session_destroy();
  header("Location: index.php?action=home");
}
