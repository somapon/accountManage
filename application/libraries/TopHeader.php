<?php

class TopHeader
{

    public function deviceChangeRequest()
    {
		$CI =& get_instance();
		
        $query = $CI->db->select('aru.*')
            ->from('api_registered_users aru')
			->where('aru.id_device_change', 1)
			->order_by('aru.dvc_req_date', 'DESC')
			->limit(2);
			
		$dcr = $query->get()->result();
		
		return $dcr;
    }
	public function paymentRequest()
    {
		$CI =& get_instance();
		
        $query = $CI->db->select('apm.*, aru.name')
            ->from('qhub_payment_method apm')
			->join('api_registered_users aru', 'aru.id=apm.user_id', 'left')
			->where('apm.status_id', 0)
			->order_by('apm.id', 'DESC')
			->order_by('apm.created_at', 'DESC')
			->limit(2);
			
		$pm = $query->get()->result();
		
		return $pm;
    }
	
	public function userRegistration()
    {
		$CI =& get_instance();
		
        $query = $CI->db->select('aru.*')
            ->from('api_registered_users aru')
			->where('aru.status', 0)
			->order_by('aru.create_date', 'DESC')
			->limit(2);
			
		$ur = $query->get()->result();
		
		return $ur;
    }
    
    public function get_crownDiamond_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as crownDiamond', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 5);

        $query = $query->get();
		$ret = $query->row();
		return $ret->crownDiamond;
	}
	public function get_diamond_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as diamond', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 6);

        $query = $query->get();
		$ret = $query->row();
		return $ret->diamond;
	}
	public function get_gold_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as gold', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 1);

        $query = $query->get();
		$ret = $query->row();
		return $ret->gold;
	}
	public function get_silver_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as silver', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 3);

        $query = $query->get();
		$ret = $query->row();
		return $ret->silver;
	}
	public function get_platinam_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as platinam', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 4);

        $query = $query->get();
		$ret = $query->row();
		return $ret->platinam;
	}
	
	public function get_nolevel_users(){
		
		$CI =& get_instance();
		
		$query = $CI->db->select('COUNT( aru.id ) as nolevel', FALSE)
        ->from('api_registered_users aru')
		->where('aru.level_id', 0);

        $query = $query->get();
		$ret = $query->row();
		return $ret->nolevel;
	}
	public function getMondayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	
	public function getTuesdayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	public function getWednesdayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	
	public function getThursdayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	public function getFridayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	public function getSatardayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	public function getSundayPoints($d){
		
		$CI =& get_instance();

		$query = $CI->db->select('SUM(qp.points) as points', FALSE)
        ->from('qhub_points qp')
		->where('DATE(qp.created_at)', $d);

        $q = $query->get();
		$ret = $q->row();
		return $ret->points;
	}
	
	public function userList(){

		$CI =& get_instance();
		
		$CI->db->select('id, CONCAT(first_name," ",last_name) name', false)
		->where('active',1)
		->where_not_in('id', array(74));
        $query = $CI->db->get('users');
        $data[''] = 'Select User';
        foreach ($query->result_array() as $row) {
            $data[$row['id']] = ucfirst($row['name']);
        }

        return $data;
	
	}
}
