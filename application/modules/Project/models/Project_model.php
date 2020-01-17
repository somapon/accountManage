<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }

	///----------------for Quiz Hub-------------------
	
	public function getProjectList()
    {
        $this->db->select('p.*');
        $this->db->from('_007_projects p');
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
    }
	
	public function saveProjectInfo($dataInfo){
		
		$this->db->insert('_007_projects',$dataInfo);
        $last_id = $this->db->insert_id();
        return $last_id;
	}

	public function getProjectById($id)
    {
        return $this->db->select('p.*')
            ->get_where('_007_projects p', array('p.id' => $id))->row();
    }
	
	public function updateProjectInfo($data = array())
    {
        if ( $this->db->update('_007_projects', $data, array('id' => $data['id'])) ){
			
			return $this->db->affected_rows();
		}
    }
}