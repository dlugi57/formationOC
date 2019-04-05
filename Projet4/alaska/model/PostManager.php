<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        //$req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        $req = $db->query('SELECT id, title, content, extraits, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, extraits, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($postTitle, $postContent, $extraits)
    {
        $db = $this->dbConnect();
        $addPost = $db->prepare('INSERT INTO posts(title, content, extraits, creation_date) VALUES(?, ?, ?, NOW())');
        $addedPost = $addPost->execute(array($postTitle, $postContent, $extraits));

        return $addedPost;
    }

    public function updatePost($postId, $postTitle, $postContent, $extraits)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = :title, content = :content, extraits = :extraits, creation_date = NOW() WHERE id = :id');
        $request->execute(array('title' => $postTitle, 'content' => $postContent, 'extraits' => $extraits, 'id' => $postId));
        return $request;
    }

    public function removePost($postId){
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = :id');
        $request->execute(array('id' => $postId));
        echo "<p>usuneles komentarz</p>";
        $request->closeCursor();
    }

    public function newestPost(){

      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, extraits FROM posts ORDER BY id DESC LIMIT 1;');
      $lastPost = $req->fetch();
      return $lastPost;

      //SELECT parentid FROM table2 WHERE id = LAST_INSERT_ID();
    }
}
