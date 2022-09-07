<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkp extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		/*
		// Carrega a classe DB Utility 
		$this->load->dbutil();
		
		$backup = $this->dbutil->backup();


		// Carrega o helper File e cria um arquivo com o conteúdo do backup
		$this->load->helper('file');
		write_file(base_url().'public/uploads/backup.gz', $backup);

		// Carrega o helper Download e força o download do arquivo que foi criado com 'write_file'
		$this->load->helper('download');
		force_download('backup.gz', $backup);
		*/

		if(!$this->session->userdata('id')) {
			redirect(base_url().'admin');
		}
		
		$this->load->dbutil();

        $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'my_db_backup.sql'
              );
        $backup = $this->dbutil->backup($prefs); 

        $db_name = 'backup-on-'. date('Y-m-d-H-i-s') .'.zip';
        $save = base_url().'/public/uploads/'.$db_name;

        $this->load->helper('file');
        write_file($save, $backup); 

        $this->load->helper('download');
        force_download($db_name, $backup); 
		
	}


}
