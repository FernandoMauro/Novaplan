<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_newsletter');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
        $this->load->model('Model_marketing');
		$this->load->helper('captcha');

    }

    public function index()
	{
        $view_data = array('view_ip' => date('d/m/Y H:i:s'));
        $this->Model_marketing->add_views($view_data);




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



        $data['marketing_views'] = $this->Model_marketing->get_total_views();
		$data['captcha_image'] = $this->GenCaptcha();

		$this->load->view('view_header',$data);
		$this->load->view('view_marketing',$data);
		$this->load->view('view_footer',$data);
	}

	public function send() {

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_subscribe'])) {

			$valid = 1;

			$this->form_validation->set_rules('email_subscribe', 'Email Subscribe', 'trim|required|valid_email');
			$this->form_validation->set_error_delimiters('', '<br>');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
				$error .= validation_errors();
			}

			/*if(empty($_POST['email_subscribe'])) {
		        $valid = 0;
		        $error .= 'O endereço de email não pode estar vazio';
		    }*/
		    else
		    {
		    	if (filter_var($_POST['email_subscribe'], FILTER_VALIDATE_EMAIL) === false)
			    {
			        $valid = 0;
			        $error .= 'O endereço de email deve ser válido';
			    }
			    else
			    {
			    	$total = $this->Model_newsletter->total_subscriber_by_email($_POST['email_subscribe']);
	            	if($total) {
	            		$valid = 0;
	                	$error .= 'O endereço de e-mail já existe!';
	            	}
			    }
			}

		    if($valid == 1)
		    {

		    	$key = md5(uniqid(rand(), true));
	    		$current_date = date('d/m/Y');
	    		$current_date_time = date('d/m/Y H:i:s');

		    	$form_data = array(
					'subs_email' => $_POST['email_subscribe'],
					'subs_date' => $current_date,
					'subs_date_time' => $current_date_time,
					'subs_hash' => $key,
					'subs_active' => 0
	            );
	            $this->Model_newsletter->add($form_data);

	            $verification_url = base_url().'newsletter/verify/'.$_POST['email_subscribe'].'/'.$key;

				$msg = 'Obrigado pelo seu interesse em assinar nossa newsletter!<br><br> Clique neste link para confirmar sua inscrição: <br>'.$verification_url;

            	$this->load->library('email');

				$this->email->from($data['setting']['send_email_from']);
				$this->email->to($_POST['email_subscribe']);

				$this->email->subject('Confirmar assinatura de email');
				$this->email->message($msg);

				$this->email->set_mailtype("html");

				$this->email->send();

		        $success = 'Obrigado por enviar o email. Entraremos em contato com você em breve.';
        		$this->session->set_flashdata('success',$success);
        		redirect(base_url().'#newsletter');
		    } 
		    else
		    {
        		$this->session->set_flashdata('error',$error);
        		redirect(base_url().'#newsletter');
		    }
            
        } else {            
            redirect(base_url());
        }
	}

	function verify($email=0,$hash=0) {

		if(!$email || !$hash ) {
			redirect(base_url());
		}

		$tot = $this->Model_newsletter->check_url($email,$hash);
		if(!$tot) {
			redirect(base_url());
		}

		$data['setting'] = $this->Model_common->all_setting();
		$data['page_home'] = $this->Model_common->all_page_home();
		$data['comment'] = $this->Model_common->all_comment();
		$data['social'] = $this->Model_common->all_social();
		$data['all_news'] = $this->Model_common->all_news();
		$data['all_menu_home'] = $this->Model_home->all_menu_home();
		$data['portfolio_footer'] = $this->Model_portfolio->get_portfolio_data();

		$form_data = array(
			'subs_hash' => '',
			'subs_active' => 1
        );
        $this->Model_newsletter->update($email,$hash,$form_data);

		$this->load->view('view_header',$data);
		$this->load->view('view_thankyou_subscribe',$data);
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
}