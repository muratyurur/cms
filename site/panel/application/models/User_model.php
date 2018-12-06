<?php

class User_model extends CI_Model
{
    /** Defining Table Name */
    public $tableName = "users";

    public function __construct()
    {
    	parent::__construct();
    }

    /**  The method of returning all row's data that meets the requirements in the table */
    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    /**  The Method to Returning the Specific Row's Data that Meets the Requirements from the Table */
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /**  The Method for Inserting Data Sent from Form to the Table */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    /**  The Method to Updating the Specific Row's Data that Meets the Requirements in the Table */
    public function update($where=array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    /**  The Method to Deleting the Specific Row that Meets the Requirements in the Table */
    public function delete($where=array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}