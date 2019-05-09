<?php

namespace Model;

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=focus;charset=utf8', 'root', '');

        //$db = new \PDO('mysql:host=localhost;dbname=lingsoft_crm_piotr;charset=utf8', 'lingsoft_wpiotr', 'Spt!T]94j6');
        return $db;
    }
}
