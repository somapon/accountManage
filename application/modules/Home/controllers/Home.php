<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('ion_auth_model');
        $this->load->model('home_model');
		$this->load->model('Option_model', 'option');
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth/login', 'refresh');
        }
    }

    public function index()
    {
		
		$this->data = array(
			'head' => 'File Information'
		);
		
		$this->template->write('title', 'Welcome to CMPDS', TRUE);
		$this->template->write_view('content', 'home', $this->data, TRUE);
		$this->template->render();
	
    }

    public function db()
    {
        $this->load->dbutil();

        $prefs = array(
            'format' => 'zip',
            'filename' => 'db_backup.sql'

        );

        $backup =& $this->dbutil->backup($prefs);

        $db_name = 'cmpds-db-backup-on-' . date("Y-m-d-H-i-s") . '.zip';
        $save = FCPATH . '/' . $db_name;

        $this->load->helper('file');
        write_file($save, $backup);


        $this->load->helper('download');
        force_download($db_name, $backup);
    }
	
	public function fileCount(){
		
		$casecategory = $this->option->getCaseCategory1();
		//echo '<pre>';print_r($casecategory);
		

	


					$previous_category = "";
					foreach($casecategory as $key => $cct){
						
						$category = $cct->subcat_name;
						$name = $cct->subsubcat_name;


						$caseData['casetype_id'] = $cct->casetype_id;
						$caseData['subsubcat_id'] = $cct->subsubcat_id;
				
						$coutnFiles = $this->home_model->coutnUploadedFiles($caseData);
						
						//echo '<pre>';print_r($coutnFiles);
						
						if ($previous_category !== $category) {
							echo $category.'<br/>';
							$previous_category = $category;
						}
						echo '<pre>';print_r($coutnFiles);
	
					}



		







					
				exit;
		
		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
