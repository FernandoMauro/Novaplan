<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Represented extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_represented');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_represented'] = $this->Model_common->all_page_represented();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();

		$data['represented'] = $this->Model_represented->all_represented();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view('view_header',$data);
		$this->load->view('view_represented',$data);
		$this->load->view('view_footer',$data);
	}
}