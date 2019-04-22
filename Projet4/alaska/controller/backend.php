<?php
namespace OpenClassrooms\Blog\Controller;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');
class Backend
{
	public function editComment($commentId)
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

	public function deleteComment($commentId)
	{
		$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
		$comment = $commentManager->removeComment($commentId);

		if ($comment === false)
		{
				throw new Exception('Impossible de supprimer le commentaire !');
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

	public function commentList()
	{
		$commentManager = new \OpenClassrooms\Blog\Model\CommentManager();
		$showComments = $commentManager->getAllComments();

		if ($showComments === false)
		{
				throw new Exception('Impossible d\'afficher les commentaires !');
		}else
		{
				require('view/backend/commentsListView.php');
		}
	}

	public function createPost($postTitle, $postContent)
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

	public function editPost($postId)
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
				if ($postManager === false)
				{
					throw new Exception('Impossible de modifier le post !');
				}else
				{
					header('Location: index.php?action=post&id=' . $post['id']);
				}
			}
		}
		require('view/backend/editPostView.php');
	}

	public function deletePost($postId)
	{
			$postManager = new \OpenClassrooms\Blog\Model\PostManager();
			$post = $postManager->removePost($postId);

			if ($post === false) {
					throw new Exception('Impossible de supprimer le post !');
			}else
			{
					header('Location: index.php?action=listPosts');
			}

	}
}
