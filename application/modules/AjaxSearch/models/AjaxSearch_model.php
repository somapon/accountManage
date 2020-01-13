<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxSearch_model extends CI_model
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
	
	public function searchResults($casetype_filter, $caseNo, $fileName, $partyName, $caseDate, $caseCategory, $courtType){
		
		$where = array();

		$this->db->select('lfi.*, ct.subcat_name, ctsc.subsubcat_name, cot.court_name');
        $this->db->from('lwy_file_info lfi');
		$this->db->join('case_subcategory ct', 'ct.id=lfi.casetype_id', 'left');
		$this->db->join('casesub_subcategory ctsc', 'ctsc.id=lfi.casesub_subcategory_id', 'left');
		$this->db->join('court_type cot', 'cot.id=lfi.courttype_id', 'left');
		
        
	
		$this->db->where('lfi.status_id', 1);
		
		if($casetype_filter){
			
			$caseType = explode(",", $casetype_filter); 
			$this->db->where_in('lfi.casetype_id', $caseType);
		}
		
		if($caseNo){
			
			
			$this->db->where('lfi.case_no', $caseNo);
		}
		
		if($fileName){
			
			
			$this->db->where('lfi.file_name', $fileName);
		}
		
		if($partyName){
			
			
			$this->db->where('lfi.party_name', $partyName);
		}
		
		if($caseDate){
			
			
			$this->db->where('lfi.case_date', $caseDate);
		}
		
		if($caseCategory){
			
			$caseTypeFilter = explode(",", $caseCategory); 
			$this->db->where_in('lfi.casesub_subcategory_id', $caseTypeFilter);
		}
		
		if($courtType){
			
			$courtTypeFilter = explode(",", $courtType);
			$this->db->where_in('lfi.courttype_id', $courtTypeFilter);
		}
		
        
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            
           return $result->result();
            
        }
	}
	
	public function fileName($id){
		
		$this->db->select('lfi.image fileName');
        $this->db->from('lwy_file_info lfi');
		
        $query = $this->db->get();
        
        $ret = $query->row();
        return $ret->fileName;
	}
	
}