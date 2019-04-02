<?php session_start(); ?>
<h1>strona glowna</h1>



<a href="index.php?action=listPosts">Retour à la liste des billets</a></br>
<a href="?action=createMember">Create</a>
<?= $_SESSION['nick'] ?>

<p></p>
