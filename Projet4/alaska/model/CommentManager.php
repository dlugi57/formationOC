<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getAllComments()
    {
        $db = $this->dbConnect();
        $allComments = $db->query('SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id ORDER BY comment_date DESC');
      //  $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, report FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        //$allComments->execute(array($postId));

        return $allComments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, report) VALUES(?, ?, ?, NOW(),0)');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT *, comments.id AS c_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %HH%i\') AS comment_date_fr FROM comments INNER JOIN membres ON comments.author = membres.id WHERE comments.id = ?');
        $request->execute(array($commentId));
        $comment = $request->fetch();
        $request->closeCursor();
        return $comment;
    }

    public function editComment($commentId, $comment)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET comment = :comment, comment_date = NOW() WHERE id = :id');
        $request->execute(array('comment' => $comment, 'id' => $commentId));
        return $request;
    }

    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM comments WHERE id = :id');
        $request->execute(array('id' => $commentId));
        echo "<p>usuneles komentarz</p>";
        $request->closeCursor();
        //return $request;
    }

    public function alertComment($commentId, $commentReport)
    {
        $db = $this->dbConnect();
        $report = $db->prepare('UPDATE comments SET report = :report WHERE id = :id');
        $report->execute(array('report' => $commentReport, 'id' => $commentId));
        return $report;
    }
}
