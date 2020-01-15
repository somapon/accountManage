<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
   
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->model('ion_auth_model');
        $this->load->model('Settings_model', 'settings');
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
	
	public function account_head_list()
    { 
        $records = $this->settings->getAccHeadList();

        $this->data = array(
            'head'              => 'Account Head List (VL)',
            'records'           => $records,
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'aac_head_list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
    
	public function add_account_head(){
		
		$form_data = array(
            'head'         => 'Account Head Form (AHF)',
        );
		
		$data = array(
			'head_title'    	=> $this->input->post('head_title'),
			'created_at'    => date('Y-m-d'),
        );
		
		$config = array(
			array(
                'field' => 'head_title',
                'label' => 'Head Title',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {

			   if( $this->settings->saveAccHeadInfo($data) ){
					   
				   $this->session->set_flashdata( 'message', sprintf($this->success_msg) );
				   
				   
			   }else{
				   
					$this->session->set_flashdata( 'message', sprintf($this->fail_msg) );
				}
				
				redirect('Settings/account_head_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'new_acc_head', $form_data, TRUE);
            $this->template->render();
		}
	}


	public function account_head_edit($id){
		
		$ahinfo = $this->settings->getAccHeadById($id);
		
		$form_data = array(
			'id'        => $id,
            'head'      => 'Account Head Edit Form (AHEF)',
            'ahinfo'        => $ahinfo,
        );
		
		$data = array(
			'id'			=> $id,
			'head_title'    	=> $this->input->post('head_title'),
			'updated_at'    => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'head_title',
                'label' => 'Account Head',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
				if( $this->settings->updateAccHeadInfo($data) ){
					
					$this->session->set_flashdata( 'message', sprintf($this->edit_success_msg) );
					
				}else{
					
					$this->session->set_flashdata( 'message', sprintf($this->fail_success_msg) );
				}
			
			redirect('Settings/account_head_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'acc_head_edit', $form_data, TRUE);
            $this->template->render();
		}
	}
	
	public function delete_acc_head($id){
		
		$this->db->delete('_007_account_head', array('id' => $id));
        $this->session->set_flashdata( 'message', sprintf($this->delete_success_msg) );
		
        redirect('Settings/account_head_list', 'refresh');
		
	}
}