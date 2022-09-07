<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_profile');
    }
	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_profile',$data);
		$this->load->view('admin/view_footer');
		
	}
	public function update()
	{
		$error = '';
		$success = '';

		$data['setting'] = $this->Model_common->get_setting_data();

		if(isset($_POST['form1'])) {

			$valid = 1;
			$id = $_POST['id'];

			$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error = validation_errors();
            }

            if($valid == 1) {
	            $form_data = array(
					'email'     => $_POST['email']
	            );
	        	$this->Model_profile->update($id,$form_data);
	        	$success = 'Profile Information is updated successfully!';
	        	
	        	$this->session->set_userdata($form_data);

	        	$this->session->set_flashdata('success',$success);
	        	redirect(base_url().'admin/profile');
            }
            else {
            	$this->session->set_flashdata('error',$error);
	        	redirect(base_url().'admin/profile');
            }
		}

		if(isset($_POST['form2'])) {
			$valid = 1;
			$id = $_POST['id'];

			$path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];
		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $data['error'] = 'You must have to upload jpg, jpeg, gif or png file<br>';
		        }
		    } else {
		    	$valid = 0;
		        $data['error'] = 'You must have to select a photo<br>';
		    }
		    if($valid == 1) {
		    	// removing the existing photo
		    	unlink('./public/uploads/'.$this->session->userdata('photo'));

		    	// updating the data
		    	$final_name = 'user-'.$id.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );
		    			        
				$form_data = array(
					'photo' => $final_name
	            );
	        	$this->Model_profile->update($id,$form_data);
	        	$success = 'Photo is updated successfully!';

	        	$this->session->set_userdata($form_data);
	        	$this->session->set_flashdata('success',$success);
	        	redirect(base_url().'admin/profile');
		    }
		    else {
		    	$this->session->set_flashdata('error',$error);
	        	redirect(base_url().'admin/profile');
		    }
		}

		if(isset($_POST['form3'])) {
			$valid = 1;
			$id = $_POST['id'];

		    $this->form_validation->set_rules('password', 'Password', 'trim|required');
		    $this->form_validation->set_rules('re_password', 'Retype Password', 'trim|required|matches[password]');

			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error = validation_errors();
            }

		    if($valid == 1) {

		    	$form_data = array(
		    		'password' => md5($_POST['password'])
	            );
	        	$this->Model_profile->update($id,$form_data);
	        	$success = 'Password is updated successfully!';
	        	
	        	$this->session->set_userdata($form_data);
	        	$this->session->set_flashdata('success',$success);
	        	redirect(base_url().'admin/profile');
		    }
		    else {
		    	$this->session->set_flashdata('error',$error);
	        	redirect(base_url().'admin/profile');
		    }
		}

		$data['setting'] = $this->Model_common->get_setting_data();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_profile',$data);
		$this->load->view('admin/view_footer');
	}

	public function users()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['users'] = $this->Model_profile->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_user',$data);
		$this->load->view('admin/view_footer');
		
	}
	
	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[5]');
			$this->form_validation->set_rules('re_password', 'Repita a Senha', 'trim|required|matches[password]');


			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'Você deve fazer o upload de arquivos jpg, jpeg, gif ou png para a foto em destaque<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'Você deve selecionar uma foto para a foto em destaque<br>';
		    }


		    if($valid == 1) 
		    {
				$next_id = $this->Model_profile->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        $final_name = 'user-'.$ai_id.'.'.$ext;
				$source_image = $path_tmp;
				$destination = './public/uploads/'.$final_name;
				$new_width = 400;
			  	$new_height = 400;
			 	$quality = 100;
				$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		        $form_data = array(
					'email'			=> $_POST['email'],
					'password'		=> md5($_POST['password']),
					'photo'			=> $final_name,
					'role'			=> $_POST['role'],
					'status'		=> $_POST['status']
	            );
	            $this->Model_profile->add($form_data);

		        $success = 'Usuário foi adicionado com sucesso!';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/profile/users');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/profile/add');
		    }
            
        } else {
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_profile_add',$data);
			$this->load->view('admin/view_footer');
        }

		
	}

	public function edit($id)
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('password', 'Senha', 'trim|min_length[5]');
			if(isset($_POST['password']) && $_POST['password'] != ''):
				$this->form_validation->set_rules('re_password', 'Repita a Senha', 'trim|required|matches[password]');
			endif;
			
			if($this->form_validation->run() == FALSE) {
				$valid = 0;
                $error .= validation_errors();
            }

            $path = $_FILES['photo']['name'];
		    $path_tmp = $_FILES['photo']['tmp_name'];

		    if($path!='') {
		        $ext = pathinfo( $path, PATHINFO_EXTENSION );
		        $file_name = basename( $path, '.' . $ext );
		        $ext_check = $this->Model_common->extension_check_photo($ext);
		        if($ext_check == FALSE) {
		            $valid = 0;
		            $error .= 'Você deve fazer o upload de arquivos jpg, jpeg, gif ou png para a foto em destaque<br>';
		        }
		    } 

		    if($valid == 1) 
		    {
				$data['profile'] = $this->Model_profile->get_profile($id);

		        if($path == '' && isset($_POST['password']) && $_POST['password'] != '') {
		    		$form_data = array(
						'email'			=> $_POST['email'],
						'password'		=> md5($_POST['password']),
						'role'			=> $_POST['role'],
						'status'		=> $_POST['status']
		            );
		            $this->Model_profile->update($id,$form_data);
				}
				elseif ($path == '') {
					$form_data = array(
						'email'			=> $_POST['email'],
						'role'			=> $_POST['role'],
						'status'		=> $_POST['status']
		            );
		            $this->Model_profile->update($id,$form_data);
				}
				else {

			        $final_name = 'user-'.$id.'.'.$ext;
					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name;
					$new_width = 400;
				  	$new_height = 400;
				 	$quality = 100;
					$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

			        $form_data = array(
						'email'			=> $_POST['email'],
						'password'		=> md5($_POST['password']),
						'photo'			=> $final_name,
						'role'			=> $_POST['role'],
						'status'		=> $_POST['status']
		            );
		            $this->Model_profile->update($id,$form_data);
	        	}

		        $success = 'Usuário foi alterado com sucesso!';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/profile/users');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/profile/edit/'.$id);
		    }
            
        } else {
        	$data['profile'] = $this->Model_profile->get_profile($id);
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_profile_edit',$data);
			$this->load->view('admin/view_footer');
        }

		
	}

	public function delete($id) 
	{
		// If there is no client in this id, then redirect
    	$tot = $this->Model_profile->profile_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/profile/users');
        	exit;
    	}

        $data['users'] = $this->Model_profile->get_profile($id);
        if($data['users']) {
            unlink('./public/uploads/'.$data['users']['photo']);
        }

        $this->Model_profile->delete($id);
        $success = 'O usuário foi excluído com sucesso';
		$this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/profile/users');
    }

}
