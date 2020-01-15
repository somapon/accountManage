<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clients extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
   
        $this->load->library('Ion_auth');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
        $this->load->model('ion_auth_model');
        $this->load->model('Clients_model', 'client');
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
	
	public function client_list()
    { 
        $records = $this->client->getClientList();

        $this->data = array(
            'head'              => 'Client List (CL)',
            'records'           => $records,
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'client_list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
    
	public function add_client(){
		
		$form_data = array(
            'head'         => 'New Client Form (NCF)',
        );
		
		$data = array(
			'ccodeNo'    	=> $this->input->post('ccodeNo'),
            'cname' 		=> $this->input->post('cname'),
			'cphone'    	=> $this->input->post('cphone'),
            'cemail'     	=> $this->input->post('cemail'),
			'caddress'    	=> $this->input->post('caddress'),
			'created_at'    => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'ccodeNo',
                'label' => 'Code',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cname',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cphone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cemail',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'caddress',
                'label' => 'Address',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
            if ( ! empty( $_FILES['client_img']['name'] ) ){
				
                $config['upload_path'] = './upload/clients';
                $config['allowed_types'] = '*';
                $config['max_size'] = 50000;
                $config['max_width'] = 1024;
                $config['max_height'] = 1000;
                $config['file_name'] = $file_name = date('YmdHis') . $this->user_id;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('client_img') ) {
					
                    $error = array('error' => $this->upload->display_errors());
					
                }else{
					
                    $updata = array('upload_data' => $this->upload->data());
					
                    $imagedata = array(
					
                        'image' => $file_name . $updata['upload_data']['file_ext'],
                    );
                    $data = array_merge($data, $imagedata);
					
                   if( $this->client->saveClientInfo($data) ){
					   
					   $this->session->set_flashdata( 'message', sprintf($this->success_msg) );
					   
				   }else{
					   
                        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/clients/' . $imagedata['image'];
                        @unlink($path);
                        $this->session->set_flashdata( 'message', sprintf($this->fail_msg) );
                    }

                    redirect('Clients/client_list', 'refresh');
			
                }
            }
			else{
                
                
                $this->session->set_flashdata( 'err_msg', 'Please, Upload your Image');
                
                $this->template->write_view('content', 'new_client', $form_data, TRUE);
                $this->template->render();
            }
			
		}else{
			
			$this->template->write_view('content', 'new_client', $form_data, TRUE);
            $this->template->render();
		}
	}


	public function client_edit($id){
		
		$cinfo = $this->client->getClientById($id);
		
		$form_data = array(
			'id'        => $id,
            'head'      => 'Client Edit Form (CEF)',
            'cinfo'        => $cinfo,
        );
		
		$data = array(
			'id'			=> $id,
			'ccodeNo'    	=> $this->input->post('ccodeNo'),
            'cname' 		=> $this->input->post('cname'),
			'cphone'    	=> $this->input->post('cphone'),
            'cemail'     	=> $this->input->post('cemail'),
			'caddress'    	=> $this->input->post('caddress'),
			'updated_at'    => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'ccodeNo',
                'label' => 'Code',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cname',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cphone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'cemail',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'caddress',
                'label' => 'Address',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
			if ($_FILES['vendor_img']['name']) {
				
				
				$config['upload_path'] = './upload/clients';
				$config['allowed_types'] = '*';
				$config['max_size'] = 50000;
				$config['max_width'] = 1024;
				$config['max_height'] = 1000;
				$config['file_name'] = $file_name = date('YmdHis') . $id;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('vendor_img')) {
					
					$error = array('error' => $this->upload->display_errors());
					
				} else {

					$path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/clients/' . $cinfo->image;

					@unlink($path);
					
					$updata = array('upload_data' => $this->upload->data());
				
				$imagedata = array(
					'image' => $file_name . $updata['upload_data']['file_ext'],
				);
				
				$data = array_merge($data, $imagedata);
				
				$this->client->updateClientInfo($data);
					
					
				}
			}else{
			    
			   $this->client->updateClientInfo($data);
			}
			
			redirect('Clients/client_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'client_edit', $form_data, TRUE);
            $this->template->render();
		}
	}
	

	public function client_view($id){
		
		$cInfo = $this->client->getClientDetails($id);
		
		$form_data = array(
			'head' => 'Client Details (CD)',
			'cInfo' => $cInfo
		);
		
		$this->template->write_view('content', 'client_view', $form_data, TRUE);
        $this->template->render();
		
	}
	
	public function delete_client($id){
		
		$this->db->delete('_007_clientinfo', array('id' => $id));
        $this->session->set_flashdata( 'message', sprintf($this->delete_success_msg) );
		
        redirect('Clients/client_list', 'refresh');
		
	}
}