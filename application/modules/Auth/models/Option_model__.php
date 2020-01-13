<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Option_model extends CI_Model
{
    public function get_division_options()
    {
        $this->db->select('id,name');
        $query = $this->db->get('divisions');
        $data[''] = 'Select Division';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

    public function get_district_option($division_id='')
    {
        $this->db->select('id,name');
        if($division_id > 0)
            $query = $this->db->get_where('districts',array('division_id'=>$division_id));
        else
            $query = $this->db->get_where('districts',array('division_id'=>'0'));
        $data[''] = 'Select District';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

    public function get_upazila_option($district_id = '')
    {
        $this->db->select('id,name');
        if($district_id > 0)
            $query = $this->db->get_where('upazilas',array('district_id'=>$district_id));
        else
            $query = $this->db->get_where('upazilas',array('district_id'=>'0'));
        $data[''] = 'Select Upazila';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }


    public function get_union_option($upazila_id = '')
    {
        $this->db->select('id,name');
       
        $query = $this->db->get_where('unions',array('upazila_id'=>$upazila_id));
        
        $data[''] = 'Select Union';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }

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
        $this->db->select('id,description name');
        $query = $this->db->where_not_in('id',array(1,2,3,4))->get('groups');
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

    public function get_institute_option_by_union($upazila_id='',$union_id='')
    {
        $this->db->select('id,school_name name');
        $query = $this->db->order_by('name','ASC')->get_where('schools_info', array('upazila_id'=>$upazila_id,'union_id'=>$union_id));
        $data[''] = 'Select Institute';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }
	
	//By Sombor
	public function get_corporation_options()
    {
        $this->db->select('id,corporation_name name');
        $query = $this->db->get('city_corporation');
        $data[''] = 'Select Corporation';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }
	public function get_thana_options()
    {
        $this->db->select('id,thana_name name');
        $query = $this->db->get('thana');
        $data[''] = 'Select Thana';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }
	public function get_paurasabha_options()
    {
        $this->db->select('id,paurasabha_name name');
        $query = $this->db->get('paurasabha');
        $data[''] = 'Select Paurasabha';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
    }
	public function get_user_list($sdata, $limit, $start){
		$where = array(
            //'students.user_id' => $this->user_id,
        );
		if(!empty($sdata['username'])){
			$username = $sdata['username'];
		    $where1 = "CONCAT(first_name,'',last_name) LIKE '%$username%'";
		}	
	
		if($sdata['group_id']){
			
		    $where['users.group_id'] = $sdata['group_id'];
		}
        $this->db->select('users.*, groups.name');
        $this->db->from('users');
		$this->db->join('groups', 'groups.id = users.group_id', 'left');
		$this->db->where($where);
		
		if(!empty($where1)){
			$this->db->where($where1);
		}
		if(!empty($sdata['phone'])){
			$this->db->like('phone', $sdata['phone'], 'both');
		}
		if(!empty($sdata['email'])){
			$this->db->like('email', $sdata['email'], 'both');
		}
        $this->db->limit($limit, $start);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            if ($limit) {
                return $result->result();
            } else {
                return $result->num_rows();
            }
        }
	}
}