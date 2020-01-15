<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clients_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }

	///----------------for Quiz Hub-------------------
	
	public function getClientList()
    {
        $this->db->select('ci.*');
        $this->db->from('_007_clientinfo ci');
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
    }
	
	public function saveClientInfo($dataInfo){
		
		$this->db->insert('_007_clientinfo',$dataInfo);
        $last_id = $this->db->insert_id();
        return $last_id;
	}

	public function getClientById($id)
    {
        return $this->db->select('ci.*')
            ->get_where('_007_clientinfo ci', array('ci.id' => $id))->row();
    }
	
	public function updateClientInfo($data = array())
    {
        if ( $this->db->update('_007_clientinfo', $data, array('id' => $data['id'])) ){
			
			return $this->db->affected_rows();
		}
    }
	
	public function getClientDetails($id)
    {
        return $this->db->select('ci.*')
            ->get_where('_007_clientinfo ci', array('ci.id' => $id))->row();
    }
	
}