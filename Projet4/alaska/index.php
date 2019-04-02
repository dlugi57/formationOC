
<?php
require('controller/frontend.php');
require('controller/backend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception("Tous les champs ne sont pas remplis !");
                }
            }
            else {
                throw new Exception("Aucun identifiant de billet envoyé");
            }
        }
        elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                editComment($_GET['id']);
            }
            else {
                throw new Exception("Aucun identifiant de commentaire envoyé");
            }
        }
        //redirection to new member page
        elseif ($_GET['action'] == 'createMember') {
          createPage();
        }

        elseif ($_GET['action'] == 'newMember') {
          if (!empty($_POST['nick']) && !empty($_POST['email'])&& !empty($_POST['email_confirm'])&& !empty($_POST['password'])&& !empty($_POST['password_confirm'])) {
            if ($_POST['email'] !== $_POST['email_confirm']) {
              throw new Exception("wrong email !");
            }
            if ($_POST['password'] !== $_POST['password_confirm']) {
              throw new Exception("wrong pass !");
            }
            newMember($_POST['nick'], $_POST['password'], $_POST['email']);
              //addComment($_GET['id'], $_POST['author'], $_POST['comment']);
          }
          else {
              throw new Exception("Tous les champs ne sont pas remplis !");
          }
        }
        elseif ($_GET['action'] == 'home') {
          homePage();
        }
        elseif ($_GET['action']== 'newPost') {
          if (!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {
            createPost($_POST['postTitle'],$_POST['postContent']);
            // code...
          }
        }
        elseif ($_GET['action']== 'createPost') {
          require('view/backend/postViev.php');
          // code...
        }
        elseif ($_GET['action'] == 'loginPage') {
          require('view/frontend/connectViev.php');
        }
        elseif ($_GET['action'] == 'login') {
          if (!empty($_POST['login']) && !empty($_POST['pass'])) {
            connect($_POST['login'],$_POST['pass']);
            // code...
          }
        }
    }
    else {
        homePage();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
/*catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/frontend/errorView.php');
}*/
