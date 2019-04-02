<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');




function createPost($postTitle, $postContent)
{
    $postManager = new \OpenClassrooms\Blog\Model\PostManager();

    $addedPost = $postManager->addPost($postTitle, $postContent);

    if ($addedPost === false) {
        throw new Exception('Impossible d\'ajouter le post !');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
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
