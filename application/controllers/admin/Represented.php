<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Represented extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_represented');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();
		$data['represented'] = $this->Model_represented->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_represented',$data);
		$this->load->view('admin/view_footer');
	}

	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');

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
				$next_id = $this->Model_represented->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        $final_name = 'represented-'.$ai_id.'.'.$ext;
				$source_image = $path_tmp;
				$destination = './public/uploads/'.$final_name;
				$new_width = 400;
			  	$new_height = 400;
			 	$quality = 100;
				$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		        $form_data = array(
					'name'             => $_POST['name'],
					'photo'            => $final_name,
					'detail'           => $_POST['detail'],
					'website'          => $_POST['website'],
					'meta_title'       => $_POST['meta_title'],
					'meta_keyword'     => $_POST['meta_keyword'],
					'meta_description' => $_POST['meta_description']
	            );
	            $this->Model_represented->add($form_data);

		        $success = 'Representada foi adicionado com sucesso!';
				$this->session->set_flashdata('success',$success);
		    	redirect(base_url().'admin/represented');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/represented/add');
		    }
            
        } else {
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_represented_add',$data);
			$this->load->view('admin/view_footer');
        }
		
	}


	public function edit($id)
	{
		
    	$tot = $this->Model_represented->represented_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/represented');
        	exit;
    	}
       	
       	$data['setting'] = $this->Model_common->get_setting_data();
		$error = '';
		$success = '';


		if(isset($_POST['form1'])) 
		{

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');

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
		    	$data['represented'] = $this->Model_represented->get_represented($id);

		    	if($path == '') {
		    		$form_data = array(
						'name'             => $_POST['name'],
						'detail'           => $_POST['detail'],
						'website'          => $_POST['website'],
						'meta_title'       => $_POST['meta_title'],
						'meta_keyword'     => $_POST['meta_keyword'],
						'meta_description' => $_POST['meta_description']
		            );
		            $this->Model_represented->update($id,$form_data);
		    	}
		    	else 
		    	{
		    		unlink('./public/uploads/'.$_POST['current_photo']);

					$final_name = 'represented-'.$id.'.'.$ext;

					$source_image = $path_tmp;
					$destination = './public/uploads/'.$final_name;
					$new_width = 400;
				  	$new_height = 400;
				 	$quality = 100;
					$this->Model_common->image_handler($source_image,$destination,$new_width,$new_height,$quality);

		    		$form_data = array(
						'name'             => $_POST['name'],
						'photo'            => $final_name,
						'detail'           => $_POST['detail'],
						'website'          => $_POST['website'],
						'meta_title'       => $_POST['meta_title'],
						'meta_keyword'     => $_POST['meta_keyword'],
						'meta_description' => $_POST['meta_description']
		            );
		            $this->Model_represented->update($id,$form_data);
		    	}

				$success = 'A representada foi atualizada com sucesso';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/represented');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
		    	redirect(base_url().'admin/represented/edit/'.$id);
		    }           
		} else {
			$data['represented'] = $this->Model_represented->get_represented($id);
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_represented_edit',$data);
			$this->load->view('admin/view_footer');
		}

	}


	public function delete($id) 
	{
    	$tot = $this->Model_represented->represented_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/represented');
        	exit;
    	}

        $data['represented'] = $this->Model_represented->get_represented($id);
        if($data['represented']) {
            unlink('./public/uploads/'.$data['represented']['photo']);
        }

        $this->Model_represented->delete($id);
        $success = 'A representada foi excluída com sucesso';
        $this->session->set_flashdata('success',$success);
    	redirect(base_url().'admin/represented');
    }

 
}