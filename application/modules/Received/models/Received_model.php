<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Received_model extends CI_model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }

	///----------------for Quiz Hub-------------------
	
	public function getVendorList()
    {
        $this->db->select('vi.*');
        $this->db->from('_007_vendorinfo vi');
		$result = $this->db->get();
		
        if ($result->num_rows() > 0) {
           
            return $result->result();
            
        }
    }
	
	public function saveVendorInfo($dataInfo){
		
		$this->db->insert('_007_vendorinfo',$dataInfo);
        $last_id = $this->db->insert_id();
        return $last_id;
	}

	public function getVendorById($id)
    {
        return $this->db->select('vi.*')
            ->get_where('_007_vendorinfo vi', array('vi.id' => $id))->row();
    }
	
	public function updateVendorInfo($data = array())
    {
        if ( $this->db->update('_007_vendorinfo', $data, array('id' => $data['id'])) ){
			
			return $this->db->affected_rows();
		}
    }
	
	public function getVendorDetails($id)
    {
        return $this->db->select('vi.*')
            ->get_where('_007_vendorinfo vi', array('vi.id' => $id))->row();
    }
	
}