<?php

namespace Model;

//require_once("Model/Manager.php");

class ClientManager extends Manager
{
    public function getClients()
    {
        $db = $this->dbConnect();

        //$req = $db->query('SELECT *,seances.creation_date AS creation_date_seance, DATE_FORMAT(seance_date, \'%d/%m/%Y\') AS seance_date_fr FROM seances INNER JOIN clients ON seances.clients_id = clients.id_client INNER JOIN type_seance ON type = id_type_seance ORDER BY seance_date ASC');

        $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients INNER JOIN contact_by ON contact_by = id_contact_by ORDER BY creation_date DESC');
        //  $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients ORDER BY creation_date DESC');

        return $req;
    }

    public function getClient($clientId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * , DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM clients INNER JOIN contact_by ON contact_by = id_contact_by WHERE id_client = ?');
        $req->execute(array($clientId));
        $post = $req->fetch();

        return $post;
    }


    public function newClient()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO clients(name, tel, email, adress, city, post_code, contact_by, description, creation_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, NOW())');
        $addedClient = $req->execute(array($name, $tel, $email, $adress, $city, $post, $contact, $description));

        return $addedClient;
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
      $sql = 'SELECT Month(creation_date) as month, Count(*) as nb FROM clients GROUP BY Month(creation_date) LIMIT 0,7';
      $req = $db->query($sql);

      return $req;
    }

    public function contactBy(){
      $db = $this->dbConnect();
      //$sql = 'SELECT count(s.id_seance) as nb, s.type, t.nom_type, t.color_camembert, t.color_dash, t.color_boot FROM seances s INNER JOIN type_seance t ON s.type = t.id_type_seance GROUP BY t.nom_type';
      $sql = 'SELECT count(c.id_client) as nb, c.contact_by, b.nom_contact_by, b.color_camembert, b.color_dash, b.color_boot FROM clients c INNER JOIN contact_by b ON c.contact_by = b.id_contact_by GROUP BY b.nom_contact_by ORDER BY nb DESC';
      //$sql = 'SELECT count(*) as nb, contact_by FROM clients GROUP BY contact_by LIMIT 0,8';
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
