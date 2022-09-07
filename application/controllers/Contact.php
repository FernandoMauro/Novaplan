<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_contact');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_contact'] = $this->Model_common->all_page_contact();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();

		$data['testimonials'] = $this->Model_contact->all_testimonial();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$this->load->view('view_header',$data);
		$this->load->view('view_contact',$data);
		$this->load->view('view_footer',$data);
	}

	public function send_email() 
	{

		$this->load->model('admin/Model_email_received');
		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_contact'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

		    if($valid == 1)
		    {
				$msg = '
            		<h3>Informações do remetente</h3>
					<b>Nome: </b> '.$_POST['name'].'<br><br>
					<b>Telefone: </b> '.$_POST['phone'].'<br><br>
					<b>Email: </b> '.$_POST['email'].'<br><br>
					<b>Assunto: </b> '.$_POST['subject'].'<br><br>
					<b>Mensagem: </b> '.$_POST['message'].'
				';
            	$this->load->library('email');

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($data['setting']['receive_email_to']);
				$this->email->reply_to($_POST['email'], $_POST['name']);
				$this->email->cc($_POST['email'], $_POST['name']);

				$this->email->subject('Email pelo site');
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

				$current_date_time = date('d/m/Y H:i:s');

				$form_data = array(
					'received_name'  => $_POST['name'],
					'received_phone'   => $_POST['phone'],
					'received_email' => $_POST['email'],
					'received_subject' => $_POST['subject'],
					'received_message' => $_POST['message'],
					'received_date_time' => $current_date_time
	            );

				$this->Model_email_received->add($form_data);

		        $success = 'Obrigado por enviar o email. Entraremos em contato em breve.';
        		$this->session->set_flashdata('success',$success);

		    } 
		    else
		    {
        		$this->session->set_flashdata('error',$error);
		    }

			redirect(base_url().'contact');
            
        } else {
            
            redirect(base_url().'contact');
        }
	}
}