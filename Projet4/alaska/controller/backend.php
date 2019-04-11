<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');


function editComment($commentId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comment = $commentManager->getComment($commentId);

	if ($comment === false)
	{
			throw new Exception('Impossible de trouver un commentaire');
	}
	else
	{
		if (!empty($_POST['comment']))
		{
			$commentManager->editComment($commentId, $_POST['comment']);

			if ($commentManager === false)
			{
				throw new Exception('Impossible de modifier un commentaire');
			}else
			{
				if ($_GET['post_id'] == 'allComments')
				{
					header('Location: index.php?action=commentList');
				}else
				{
					header('Location: index.php?action=post&id=' . $comment['post_id']);
				}
			}
		}
	}
	require('view/backend/editCommentView.php');
}

function deleteComment($commentId)
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$comment = $commentManager->removeComment($commentId);

	if ($_GET['post_id'] == 'commentList') {
		header('Location: index.php?action=commentList');
	}else {
		header('Location: index.php?action=post&id=' . $_GET['post_id']);
	}

}

function commentList()
{
	$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();

	$showComments = $commentManager->getAllComments();

	require('view/backend/commentsListView.php');


}


function createPost($postTitle, $postContent)
{

		$postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $addedPost = $postManager->addPost($postTitle, $postContent);

    if ($addedPost === false)
		{
        throw new Exception('Impossible d\'ajouter le post !');
    }
    else
		{
        header('Location: index.php?action=listPosts');
    }

}

function editPost($postId)
{

  $postManager = new \OpenClassrooms\Blog\Model\PostManager();

  $post = $postManager->getPost($postId);

	if ($post === false)
	{
			throw new Exception('Impossible de trouver le post !');
	}
	else
	{
		if (!empty($_POST['postTitle']) && !empty($_POST['postContent'])  && trim($_POST['postTitle']) !== '' && trim($_POST['postContent']) !== '')
		{
			$postManager->updatePost($postId, $_POST['postTitle'], $_POST['postContent']);
			header('Location: index.php?action=post&id=' . $post['id']);
		}
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
