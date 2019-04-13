<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '');
      //$db = new \PDO('mysql:host=localhost;dbname=lingsoft_alaska;charset=utf8', 'lingsoft_wpiotr', 'Spt!T]94j6');

        return $db;
    }
}
