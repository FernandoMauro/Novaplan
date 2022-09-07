<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_service');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
	$this->load->model('Model_marketing');
    }

	public function index($view=0)
	{
		if($view == 1){
	            $view_data = array('view_ip' => NULL);
	            $this->Model_marketing->add_views($view_data);
	            $data['marketing_views'] = $this->Model_marketing->get_total_views();
        	}

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_service'] = $this->Model_common->all_page_service();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();

		$data['services'] = $this->Model_service->all_service();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view('view_header',$data);
		$this->load->view('view_service',$data);
		$this->load->view('view_footer',$data);
	}

	public function view($id=0)
	{
		if( !isset($id) || !is_numeric($id) ) {
			redirect(base_url());
		}

		$tot = $this->Model_service->service_check($id);
		if(!$tot) {
			redirect(base_url());
		}

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_service'] = $this->Model_common->all_page_service();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();

		$data['services'] = $this->Model_service->all_service();
		$data['service'] = $this->Model_service->service_detail($id);
		$data['all_menu_home'] = $this->Model_home->all_menu_home();
		$data['service_photo'] = $this->Model_service->get_service_photo($id);

		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$data['id'] = $id;

		$this->load->view('view_header',$data);
		$this->load->view('view_service_detail',$data);
		$this->load->view('view_footer');
	}

	public function send_email() 
	{

		$this->load->model('admin/Model_email_received');
		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_service'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1)
		    {
				$msg = '
            		<h3>Informação do Remetente</h3>
					<b>Nome: </b> '.$_POST['name'].'<br><br>
					<b>Telefone: </b> '.$_POST['phone'].'<br><br>
					<b>Email: </b> '.$_POST['email'].'<br><br>
					<b>Nome do Produto: </b> '.$_POST['service'].'<br><br>
					<b>Mensagem:: </b> '.$_POST['message'].'
				';
            	$this->load->library('email');

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($data['setting']['receive_email_to']);

				$this->email->subject('Email da página de produtos');
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

				$current_date_time = date('d/m/Y H:i:s');

				$form_data = array(
					'received_name'  => $_POST['name'],
					'received_phone'   => $_POST['phone'],
					'received_email' => $_POST['email'],
					'received_subject' => $_POST['service'],
					'received_message' => $_POST['message'],
					'received_date_time' => $current_date_time
	            );

	            $this->Model_email_received->add($form_data);

		        $success = 'Obrigado por enviar o email. Responderemos em breve.';
        		$this->session->set_flashdata('success',$success);

		    } 
		    else
		    {
        		$this->session->set_flashdata('error',$error);
		    }

			redirect($this->agent->referrer());
            
        } else {
            
            redirect($this->agent->referrer());
        }
	}
}