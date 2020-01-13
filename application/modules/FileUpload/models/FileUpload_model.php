<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class FileUpload_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }

	///----------------for Quiz Hub-------------------
	
	public function getFiletList()
    {
        $this->db->select('qs.*, ct.subcat_name, ctsc.subsubcat_name, cot.court_name');
        $this->db->from('lwy_file_info qs');
		$this->db->join('case_subcategory ct', 'ct.id=qs.casetype_id', 'left');
		$this->db->join('casesub_subcategory ctsc', 'ctsc.id=qs.casesub_subcategory_id', 'left');
		$this->db->join('court_type cot', 'cot.id=qs.courttype_id', 'left');
		
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
    }
	
	public function saveFileInfo($dataInfo){
		
		$this->db->insert('lwy_file_info',$dataInfo);
        $last_id = $this->db->insert_id();
        return $last_id;
	}
	
	public function saveDocFileInfo($lwyFiles){
		
		$this->db->insert('lwy_files',$lwyFiles);
        $last_id = $this->db->insert_id();
        return $last_id;
	}
	
	public function getUploadFileById($id)
    {
        return $this->db->select('lfi.*')
            ->get_where('lwy_file_info lfi', array('lfi.id' => $id))->row();
    }
	
	public function updateFileInfo($data = array())
    {
        if ( $this->db->update('lwy_file_info', $data, array('id' => $data['id'])) ){
			
			return $this->db->affected_rows();
		}
    }
	
	public function getUploadFileDetails($id)
    {
        return $this->db->select('lfi.*, ct.subcat_name, ctsc.subsubcat_name, cot.court_name')
			->join('case_subcategory ct', 'ct.id=lfi.casetype_id', 'left')
			->join('casesub_subcategory ctsc', 'ctsc.id=lfi.casesub_subcategory_id', 'left')
			->join('court_type cot', 'cot.id=lfi.courttype_id', 'left')
            ->get_where('lwy_file_info lfi', array('lfi.id' => $id))->row();
    }
	
}