<?php
session_start();
require "lib/autoload.php";
require('controller/frontend.php');
require('controller/backend.php');
try {
    if (isset($_GET['action'])):
//POST LIST
      switch ($_GET['action']):

        case 'listPosts':
            listPosts();
        break;
//POST
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else
            {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        break;
//ADD COMMENT
        case 'addComment':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['comment']) && trim($_POST['comment']) !== '') {
                    addComment($_GET['id'], $_GET['author'], $_POST['comment']);
                }
                else
                {
                    throw new Exception("Tous les champs ne sont pas remplis !");
                }
            }
            else
            {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        break;
//COMMENT MODIFICATION
        case 'editComment':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                editComment($_GET['id']);
            }
            else
            {
                throw new Exception("Aucun identifiant de commentaire envoyé");
            }
        break;
//DELETE COMMENT
        case 'deleteComment':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                deleteComment($_GET['id']);
            }
            else
            {
                throw new Exception("Aucun identifiant de commentaire envoyé");
            }
        break;
//REPORT COMMENT
        case 'reportComment':
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['report']))
            {
                reportComment($_GET['id'], $_GET['report']);
            }
            else
            {
                throw new Exception("Aucun identifiant de commentaire envoyé report");
            }
        break;
//COMMENT LIST
        case 'commentList':
            commentList();
        break;
// NEW MEMBER PAGE
        case 'createMember':
            createPage();
        break;
//NEW MEMBER
        case 'newMember':
            if (!empty($_POST['nick']) && !empty($_POST['email'])&& !empty($_POST['email_confirm'])&& !empty($_POST['password'])&& !empty($_POST['password_confirm']) && trim($_POST['nick']) !== '' && trim($_POST['email']) !== '' && trim($_POST['email_confirm']) !== '' && trim($_POST['password']) !== '' && trim($_POST['password_confirm']) !== ''):

                if ($_POST['email'] !== $_POST['email_confirm']):

                    throw new Exception("Email doit être identique !");

                endif;

                if ($_POST['password'] !== $_POST['password_confirm']):

                    throw new Exception("Le mot de passe doit être identique !");

                endif;

                newMember($_POST['nick'], $_POST['password'], $_POST['email']);

            else:

                throw new Exception("Tous les champs ne sont pas remplis !");

            endif;//checking if inputs are populate
        break;
//HOME
        case 'home':
            homePage();
        break;
// NEW POST
        case 'newPost':
            if (!empty($_POST['postTitle']) && !empty($_POST['postContent']) && trim($_POST['postTitle']) !== '' && trim($_POST['postContent']) !== '')
            {
              createPost($_POST['postTitle'],$_POST['postContent']);
            }else
            {
              throw new Exception("Essaie d'écrire quelque chose ! ");
            }
        break;
//CREATE POST
        case 'createPost':
            require('view/backend/postViev.php');
        break;
//UPDATE POST
        case 'editPost':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                editPost($_GET['id']);
            }
            else
            {
                throw new Exception("Aucun identifiant de chapitre envoyé");
            }
        break;
//DELETE POST
        case 'deletePost':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                deletePost($_GET['id']);
            }
            else
            {
                throw new Exception("Aucun identifiant de chapitre envoyé");
            }
        break;
// LOGIN PAGE
        case 'loginPage':
            require('view/frontend/connectViev.php');
        break;
//LOGIN
        case 'login':
            if (!empty($_POST['login']) && !empty($_POST['pass']) && trim($_POST['login']) !== '' && trim($_POST['pass']) !== '')
            {
              connect($_POST['login'],$_POST['pass']);
            }else
            {
              throw new Exception("Les champs ne sont pas remplis !");
            }
        break;
//DECONNECT
        case 'deconnect':
            logout();
        break;
//DEFAULT HOME
        default:
          homePage();
        break;
      endswitch;
    else :
        homePage();
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('view/frontend/errorView.php');
}
