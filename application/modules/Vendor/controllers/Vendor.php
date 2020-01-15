<?php
/*
 * Developed by @engr.mukul@hotmail.com
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vendor extends MX_Controller
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
        $this->load->model('Vendor_model', 'vendor');
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
	
	public function vendor_list()
    { 
        $records = $this->vendor->getVendorList();

        $this->data = array(
            'head'              => 'Vendor List (VL)',
            'records'           => $records,
            
        );

        $this->template->write('title', $this->data["head"], TRUE);
        $this->template->write_view('content', 'vendor_list', $this->data, TRUE);
        $this->template->render();
        return true;
    }
    
	public function add_vendor(){
		
		$form_data = array(
            'head'         => 'New Vendor Form (NVF)',
        );
		
		$data = array(
			'vcodeNo'    	=> $this->input->post('vcodeNo'),
            'vname' 		=> $this->input->post('vname'),
			'vphone'    	=> $this->input->post('vphone'),
            'vemail'     	=> $this->input->post('vemail'),
			'vaddress'    	=> $this->input->post('vaddress'),
			'created_at'    => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'vcodeNo',
                'label' => 'Code',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vname',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vphone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vemail',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vaddress',
                'label' => 'Address',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
            if ( ! empty( $_FILES['vendor_img']['name'] ) ){
				
                $config['upload_path'] = './upload/vendors';
                $config['allowed_types'] = '*';
                $config['max_size'] = 50000;
                $config['max_width'] = 1024;
                $config['max_height'] = 1000;
                $config['file_name'] = $file_name = date('YmdHis') . $this->user_id;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('vendor_img') ) {
					
                    $error = array('error' => $this->upload->display_errors());
					
                }else{
					
                    $updata = array('upload_data' => $this->upload->data());
					
                    $imagedata = array(
					
                        'image' => $file_name . $updata['upload_data']['file_ext'],
                    );
                    $data = array_merge($data, $imagedata);
					
                   if( $this->vendor->saveVendorInfo($data) ){
					   
					   $this->session->set_flashdata( 'message', sprintf($this->success_msg) );
					   
				   }else{
					   
                        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/vendors/' . $imagedata['image'];
                        @unlink($path);
                        $this->session->set_flashdata( 'message', sprintf($this->fail_msg) );
                    }

                    redirect('Vendor/vendor_list', 'refresh');
			
                }
            }
			else{
                
                
                $this->session->set_flashdata( 'err_msg', 'Please, Upload your Image');
                
                $this->template->write_view('content', 'new_vendor', $form_data, TRUE);
                $this->template->render();
            }
			
		}else{
			
			$this->template->write_view('content', 'new_vendor', $form_data, TRUE);
            $this->template->render();
		}
	}


	public function vendor_edit($id){
		
		$vinfo = $this->vendor->getVendorById($id);
		
		$form_data = array(
			'id'        => $id,
            'head'      => 'Vendor Edit Form (VEF)',
            'vinfo'        => $vinfo,
        );
		
		$data = array(
			'id'			=> $id,
			'vcodeNo'    	=> $this->input->post('vcodeNo'),
            'vname' 		=> $this->input->post('vname'),
			'vphone'    	=> $this->input->post('vphone'),
            'vemail'     	=> $this->input->post('vemail'),
			'vaddress'    	=> $this->input->post('vaddress'),
			'updated_at'    => date('Y-m-d h:i:sa'),
        );
		
		$config = array(
			array(
                'field' => 'vcodeNo',
                'label' => 'Code',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vname',
                'label' => 'Name',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vphone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vemail',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
			array(
                'field' => 'vaddress',
                'label' => 'Address',
                'rules' => 'trim|required'
            )
        );
        
		
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<span class="req">', '</span>');
		
		if (isset($_POST) && !empty($_POST) && $this->form_validation->run($this) == TRUE) {
			
			if ($_FILES['vendor_img']['name']) {
				
				
				$config['upload_path'] = './upload/vendors';
				$config['allowed_types'] = '*';
				$config['max_size'] = 50000;
				$config['max_width'] = 1024;
				$config['max_height'] = 1000;
				$config['file_name'] = $file_name = date('YmdHis') . $id;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('vendor_img')) {
					
					$error = array('error' => $this->upload->display_errors());
					
				} else {

					$path = $_SERVER['DOCUMENT_ROOT'] . '/' . PROJECT . '/upload/vendors/' . $vinfo->image;

					@unlink($path);
					
					$updata = array('upload_data' => $this->upload->data());
				
				$imagedata = array(
					'image' => $file_name . $updata['upload_data']['file_ext'],
				);
				
				$data = array_merge($data, $imagedata);
				
				$this->vendor->updateVendorInfo($data);
					
					
				}
			}else{
			    
			   $this->vendor->updateVendorInfo($data);
			}
			
			redirect('Vendor/vendor_list', 'refresh');
			
		}else{
			
			$this->template->write_view('content', 'vendor_edit', $form_data, TRUE);
            $this->template->render();
		}
	}
	

	public function vendor_view($id){
		
		$vInfo = $this->vendor->getVendorDetails($id);
		
		$form_data = array(
			'head' => 'Vendor Details (VD)',
			'vInfo' => $vInfo
		);
		
		$this->template->write_view('content', 'vendor_view', $form_data, TRUE);
        $this->template->render();
		
	}
	
	public function delete_vendor($id){
		
		$this->db->delete('_007_vendorinfo', array('id' => $id));
        $this->session->set_flashdata( 'message', sprintf($this->delete_success_msg) );
		
        redirect('Vendor/vendor_list', 'refresh');
		
	}
}