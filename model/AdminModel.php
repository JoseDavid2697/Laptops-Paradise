<?php

class AdminModel
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton(); //get the database instance

    } //constructor

    public function signIn($username,$password)
    {
        $query = $this->db->prepare('call sp_signIn("'.$username.'","'.$password.'")');
        $query->execute();
        $data = $query->fetchAll();
        $query->CloseCursor();
        return $data;
    }

    
}//fin de clase