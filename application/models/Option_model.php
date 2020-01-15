<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends CI_Model
{
	//---------------for Quiz Hub----------------------
	
	public function get_menu_access_list($group_id){
		$this->db->select('user_access_menus.group_id, user_access_menus.menu_id, user_access_menus.can_add, 
								user_access_menus.can_edit, user_access_menus.can_delete, user_access_menus.can_view')
        ->from('user_access_menus')
        ->where('user_access_menus.group_id', $group_id);
        $result = $this->db->get();
		return $result->result();
	}
	

	public function getCaseTypeCat($id){
		
		$this->db->select('id, subsubcat_name title');
       
        $query = $this->db->get_where('casesub_subcategory',array('case_subcategory_id'=>$id));

        $data[''] = 'Select Category';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['title']);
        }

        return $data;
	}
	

	
	public function getSubCategory($casetype_id = '')
    {
        return $this->db->get_where('casesub_subcategory', array('case_subcategory_id' => $casetype_id))->result();
    }
	
	
	//============AJAX SEARCH=====================
	
	public function searchCaseType(){
		
		$this->db->select('id, subcat_name title');
        $query = $this->db->get('case_subcategory');
      
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['title']);
        }

        return $data;
	}
	
	public function searchCaseCategory(){
		
		$this->db->select('cssc.id, ct.subcat_name, cssc.case_subcategory_id, cssc.subsubcat_name');
        $this->db->from('casesub_subcategory cssc');
		$this->db->join('case_subcategory ct', 'ct.id=cssc.case_subcategory_id', 'left');

		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
		
	}
	 
	public function getCaseCategory1(){
		
		$this->db->select('cssc.id subsubcat_id, cssc.case_subcategory_id casetype_id, ct.subcat_name,  cssc.subsubcat_name');
        $this->db->from('casesub_subcategory cssc');
		$this->db->join('case_subcategory ct', 'ct.id=cssc.case_subcategory_id', 'left');

		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
		
	}
	
	public function searchCourtType(){
		
		$this->db->select('id, court_name title');
        $query = $this->db->get('court_type');
        
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['title']);
        }

        return $data;
	}
}