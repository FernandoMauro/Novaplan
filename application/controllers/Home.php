<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_common');
		$this->load->model('Model_home');
		$this->load->model('Model_portfolio');
		$this->load->helper('captcha');
	}

	public function index()
	{
		$data['setting'] = $this->Model_common->all_setting();
		$data['page_home'] = $this->Model_common->all_page_home();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_news_category'] = $this->Model_common->all_news_category();

		$data['sliders'] = $this->Model_home->all_slider();
		$data['services'] = $this->Model_home->all_service();
		$data['features'] = $this->Model_home->all_feature();
		$data['why_choose'] = $this->Model_home->all_why_choose();
		$data['team_members'] = $this->Model_home->all_team_member();
		$data['testimonials'] = $this->Model_home->all_testimonial();		
		$data['clients'] = $this->Model_home->all_client();
		$data['pricing_table'] = $this->Model_home->all_pricing_table();
		$data['home_faq'] = $this->Model_home->all_faq_home();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();
		$data['representeds'] = $this->Model_home->all_represented();

		$data['portfolio_category'] = $this->Model_portfolio->get_portfolio_category();
		$data['portfolio'] = $this->Model_portfolio->get_portfolio_data();

		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();
		//$data['captcha_image'] = $this->GenCaptcha();

		$this->load->view('view_header',$data);
		$this->load->view('view_home',$data);
		$this->load->view('view_footer',$data);
	}

	public function GenCaptcha(){
		$vals = array(
		        //'word'          => 'Random word',
		        'img_path' 		=> './captcha/',
				'img_url'  		=> base_url('captcha'),
		        'font_path'     => FCPATH .'captcha/fonts/captcha.ttf',
		        'img_width'     => '150',
		        'img_height'    => 45,
		        'expiration'    => 7200,
		        'word_length'   => 5,
		        'font_size'     => 20,
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and red grid
		        'colors'        => array(
		                'background' => array(248, 248, 248),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(75, 153, 67)
		        )
		);
		$cap = create_captcha($vals);
		$this->session->set_userdata('user_captcha_value', $cap['word']);
		return $cap['image'];
	}

	public function captcha_check($str){
		if ($str === $this->session->userdata('user_captcha_value')):
			return TRUE;
		else:
			$this->form_validation->set_message('captcha_check', 'O texto do Captcha está incorreto!');
			return FALSE;
		endif;
	}

	public function refresh(){
		$response = $this->GenCaptcha();
		$this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
	}

	public function send_email2() {

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_contact'])) {

			$valid = 1;

			if($_POST['pest_control'] == 'Pest Control') {
				$pest_control_status = 'Yes';
			} else {
				$pest_control_status = 'No';
			}

			if($_POST['termite_control'] == 'Termite Control') {
				$termite_control_status = 'Yes';
			} else {
				$termite_control_status = 'No';
			}

			if($_POST['damage_repair'] == 'Damage Repair') {
				$damage_repair_status = 'Yes';
			} else {
				$damage_repair_status = 'No';
			}

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			$this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			if( $pest_control_status == 'No' && $termite_control_status == 'No' && $damage_repair_status == 'No' ) {
				$valid = 0;
				$error .= 'Você deve selecionar pelo menos um produto.';
			}

			if($valid == 1)
			{
				$msg = '
				<h3>Visitor Information</h3>
				<b>Name: </b> '.$_POST['name'].'<br><br>
				<b>Email: </b> '.$_POST['email'].'<br><br>
				<b>Phone: </b> '.$_POST['phone'].'<br><br>
				<b>City: </b> '.$_POST['city'].'<br><br>
				<b>Pest Control: </b> '.$pest_control_status.'<br><br>
				<b>Termite Control: </b> '.$termite_control_status.'<br><br>
				<b>Damage Repair: </b> '.$damage_repair_status.'
				';
				$this->load->library('email');

				$this->email->from($data['setting']['website_email']);
				$this->email->to($data['setting']['receive_email']);

				$this->email->subject('Contact Form Email');
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

				$success = 'Obrigado por enviar o email. Entraremos em contato com você em breve.';
				$this->session->set_flashdata('success',$success);

			} 
			else
			{
				$this->session->set_flashdata('error',$error);
			}

			redirect(base_url());

		} else {

			redirect(base_url());
		}
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
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
			$this->form_validation->set_rules('message', 'Message', 'trim|required');
			$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
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

			redirect(base_url());

		} else {

			redirect(base_url());
		}
	}
}
