<?php

namespace Model;

require_once("Model/Manager.php");

class ClientManager extends Manager
{
    public function getClients()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients ORDER BY creation_date DESC');

        return $req;
    }

    public function countClients()
    {
      $db = $this->dbConnect();
      $sql = 'SELECT COUNT(*) AS nb FROM clients';
      $result = $db->query($sql);
      $countClients = $result->fetch();
      return $countClients;

    }

    public function monthClients(){
      $db = $this->dbConnect();
      $sql = 'SELECT Month(creation_date) as month, Count(*) as nb FROM clients GROUP BY Month(creation_date) LIMIT 0,6';
      $req = $db->query($sql);

      return $req;
    }

    public function contactBy(){
      $db = $this->dbConnect();
      $sql = 'SELECT count(*) as nb, contact_by FROM clients GROUP BY contact_by LIMIT 0,8';
      $req = $db->query($sql);

      return $req;
    }


/*
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %HH%i\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $addPost = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $addedPost = $addPost->execute(array($postTitle, $postContent));

        return $addedPost;
    }

    public function updatePost($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('UPDATE posts SET title = :title, content = :content, creation_date = NOW() WHERE id = :id');
        $request->execute(array('title' => $postTitle, 'content' => $postContent, 'id' => $postId));

        return $request;
    }

    public function removePost($postId){
        $db = $this->dbConnect();
        $request = $db->prepare('DELETE FROM posts WHERE id = :id');
        $request->execute(array('id' => $postId));

        $delete_comment = $db->prepare('DELETE FROM comments WHERE post_id = :post_id');
        $delete_comment->execute(array('post_id' => $postId));

        $request->closeCursor();
    }

    public function newestPost(){

      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content FROM posts ORDER BY id DESC LIMIT 1;');
      $lastPost = $req->fetch();

      return $lastPost;
    }

    */
}
