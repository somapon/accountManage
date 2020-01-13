<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FileUpload extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
   
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        //$this->form_validation->run($this);
        $this->form_validation->CI =& $this;
        $this->load->model('ion_auth_model');
        $this->load->model('Option_model', 'option');
        $this->load->model('FileUpload_model', 'fileupload');
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
	
	public function file_list()
    { 
        $records = $this->fileupload->getFiletList();

        $this->data = array(
            'head'              => 'File List (FL)',
            'records'           => $records,
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'file_list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
    
	public function upload_file(){
		
		$form_data = array(
            'head'         => 'Upload File Form (UFF)',
            'id'           => $id,
            'status'       => $this->option->getStatus(),
			'casecategory' => $this->option->getCaseCategory(),
			'casetype'     => $this->option->getCaseType(),
			'courttype'    => $this->option->getCourtType(),
        );
		
		$data = array(
			'casetype_id'    		 => $this->input->post('casetype_id'),
            'casesub_subcategory_id' => $this->input->post('casesub_subcategory_id'),
			'courttype_id'    		 => $this->input->post('courttype_id'),
            'case_date'     		 => $this->input->post('case_date'),
			'file_name'    			 => $this->input->post('file_name'),
            'party_name'     		 => $this->input->post('party_name'),
			'party_district'    	 => $this->input->post('party_district'),
            'case_no'     			 => $this->input->post('case_no'),
			'file_name'    			 => $this->input->post('file_name'),
			'created_at'    		 => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'casetype_id',
                'label' => 'Case Type',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'casesub_subcategory_id',
                'label' => 'Sub Category',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'courttype_id',
                'label' => 'Court Type',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'case_date',
                'label' => 'Case Date',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'file_name',
                'label' => 'File Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'party_name',
                'label' => 'Party Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'party_district',
                'label' => 'Party District',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'case_no',
                'label' => 'Case No',
                'rules' => 'trim|required|callback_duplicate_caseno_check'
            ) 
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
            if ( ! empty( $_FILES['doc_file']['name'] ) ){
				
                $config['upload_path'] = './upload/docfile';
                $config['allowed_types'] = '*';
                $config['max_size'] = 50000;
                $config['max_width'] = 1024;
                $config['max_height'] = 1000;
                $config['file_name'] = $file_name = date('YmdHis') . $this->user_id;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('doc_file') ) {
					
                    $error = array('error' => $this->upload->display_errors());
					
                }else{
					
                    $updata = array('upload_data' => $this->upload->data());
					
                    $imagedata = array(
					
                        'image' => $file_name . $updata['upload_data']['file_ext'],
                    );
                    $data = array_merge($data, $imagedata);
					
                   if( $this->fileupload->saveFileInfo($data) ){
					   
					   $this->session->set_flashdata( 'message', sprintf($this->success_msg) );
					   
				   }else{
					   
                        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/docfile/' . $imagedata['image'];
                        @unlink($path);
                        $this->session->set_flashdata( 'message', sprintf($this->fail_msg) );
                    }

                    redirect('FileUpload/file_list', 'refresh');
			
                }
            }
			else{
                
                
                $this->session->set_flashdata( 'err_msg', 'Please, Upload your Image');
                
                $this->template->write_view('content', 'upload_file', $form_data, TRUE);
                $this->template->render();
            }
			
		}else{
			
			$this->template->write_view('content', 'upload_file', $form_data, TRUE);
            $this->template->render();
		}
	}


	public function file_upload_edit($id){
		
		$fileInfo = $this->fileupload->getUploadFileById($id);

		$cateid = $fileInfo->casetype_id;
		
		$form_data = array(
			'id'        => $id,
            'head'      => 'Edit Upload File Form (EUFF)',
            'id'        => $id,
			'fileInfo' => $fileInfo,
            'status'    => $this->option->getStatus(),
			'casetype'    => $this->option->getCaseType(),
			'casetypecat'    => $this->option->getCaseTypeCat($cateid),
			'courttype'    => $this->option->getCourtType(),
        );
		
		$data = array(
			'id'    		 		 => $id,
			'casetype_id'    		 => $this->input->post('casetype_id'),
            'casesub_subcategory_id' => $this->input->post('casesub_subcategory_id'),
			'courttype_id'    		 => $this->input->post('courttype_id'),
            'case_date'     		 => $this->input->post('case_date'),
			'file_name'    			 => $this->input->post('file_name'),
            'party_name'     		 => $this->input->post('party_name'),
			'party_district'    	 => $this->input->post('party_district'),
            'case_no'     			 => $this->input->post('case_no'),
			'file_name'    			 => $this->input->post('file_name'),
			'updated_at'    		 => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'casetype_id',
                'label' => 'Case Type',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'casesub_subcategory_id',
                'label' => 'Sub Category',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'courttype_id',
                'label' => 'Court Type',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'case_date',
                'label' => 'Case Date',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'file_name',
                'label' => 'File Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'party_name',
                'label' => 'Party Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'party_district',
                'label' => 'Party District',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'case_no',
                'label' => 'Case No',
                'rules' => 'trim|required|callback_duplicate_caseno_check[' . $fileInfo->case_no . ']'
            ) 
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
			if ($_FILES['doc_file']['name']) {
				
				
				$config['upload_path'] = './upload/docfile';
				$config['allowed_types'] = '*';
				$config['max_size'] = 50000;
				$config['max_width'] = 1024;
				$config['max_height'] = 1000;
				$config['file_name'] = $file_name = date('YmdHis') . $id;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('doc_file')) {
					
					$error = array('error' => $this->upload->display_errors());
					
				} else {

					$path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/docfile/' . $fileInfo->image;

					@unlink($path);
					
					$updata = array('upload_data' => $this->upload->data());
				
				$imagedata = array(
					'image' => $file_name . $updata['upload_data']['file_ext'],
				);
				
				$data = array_merge($data, $imagedata);
				
				$this->fileupload->updateFileInfo($data);
					
					
				}
			}else{
			    
			   $this->fileupload->updateFileInfo($data);
			}
			
			redirect('FileUpload/file_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'upload_file_edit', $form_data, TRUE);
            $this->template->render();
		}
	}
	
	public function duplicate_caseno_check($str,$param='')
    {
        $case_no = $this->input->post('case_no');
	
      $query = $this->db->query("SELECT id FROM lwy_file_info
				WHERE case_no='$case_no' AND case_no<>'$param'");
			
       if($query->num_rows()>0)
       {
          $this->form_validation->set_message('duplicate_caseno_check', "%s <span style='color:green;'></span> Case No already exists.");
		 	 	 return false;
       }
       return true;
    }
	
	public function file_view($id){
		
		$fileInfo = $this->fileupload->getUploadFileDetails($id);
		
		$form_data = array(
			'head' => 'File Details (FD)',
			'fileInfo' => $fileInfo
		);
		
		$this->template->write_view('content', 'file_view', $form_data, TRUE);
        $this->template->render();
		
	}
	
	public function delete_upload_file($id){
		
		$this->db->delete('lwy_file_info', array('id' => $id));
        $this->session->set_flashdata( 'message', sprintf($this->delete_success_msg) );
		
        redirect('FileUpload/file_list', 'refresh');
		
	}


}