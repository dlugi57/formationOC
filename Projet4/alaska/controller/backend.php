<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');


function editComment($commentId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comment = $commentManager->getComment($commentId);

	if (!empty($_POST['author']) && !empty($_POST['comment'])) {
		$commentManager->editComment($commentId, $_POST['author'], $_POST['comment']);
		header('Location: index.php?action=post&id=' . $comment['post_id']);
	}

	require('view/backend/editCommentView.php');
}

function deleteComment($commentId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comment = $commentManager->removeComment($commentId);

  header('Location: index.php?action=post&id=' . $_GET['post_id']);


}


function createPost($postTitle, $postContent)
{


		$words = explode(' ', $postContent);
		$count = 55;
		$extraits = '';
		for ($i = 0; $i < $count && isset($words[$i]); $i++) {
				$extraits .= " ".$words[$i];
		}







    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $addedPost = $postManager->addPost($postTitle, $postContent, $extraits);

    if ($addedPost === false) {
        throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function editPost($postId){

  $postManager = new \OpenClassrooms\Blog\Model\PostManager();

  $post = $postManager->getPost($postId);

  if (!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {

		$postContent = $_POST['postContent'];
		$words = explode(' ', $postContent);
		$count = 55;
		$extraits = '';
		for ($i = 0; $i < $count && isset($words[$i]); $i++) {
				$extraits .= " ".$words[$i];
		}


    $postManager->updatePost($postId, $_POST['postTitle'], $_POST['postContent'], $extraits);
    header('Location: index.php?action=post&id=' . $post['id']);
  }

  require('view/backend/editPostView.php');
}


function deletePost($postId){
		$postManager = new \OpenClassrooms\Blog\Model\PostManager();

		$post = $postManager->removePost($postId);

		header('Location: index.php?action=listPosts');

}
/*
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

*/
