<?php session_start(); ?>
<h1>strona glowna</h1>



<a href="index.php?action=listPosts">Retour à la liste des billets</a></br>
<a href="?action=createMember">Create</a></br>

<a href="?action=loginPage">Login</a></br>

<?php

if (isset($_SESSION['nick'])) {
  echo "<p>tutaj pokazuje session nick i admin </p>";
  echo $_SESSION['nick'];
}
if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] == 1) {
    echo "<p>tutaj pokazuje session nick i admin </p>";
    echo '<a href="?action=createPost">Create Post</a></br>';
    echo $_SESSION['admin'];
  }

}


?>

<p></p>
