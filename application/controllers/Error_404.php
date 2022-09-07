<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();

		$this->load->view('view_error_404',$data);
	}
}