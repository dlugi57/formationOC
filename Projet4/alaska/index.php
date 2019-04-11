<?php
session_start();
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
                if (!empty($_POST['comment']) && trim($_POST['comment']) !== '') {
                    addComment($_GET['id'], $_GET['author'], $_POST['comment']);
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
        elseif ($_GET['action'] == 'deleteComment') {
          // code...
          if (isset($_GET['id']) && $_GET['id'] > 0) {
              deleteComment($_GET['id']);
          }
          else {
              throw new Exception("Aucun identifiant de commentaire envoyé");
          }
        }
        elseif ($_GET['action'] == 'reportComment') {
          // code...
          if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['report'])) {

              reportComment($_GET['id'], $_GET['report']);
          }
          else {
              throw new Exception("Aucun identifiant de commentaire envoyé report");
          }
        }
        elseif ($_GET['action'] == 'commentList') {
          commentList();
        }
        //reportComment
        //redirection to new member page
        elseif ($_GET['action'] == 'createMember') {
          createPage();
        }

        elseif ($_GET['action'] == 'newMember') {
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
        }
        elseif ($_GET['action'] == 'home') {
          homePage();
        }

// NEW POST
        elseif ($_GET['action']== 'newPost')
        {
          if (!empty($_POST['postTitle']) && !empty($_POST['postContent']) && trim($_POST['postTitle']) !== '' && trim($_POST['postContent']) !== '')
          {
            createPost($_POST['postTitle'],$_POST['postContent']);
          }else
          {
            throw new Exception("Essaie d'écrire quelque chose ! ");
          }
        }
        elseif ($_GET['action']== 'createPost') {
          require('view/backend/postViev.php');
          // code...
        }
//UPDATE POST
        elseif ($_GET['action'] == 'editPost')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
              editPost($_GET['id']);
          }
          else
          {
              throw new Exception("Aucun identifiant de chapitre envoyé");
          }
        }

        elseif ($_GET['action'] == 'deletePost')
        {
          // code...
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
              deletePost($_GET['id']);
          }
          else
          {
              throw new Exception("Aucun identifiant de commentaire envoyé");
          }
        }
// LOGIN PAGE
        elseif ($_GET['action'] == 'loginPage')
        {
          require('view/frontend/connectViev.php');
        }
// LOGIN
        elseif ($_GET['action'] == 'login')
        {
          if (!empty($_POST['login']) && !empty($_POST['pass']) && trim($_POST['login']) !== '' && trim($_POST['pass']) !== '')
          {
            connect($_POST['login'],$_POST['pass']);
          }else
          {
            throw new Exception("Les champs ne sont pas remplis !");
          }
        }

        elseif ($_GET['action'] == 'deconnect')
        {
          logout();
        }
    }
    else {
        homePage();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
  //  echo 'Erreur : ' . $e->getMessage();
    $errorMsg = $e->getMessage();
    require('view/frontend/errorView.php');


}
