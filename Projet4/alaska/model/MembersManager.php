<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class MemberManager extends Manager
{
  /*  public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }*/

    public function addMember($nick, $pass, $email)
    {
        $db = $this->dbConnect();
        $member = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');
        $newMember = $member->execute(array($nick, $pass, $email));

        return $newMember;
    }

  /*  public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $request->execute(array($commentId));
        $comment = $request->fetch();
        $request->closeCursor();
        return $comment;
    }

    public function editComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE comments SET author = :author, comment = :comment, comment_date = NOW() WHERE id = :id');
        $request->execute(array('author' => $author, 'comment' => $comment, 'id' => $commentId));
        return $request;
    }*/
}
