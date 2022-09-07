<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_email_received extends CI_Model 
{

    function show() {
        $sql = "SELECT * FROM tbl_email_received ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_email_received',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_email_received',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_email_received');
    }

    function get_email_received($id)
    {
        $sql = 'SELECT * FROM tbl_email_received WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function email_received_check($id)
    {
        $sql = 'SELECT * FROM tbl_email_received WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
    
}