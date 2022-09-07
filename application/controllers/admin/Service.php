<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller 
{
	function __construct() 
	{
        parent::__construct();
        $this->load->model('admin/Model_common');
        $this->load->model('admin/Model_service');
    }

	public function index()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$data['service'] = $this->Model_service->show();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_service',$data);
		$this->load->view('admin/view_footer');
	}

	public function service_order()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$data['service'] = $this->Model_service->show_order();

		$this->load->view('admin/view_header',$data);
		$this->load->view('admin/view_service_order',$data);
		$this->load->view('admin/view_footer');
	}

	public function order()
	{
		
		$id_order = $_POST['id_order'];
		$arr_item = explode(",", $id_order);
		$this->Model_service->update_order($arr_item);
		
	}

	public function update_check()
	{
		
		$checked  = $_POST['checked'];
		$idCheck = str_replace('check', '', $_POST['idCheck']);
		
		$this->Model_service->update_status($idCheck, $checked);

	}

	public function add()
	{
		$data['setting'] = $this->Model_common->get_setting_data();

		$error = '';
		$success = '';

		if(isset($_POST['form1'])) {

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

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
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    } else {
		    	$valid = 0;
		        $error .= 'You must have to select a photo for featured photo<br>';
		    }

		    
		    if($valid == 1) 
		    {
				$next_id = $this->Model_service->get_auto_increment_id();
				foreach ($next_id as $row) {
		            $ai_id = $row['Auto_increment'];
		        }

		        $final_name = 'service-'.$ai_id.'.'.$ext;
		        move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		        $form_data = array(
					'name'              => $_POST['name'],
					'short_description' => $_POST['short_description'],
					'description'       => $_POST['description'],
					'photo'             => $final_name,
					'meta_title'        => $_POST['meta_title'],
					'meta_keyword'      => $_POST['meta_keyword'],
					'meta_description'  => $_POST['meta_description']
	            );
	            $this->Model_service->add($form_data);

	            if( isset($_FILES['photos']["name"]) && isset($_FILES['photos']["tmp_name"]) )
		        {
		            $photos = array();
		            $photos = $_FILES['photos']["name"];
		            $photos = array_values(array_filter($photos));

		            $photos_temp = array();
		            $photos_temp = $_FILES['photos']["tmp_name"];
		            $photos_temp = array_values(array_filter($photos_temp));

		            $next_id1 = $this->Model_service->get_auto_increment_id1();
					foreach ($next_id1 as $row1) {
			            $ai_id1 = $row1['Auto_increment'];
			        }

		            $z = $ai_id1;

		            $m=0;
		            $final_names = array();
		            for($i=0;$i<count($photos);$i++)
		            {

		            	$ext = pathinfo( $photos[$i], PATHINFO_EXTENSION );
				        $ext_check = $this->Model_common->extension_check_photo($ext);
				        if($ext_check == FALSE) {
				        	// Nothing to do, just skip
				        } else {
				        	$final_names[$m] = $z.'.'.$ext;
		                    move_uploaded_file($photos_temp[$i],"./public/uploads/service_photos/".$final_names[$m]);
		                    $m++;
		                    $z++;
				        }
		            }
		        }

		        for($i=0;$i<count($final_names);$i++)
		        {
		        	$form_data = array(
						'service_id' => $ai_id,
						'photo'        => $final_names[$i]
		            );
		            $this->Model_service->add_photos($form_data);
		        }

		        $success = 'Service is added successfully!';
		        $this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/service');
		    } 
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/service/add');
		    }
            
        } else {
            
            $this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_service_add',$data);
			$this->load->view('admin/view_footer');
        }
		
	}


	public function edit($id)
	{
		
    	// If there is no service in this id, then redirect
    	$tot = $this->Model_service->service_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/service');
        	exit;
    	}
       	
       	$data['setting'] = $this->Model_common->get_setting_data();
		$error = '';
		$success = '';


		if(isset($_POST['form1'])) 
		{

			$valid = 1;

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required');
			$this->form_validation->set_rules('description', 'Description', 'trim|required');

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
		            $error .= 'You must have to upload jpg, jpeg, gif or png file for featured photo<br>';
		        }
		    }

		    
		    if($valid == 1) 
		    {
		    	$data['service'] = $this->Model_service->getData($id);

		    	if($path == '') {
		    		$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}
				else {
					unlink('./public/uploads/'.$data['service']['photo']);

					$final_name = 'service-'.$id.'.'.$ext;
		        	move_uploaded_file( $path_tmp, './public/uploads/'.$final_name );

		        	$form_data = array(
						'name'              => $_POST['name'],
						'short_description' => $_POST['short_description'],
						'description'       => $_POST['description'],
						'photo'             => $final_name,
						'meta_title'        => $_POST['meta_title'],
						'meta_keyword'      => $_POST['meta_keyword'],
						'meta_description'  => $_POST['meta_description']
		            );
		            $this->Model_service->update($id,$form_data);
				}

				if( isset($_FILES['photos']["name"]) && isset($_FILES['photos']["tmp_name"]) )
		        {
		            $photos = array();
		            $photos = $_FILES['photos']["name"];
		            $photos = array_values(array_filter($photos));

		            $photos_temp = array();
		            $photos_temp = $_FILES['photos']["tmp_name"];
		            $photos_temp = array_values(array_filter($photos_temp));

		            $next_id1 = $this->Model_service->get_auto_increment_id1();
					foreach ($next_id1 as $row1) {
			            $ai_id1 = $row1['Auto_increment'];
			        }

		            $z = $ai_id1;

		            $m=0;
		            $final_names = array();
		            for($i=0;$i<count($photos);$i++)
		            {

		            	$ext = pathinfo( $photos[$i], PATHINFO_EXTENSION );
				        $ext_check = $this->Model_common->extension_check_photo($ext);
				        if($ext_check == FALSE) {
				        	// Nothing to do, just skip
				        } else {
				        	$final_names[$m] = $z.'.'.$ext;
		                    move_uploaded_file($photos_temp[$i],"./public/uploads/service_photos/".$final_names[$m]);
		                    $m++;
		                    $z++;
				        }
		            }
		        }

		        for($i=0;$i<count($final_names);$i++)
		        {
		        	$form_data = array(
						'service_id' => $id,
						'photo'        => $final_names[$i]
		            );
		            $this->Model_service->add_photos($form_data);
		        }
		        
				$success = 'Service is updated successfully';
				$this->session->set_flashdata('success',$success);
				redirect(base_url().'admin/service');
		    }
		    else
		    {
		    	$this->session->set_flashdata('error',$error);
				redirect(base_url().'admin/service/edit/'.$id);
		    }
           
		} else {
			$data['service'] = $this->Model_service->getData($id);
			$data['all_photos_by_id'] = $this->Model_service->get_all_photos_by_category_id($id);
	       	$this->load->view('admin/view_header',$data);
			$this->load->view('admin/view_service_edit',$data);
			$this->load->view('admin/view_footer');
		}

	}


	public function delete($id) 
	{
		// If there is no service in this id, then redirect
    	$tot = $this->Model_service->service_check($id);
    	if(!$tot) {
    		redirect(base_url().'admin/service');
        	exit;
    	}

        $data['service'] = $this->Model_service->getData($id);
        if($data['service']) {
            unlink('./public/uploads/'.$data['service']['photo']);
        }

        $this->Model_service->delete($id);
        $success = 'Service is deleted successfully';
        $this->session->set_flashdata('success',$success);
        redirect(base_url().'admin/service');
    }

    public function single_photo_delete($photo_id=0,$service_id=0) {

  		$service_photo = $this->Model_service->service_photo_by_id($photo_id);
  		unlink('./public/uploads/service_photos/'.$service_photo['photo']);

  		$this->Model_service->delete_service_photo($photo_id);

  		redirect(base_url().'admin/service/edit/'.$service_id);

    }

}