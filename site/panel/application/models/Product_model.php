<?php

class Product_model extends CI_Model
{
    /** Defining Table Name */
    public $tableName = "products";

    public function __construct()
    {
    	parent::__construct();
    }

    /**  The method of returning all rows' data that meets the requirements in the table */
    public function get_all($where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    /** The method of fetching row(s) from the specified limit in all rows that meet the requirements in the table */
    public function get_limited($where = array(), $limit = "",  $order = "id ASC")
    {
        return $this->db->where($where)->limit($limit)->order_by($order)->get($this->tableName)->result();
    }

    /**  The method to return the specific row's data that meets the requirements from the table */
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /**  The method for inserting data sent from form to the table */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    /**  The method to update the specific row's data that meets the requirements in the table */
    public function update($where=array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    /**  The method to delete the specific row that meets the requirements in the table */
    public function delete($where=array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}