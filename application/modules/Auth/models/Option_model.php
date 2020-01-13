<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends CI_Model
{


    public function get_village_option($union_id = '')
    {
        $this->db->select('id,name');
        if($union_id > 0)
            $query = $this->db->get_where('villages',array('union_id'=>$union_id));
        else
            $query = $this->db->get_where('villages',array('union_id'=>'0'));
        $data[''] = 'Select Village';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

    public function get_word_option($union_id = '')
    {
        $this->db->select('id,name');
        if($union_id > 0)
            $query = $this->db->get_where('words',array('union_id'=>$union_id));
        else
            $query = $this->db->get_where('words',array('union_id'=>'0'));
        $data[''] = 'Select Ward';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

    public function get_institute_option($union_id = '')
    {
        $this->db->select('id,school_name name');
        if($union_id > 0)
            $query = $this->db->get_where('schools_info',array('union_id'=>$union_id));
        else
            $query = $this->db->get_where('schools',array('union_id'=>'0'));
        $data[''] = 'Select Institute';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

    public function get_group_options()
    {
        $this->db->select('id,name');
        $query = $this->db->get('groups');
        $data[''] = 'Select Group';
        foreach($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

       return $data;
    }

    public function get_company_options()
    {
        $sql = 'SELECT id,name FROM companies';
        $query = $this->db->query($sql);
        $data[''] = 'Select Company';
        foreach($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }
       return $data;
    }

    public function get_company_options_update($company_id)
    {
        $sql = 'SELECT id,name FROM companies a WHEre a.id ='.$company_id;
        $query = $this->db->query($sql);
        $data[''] = 'Select Company';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }
        return $data;
    }

    public function get_institute_types_option()
    {
        $this->db->select('id,institute_type_name name');
        $query = $this->db->get('institute_types');
        $data[''] = 'Select Institute Type';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }



	public function get_user_list(){


        $this->db->select('users.*, groups.name');
        $this->db->from('users');
		$this->db->join('groups', 'groups.id = users.group_id', 'left');
	
        $result = $this->db->get();
        
        if ($result->num_rows() > 0) {
            
            return $result->result();
            
        }
	}
	
	//-----------------ADD/EDIT/DELETE ACCESS------------------------------------------
	
	public function get_menu_access_list($group_id){
		$this->db->select('user_access_menus.group_id, user_access_menus.menu_id, user_access_menus.can_add, 
								user_access_menus.can_edit, user_access_menus.can_delete, user_access_menus.can_view')
        ->from('user_access_menus')
        ->where('user_access_menus.group_id', $group_id);
        $result = $this->db->get();
		return $result->result();
	}
	
	//------------------------------------------------------------------------------------------------------------//
	
	
	public function add_website_permission($webData)
    {
        $this->db->insert('website_permission', $webData);

        $last_id = $this->db->insert_id();
        return $last_id;
    
    }
    
    //=============## Login Attempt History ##==================================================
    
    public function save_login_attempt($log_data){
		
		$this->db->insert('user_login_attempt', $log_data);
        return $this->db->insert_id();
      
	}
	
	//=====================##################=================================================
}