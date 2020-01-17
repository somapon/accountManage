<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
   
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->model('ion_auth_model');
        $this->load->model('Project_model', 'project');
        $this->load->helper(array('form', 'url', 'language'));
        $this->user_id = $this->ion_auth->user()->row()->id;
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth/login', 'refresh');
        }
        $this->success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_success').'</div>';
        $this->fail_msg = '<div class="alert alert-warning alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_add_fail').'</div>';
		$this->edit_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_success').'</div>';
		$this->edit_fail_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_update_fail').'</div>';
		$this->delete_success_msg = '<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$this->lang->line('label_info_delete_success').'</div>';
    }

    //-----------Start Question/Answer Part
	
	public function project_list()
    { 
        $records = $this->project->getProjectList();

        $this->data = array(
            'head'              => 'Project List (VL)',
            'records'           => $records,
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
    
	public function new_project(){
		
		$form_data = array(
            'head'         => 'Project Form (PF)',
        );
		
		$data = array(
			'project_name' => $this->input->post('project_name'),
			'description' => $this->input->post('description'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
        );
		
		$config = array(
			array(
                'field' => 'project_name',
                'label' => 'Project Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'end_date',
                'label' => 'End date',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {

			   if( $this->project->saveProjectInfo($data) ){
					   
				   $this->session->set_flashdata( 'message', sprintf($this->success_msg) );
				   
				   
			   }else{
				   
					$this->session->set_flashdata( 'message', sprintf($this->fail_msg) );
				}
				
				redirect('Project/project_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'add', $form_data, TRUE);
            $this->template->render();
		}
	}


	public function edit_project($id){
		
		$p = $this->project->getProjectById($id);
		
		$form_data = array(
			'id'        => $id,
            'head'      => 'Project Edit Form (PEF)',
            'p'        => $p,
        );
		
		$data = array(
			'id'		   => $id,
			'project_name' => $this->input->post('project_name'),
			'description' => $this->input->post('description'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
        );
		
		$config = array(
			array(
                'field' => 'project_name',
                'label' => 'Project Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'start_date',
                'label' => 'Start Date',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'end_date',
                'label' => 'End date',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
				if( $this->project->updateProjectInfo($data) ){
					
					$this->session->set_flashdata( 'message', sprintf($this->edit_success_msg) );
					
				}else{
					
					$this->session->set_flashdata( 'message', sprintf($this->fail_success_msg) );
				}
			
			redirect('Project/project_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'edit', $form_data, TRUE);
            $this->template->render();
		}
	}
	
	public function delete_project($id){
		
		$this->db->delete('_007_projects', array('id' => $id));
        $this->session->set_flashdata( 'message', sprintf($this->delete_success_msg) );
		
        redirect('Project/project_list', 'refresh');
		
	}
}