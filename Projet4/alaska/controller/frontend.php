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

function editComment($commentId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comment = $commentManager->getComment($commentId);

	if (!empty($_POST['author']) && !empty($_POST['comment'])) {
		$commentManager->editComment($commentId, $_POST['author'], $_POST['comment']);
		header('Location: index.php?action=post&id=' . $comment['post_id']);
	}

	require('view/frontend/editView.php');
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
