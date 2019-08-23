<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ItemsModel
 *
 * @author Jose David
 */

class ItemsModel
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton(); //get the database instance

    } //constructor

    /*Items control methods*/

    public function getItems()
    {
        $query = $this->db->prepare('call sp_get_all_items()');
        $query->execute();
        $data = $query->fetchAll();
        $query->CloseCursor();
        return $data;
    }

    public function insertItem($item_name,$price,$description,$image,$category){
        $query = $this->db->prepare('call sp_insert_item("'.$item_name.'","'.$price.'","'.$description.'","'.$image.'","'.$category.'")');
        $query->execute();
        $data = $query->fetch();
        $query->CloseCursor();
        return $data;
    }

    
}//fin de clase
