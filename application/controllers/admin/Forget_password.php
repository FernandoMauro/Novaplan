<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_password extends CI_Controller 
{

    function __construct() 
    {
        parent::__construct();
        $this->load->model('admin/Model_forget_password');
    }

    public function index()
    {
        $error = '';
        $success = '';

        $data['setting'] = $this->Model_forget_password->get_setting_data();

        if(isset($_POST['form1'])) {

            $valid = 1;

            $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

            if($this->form_validation->run() == FALSE) {
                $valid = 0;
                $error .= validation_errors();
            } else {
                $tot = $this->Model_forget_password->check_email($_POST['email']);
                if(!$tot) {
                    $valid = 0;
                    $error .= 'Seu endereço de email não foi encontrado em nosso sistema.<br>';
                }    
            }
             

            if($valid == 1) {

                $token = md5(rand());

                // Update Database
                $form_data = array(
                    'token' => $token
                );
                $this->Model_forget_password->update($_POST['email'],$form_data);
                
                // Send Email
                $msg = '<p>Para redefinir sua senha, por favor <a href="'.base_url().'admin/reset-password/index/'.$_POST['email'].'/'.$token.'">clique aqui</a> e insira uma nova senha';
                
                $this->load->library('email', $config);

                $this->email->from($data['setting']['send_email_from']);
                $this->email->to($_POST['email']);

                $subject = 'Redefinição de senha';

                $this->email->subject($subject);
                $this->email->message($msg);

                $this->email->set_mailtype("html");

                $this->email->send();

                $success = 'Um email é enviado para o seu endereço de email. Por favor, siga as instruções lá.';
                $this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/forget_password');
            } else {
                $this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/forget_password');
            }            
        } else {
            $this->load->view('admin/view_forget_password',$data);    
        }
        
    }
}
