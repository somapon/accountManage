<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company_model extends CI_model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->user_id = $this->ion_auth->user()->row()->id;
    }


    public function get_company($sdata,$limit, $start)
    {
        $this->db->select('*');
        if($sdata['name'])
            $this->db->like('name', $sdata['name'], 'both');
        if($sdata['contact'])
            $this->db->where('contact',$sdata['contact']);
        $this->db->order_by('name', 'ASC');
        if ($limit)
            $this->db->limit($limit, $start);
        $query = $this->db->get('companies');
        // echo $this->db->last_query();exit;
        if ($query->num_rows() > 0):
            if ($limit):
                return $query->result();
            else:
                return $query->num_rows();
            endif;
        else:
            if ($limit):
                return array();
            else:
                return 0;
            endif;
        endif;
    }

    public function save_company($data)
    {
        $this->db->insert('companies',$data);
        return $this->db->insert_id();

    }

    public function company_details($id)
    {
        return $this->db->get_where('companies',array('id'=>$id))->row();
    }

    public function update_company($id,$data)
    {
        $this->db->update('companies', $data, array('id' => $id));
        return true;

    }

    public function is_company_used($id)
    {
        $query = $this->db
            ->select("id")
            ->from("users")
            ->where("FIND_IN_SET('$id',company) !=", 0)
            ->get();
        return $query->num_rows();
    }

    public function is_group_used($id)
    {
        $query = $this->db
            ->select("id")
            ->from("users_groups")
            ->where("FIND_IN_SET('$id',group_id) !=", 0)
            ->get();
        return $query->num_rows();
    }
}

