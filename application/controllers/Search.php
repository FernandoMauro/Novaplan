<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_search');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
    }

	public function index() {

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_home'] = $this->Model_common->all_page_home();
		$data['page_search'] = $this->Model_common->all_page_search();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();

		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$data['search_string'] = NULL;
		$data['result'] = NULL;
		$data['total'] = NULL;
		$data['result_service'] = NULL;
		$data['total_service'] = NULL;
		$data['result_portfolio'] = NULL;
		$data['total_portfolio'] = NULL;

		$error2 = '';

		if(isset($_POST['search_string'])) {

			$this->form_validation->set_rules('search_string', 'Pesquisar', 'trim|required',
                        array('required' => 'Campo %s é obrigatório!'));

			if($this->form_validation->run() == FALSE) {
                $error2 .= validation_errors();
                $this->session->set_flashdata('error2',$error2);
            }else{
            	$data['search_string'] = $_POST['search_string'];
				$data['result'] = $this->Model_search->search($_POST['search_string']);
				$data['total'] = $this->Model_search->search_total($_POST['search_string']);
				$data['result_service'] = $this->Model_search->search_service($_POST['search_string']);
				$data['total_service'] = $this->Model_search->search_total_service($_POST['search_string']);
				$data['result_portfolio'] = $this->Model_search->search_portfolio($_POST['search_string']);
				$data['total_portfolio'] = $this->Model_search->search_total_portfolio($_POST['search_string']);	
            }

			$this->load->view('view_header',$data);
			$this->load->view('view_search',$data);
			$this->load->view('view_footer',$data);

		} else {
			//redirect(base_url());
			$this->load->view('view_header',$data);
			$this->load->view('view_search',$data);
			$this->load->view('view_footer',$data);

		}

	}
}