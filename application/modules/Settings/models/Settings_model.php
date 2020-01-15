<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }

	///----------------for Quiz Hub-------------------
	
	public function getAccHeadList()
    {
        $this->db->select('ah.*');
        $this->db->from('_007_account_head ah');
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
    }
	
	public function saveAccHeadInfo($dataInfo){
		
		$this->db->insert('_007_account_head',$dataInfo);
        $last_id = $this->db->insert_id();
        return $last_id;
	}

	public function getAccHeadById($id)
    {
        return $this->db->select('ah.*')
            ->get_where('_007_account_head ah', array('ah.id' => $id))->row();
    }
	
	public function updateAccHeadInfo($data = array())
    {
        if ( $this->db->update('_007_account_head', $data, array('id' => $data['id'])) ){
			
			return $this->db->affected_rows();
		}
    }
}