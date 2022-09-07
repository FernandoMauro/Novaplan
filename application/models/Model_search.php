<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_search extends CI_Model 
{
    public function search($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_news t1
                JOIN tbl_category t2
                ON t1.category_id = t2.category_id
                WHERE t1.news_title like ? OR t1.news_content like ? OR t2.category_name like ?
                ORDER BY t1.news_id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->result_array();
    }

    public function search_total($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_news t1
                JOIN tbl_category t2
                ON t1.category_id = t2.category_id
                WHERE t1.news_title like ? OR t1.news_content like ? OR t2.category_name like ?
                ORDER BY t1.news_id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->num_rows();
    }

    public function search_service($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_service t1
                WHERE t1.name like ? OR t1.description like ? OR t1.short_description like ?
                ORDER BY t1.id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->result_array();
    }

    public function search_total_service($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_service t1
                WHERE t1.name like ? OR t1.description like ? OR t1.short_description like ?
                ORDER BY t1.id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->num_rows();
    }

    public function search_portfolio($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_portfolio t1
                WHERE t1.name like ? OR t1.content like ? OR t1.short_content like ?
                ORDER BY t1.id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->result_array();
    }

    public function search_total_portfolio($search_string)
    {
        $search_string = '%' . $search_string . '%';
        $sql = "SELECT * 
                FROM tbl_portfolio t1
                WHERE t1.name like ? OR t1.content like ? OR t1.short_content like ?
                ORDER BY t1.id DESC";
        $query = $this->db->query($sql,array($search_string, $search_string, $search_string));
        return $query->num_rows();
    }
    
}