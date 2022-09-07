<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_email_sent extends CI_Model 
{

    function show() {
        $sql = "SELECT * FROM tbl_email_sent ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function add($data) {
        $this->db->insert('tbl_email_sent',$data);
        return $this->db->insert_id();
    }

    function update($id,$data) {
        $this->db->where('id',$id);
        $this->db->update('tbl_email_sent',$data);
    }

    function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_email_sent');
    }

    function get_email_sent($id)
    {
        $sql = 'SELECT * FROM tbl_email_sent WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }

    function email_sent_check($id)
    {
        $sql = 'SELECT * FROM tbl_email_sent WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
    
}