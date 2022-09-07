<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_marketing extends CI_Model 
{
    public function get_total_views()
    {
        $sql = 'SELECT * FROM tbl_marketing';
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function add_views($data) {
        $this->db->insert('tbl_marketing',$data);
        return $this->db->insert_id();
    }

}