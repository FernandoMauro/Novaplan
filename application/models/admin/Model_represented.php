<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_represented extends CI_Model 
{

	function get_auto_increment_id()
    {
        $sql = "SHOW TABLE STATUS LIKE 'tbl_represented'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function show() {
        $sql = "SELECT * FROM tbl_represented ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function add($data) {
        $this->db->insert('tbl_represented',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_represented',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_represented');
    }

    function get_represented($id)
    {
        $sql = 'SELECT * FROM tbl_represented WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function represented_check($id)
    {
        $sql = 'SELECT * FROM tbl_represented WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
   
}