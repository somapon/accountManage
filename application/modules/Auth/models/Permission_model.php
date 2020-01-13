<?php
/**
 * Created by PhpStorm.
 * User: nazmul
 * Date: 10/15/17
 * Time: 10:35 PM
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission_model extends CI_model
{
    public $group_id;
    public $menu_id;
    public $can_add;
    public $can_edit;
    public $can_view;
    public $can_delete;

    public function get_group_permissions($group_id = '')
    {

        $this->load->model('Menu_model', 'menu');

        $root_menu = $this->menu->get_menu_list($parent_id = 0);
        foreach ($root_menu as $index => $menu) {
            $menu_list[] = $menu;
            $children = $this->menu->get_menu_list($parent_id = $menu->id);
            if (count($children) > 0) {
                $menu_list = array_merge($menu_list, $children);
            }
        }
        if ($group_id != '') {
            foreach ($menu_list as $index => $menu) {
                $permission = $this->get_permission($group_id, $menu->id);
                if ($permission) {
                    $menu->can_add = $permission->can_add;
                    $menu->can_edit = $permission->can_edit;
                    $menu->can_delete = $permission->can_delete;
                    $menu->can_view = $permission->can_view;
                } else {
                    $menu->can_add = false;
                    $menu->can_edit = false;
                    $menu->can_delete = false;
                    $menu->can_view = false;
                }

            }
        }
        return $menu_list;
    }

    public function get_permission($group_id, $menu_id)
    {
        $query = $this->db->select('*')->where(array(
            'group_id' => $group_id, 'menu_id' => $menu_id))->get('user_access_menus');

        if ($query->num_rows() > 0) {
            $permission = $query->first_row();
            $this->can_add = $permission->can_add;
            $this->can_edit = $permission->can_edit;
            $this->can_delete = $permission->can_delete;
            $this->can_view = $permission->can_view;

            return $this;
        }

        return false;
    }

    public function add_permissions($group_id, $permissions)
    {
        // clearing data
        $this->delete_permissions($group_id);
        // insert new batch
        $this->db->insert_batch('user_access_menus', $permissions);
    }

    public function delete_permissions($group_id)
    {
        $this->db->where('group_id', $group_id);
        $this->db->delete('user_access_menus');
    }

    public function update_menu_permission($group_id, $menu_list, $assign_menu_list)
    {
        foreach ($menu_list as $key => $menu) {
            if (in_array($menu, $assign_menu_list)) {
                $sql = "UPDATE menu_list
                      set group_id = if(find_in_set($group_id,group_id),
                      group_id,
                      CONCAT(group_id, ',', $group_id)
                      )
                      WHERE id=$menu";
            } else {
                $sql = "UPDATE menu_list
                            SET group_id=replace(group_id, ',$group_id','')
                            WHERE id=$menu
                            ";
            }
            $this->db->query($sql);
        }
    }

}
