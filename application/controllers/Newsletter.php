<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('Model_common');
        $this->load->model('Model_newsletter');
        $this->load->model('Model_portfolio');
        $this->load->model('Model_home');
    }

	public function send() {

		$data['setting'] = $this->Model_common->all_setting();

		$error = '';

		if(isset($_POST['form_subscribe'])) {

			$valid = 1;

			if(empty($_POST['email_subscribe'])) {
		        $valid = 0;
		        $error .= 'O endereço de email não pode estar vazio';
		    }
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
}