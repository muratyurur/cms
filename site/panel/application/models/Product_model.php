<?php

class Product_model extends CI_Model
{
    /** Defining Table Name */
    public $tableName = "products";

    public function __construct()
    {
    	parent::__construct();
    }

    /**  The method to return all the data in the table */
    public function get_all()
    {
        return $this->db->get($this->tableName)->result();
    }

    /**  The Method for Adding Data Sent from Form to DataBase */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }
}