<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_represented extends CI_Model 
{
    public function all_represented()
    {
        $query = $this->db->query("SELECT * FROM tbl_represented ORDER BY id ASC");
        return $query->result_array();
    }

    public function represented_check($id) {
        $sql = 'SELECT * FROM tbl_represented WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->num_rows();
    }

    public function represented_detail($id) {
        $sql = 'SELECT * FROM tbl_represented WHERE id=?';
        $query = $this->db->query($sql,array($id));
        return $query->first_row('array');
    }
}