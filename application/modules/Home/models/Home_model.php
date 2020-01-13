<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
	

	public function coutnUploadedFiles($caseData)
    {

        $this->db->select('lfi.id, cst.subcat_name, csst.subsubcat_name, cot.court_name');
        $this->db->from('lwy_file_info lfi');
		$this->db->join('case_subcategory cst', 'cst.id=lfi.casetype_id', 'left');
		$this->db->join('casesub_subcategory csst', 'csst.id=lfi.casesub_subcategory_id', 'left');
		$this->db->join('court_type cot', 'cot.id=lfi.courttype_id', 'left');
		$this->db->where('lfi.casetype_id', $caseData['casetype_id']);
		$this->db->where('lfi.casesub_subcategory_id', $caseData['subsubcat_id']);
		
		//$this->db->group_by('lfi.courttype_id');
		
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {

			
           return $result->result();
            
        }
    }
	
	
}