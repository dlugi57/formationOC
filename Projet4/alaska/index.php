<?php
session_start();
require('controller/Frontend.php');
require('controller/Backend.php');
$backendController = new \OpenClassrooms\Blog\Controller\Backend();
$frontendController = new \OpenClassrooms\Blog\Controller\Frontend();
//acces only for admin user made some conditions
if (isset($_SESSION['admin'])) {
  $admin = $_SESSION['admin'];
}

try {
    if (isset($_GET['action'])):
//POST LIST
      switch ($_GET['action']):

        case 'listPosts':
            $postList = $frontendController->listPosts();
        break;
//POST
        case 'post':
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $postPage = $frontendController->post();
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
                if (!empty($_POST['comment']) && trim($_POST['comment']) !== '')
                {
                    $commentAdd = $frontendController->addComment($_GET['id'], $_GET['author'], $_POST['comment']);
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
            if (isset($admin) && $admin == 1)
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $commentEdit = $backendController->editComment($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de commentaire envoyé");
                }
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
//DELETE COMMENT
        case 'deleteComment':
            if (isset($admin) && $admin == 1)
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $commentDelete = $backendController->deleteComment($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de commentaire envoyé");
                }
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
//REPORT COMMENT
        case 'reportComment':
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['report']))
            {
                $commentReport = $frontendController->reportComment($_GET['id'], $_GET['report']);
            }
            else
            {
                throw new Exception("Aucun identifiant de commentaire envoyé report");
            }
        break;
//COMMENT LIST
        case 'commentList':
            if (isset($admin) && $admin == 1)
            {
                $commentList = $backendController->commentList();
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
// NEW MEMBER PAGE
        case 'createMember':
            $memberPage = $frontendController->createPage();
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

                $memberNew = $frontendController->newMember($_POST['nick'], $_POST['password'], $_POST['email']);

            else:

                throw new Exception("Tous les champs ne sont pas remplis !");

            endif;
        break;
//HOME
        case 'home':
            $pageHome = $frontendController->homePage();
        break;
// NEW POST
        case 'newPost':
            if (isset($admin) && $admin == 1)
            {
                if (!empty($_POST['postTitle']) && !empty($_POST['postContent']) && trim($_POST['postTitle']) !== '' && trim($_POST['postContent']) !== '')
                {
                  $postCreate = $backendController->createPost($_POST['postTitle'],$_POST['postContent']);
                }else
                {
                  throw new Exception("Essaie d'écrire quelque chose ! ");
                }
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
//CREATE POST
        case 'createPost':
            if (isset($admin) && $admin == 1)
            {
                  require('view/backend/postViev.php');
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
//UPDATE POST
        case 'editPost':
            if (isset($admin) && $admin == 1)
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $postEdit = $backendController->editPost($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé");
                }
            }else
            {
                throw new Exception("Accès interdit au public");
            }
        break;
//DELETE POST
        case 'deletePost':
            if (isset($admin) && $admin == 1)
            {
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $postDelete = $backendController->deletePost($_GET['id']);
                }
                else
                {
                    throw new Exception("Aucun identifiant de chapitre envoyé");
                }
            }else
            {
                throw new Exception("Accès interdit au public");
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
              $connect = $frontendController->connect($_POST['login'],$_POST['pass']);
            }else
            {
              throw new Exception("Les champs ne sont pas remplis !");
            }
        break;
//DECONNECT
        case 'deconnect':
            $logout = $frontendController->logout();

        break;
//DEFAULT HOME
        default:
          $pageHome = $frontendController->homePage();
        break;
      endswitch;
    else :
        $pageHome = $frontendController->homePage();
    endif;
}
catch(Exception $e)
{
    $errorMsg = $e->getMessage();
    require('view/frontend/errorView.php');
}
