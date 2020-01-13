<?php
/**
 * Created by PhpStorm.
 * User: nazmul
 * Date: 10/15/17
 * Time: 10:27 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu_model extends CI_model
{
    public $order;
    public $parent_id;
    public $title;
    public $link;
    public $status;
    public $icon;
    // Set default as False
    public $can_add;
    public $can_edit;
    public $can_view;
    public $can_delete;

    public function get_menu_list($parent_id=''){
        $query = $this->db->order_by('id','ASC')->where(array('status'=>'Active', 'parent_id'=>$parent_id))->get('menu_list');
        return $query->result();
    }

}
