<?php

class Menu
{

    public function dynamicMenu()
    {
        $CI =& get_instance();
        $user_groups = $CI->ion_auth->get_users_groups($CI->ion_auth->user()->row()->id)->result();

        $where_clauses = array();
        $groups = array();
        foreach ($user_groups as $group) {
            $where_clauses[] =sprintf("FIND_IN_SET('%s', group_id)", $group->id);
            $groups[] = $group->id;
        }

        $query = $CI->db->select('menu_list.*', FALSE)
            ->from('menu_list')->where('status', 'Active');

        # Other than super admin
        if (!in_array(1, $groups) && count($groups)>0) {
            $query = $query->where(implode(' or ', $where_clauses));
        }

        $user_menu = $query->order_by('menu_order')->get()->result();

        // Create a multidimensional array to conatin a list of items and parents
        $menu = array(
            'items' => array(),
            'parents' => array()
        );
        foreach ($user_menu as $v_menu) {
            $menu['items'][$v_menu->id] = $v_menu;
            $menu['parents'][$v_menu->parent_id][] = $v_menu->id;
        }
        // Builds the array lists with data from the menu table
        return $output = $this->buildMenu(0, $menu);
    }
    
    public function buildMenu($parent, $menu, $sub = NULL)
    {

        $html = "";

        if (isset($menu['parents'][$parent])) {
            
            foreach ($menu['parents'][$parent] as $itemId) {
                $result = $this->active_menu_id($menu['items'][$itemId]->id);
                if ($result) {
                    $active = 'active';
                } else {
                    $active = '';
                }

                if (!isset($menu['parents'][$itemId]) && $menu['items'][$itemId]->parent_id !=0) {

					$html .= "<li><a href='" . site_url() . '/' . $menu['items'][$itemId]->link . "' class='slide-item'><i class='fa fa-arrows'></i>" . $menu['items'][$itemId]->title . "</a></li>";
                }

                if (isset($menu['parents'][$itemId])) { 
					
					if($menu['items'][$itemId]->parent_id==0){
						$icon = "<i class='" . $menu['items'][$itemId]->icon . " sidemenu_icons'></i>";
					
					}   
					$html .= "<div class='input-group'>";
					if($menu['items'][$itemId]->parent_id !=0){
						$html .= "<span class='addon-subsubmenu'>" . $icon . "</span>";
					
					}else{
						
						$html .= "<span class='input-group-addon'>" . $icon . "</span>";
					}  
					

					$html .= "<div class='slide submenu' style='width: 75%;'>";
					$html .= "<a class='side-menu__item' data-toggle='slide' href='#' style='display:flex !important;'>";
					$html .= "<span class='side-menu__label'>" . $menu['items'][$itemId]->title . "</span>";
					$html .= "<i class='angle fa fa-angle-down'></i></a>"; 
					$html .= "<ul class='slide-menu submenu-list'>"; 
					$html .= self::buildMenu($itemId, $menu, $menu['items'][$itemId]->title);
					$html .= "</ul>";
					$html .= "</div>";

					$html .= "</div>";
                }
            }
            
        }
        return $html;
    }

    public function active_menu_id($id)
    {
        $CI = &get_instance();
        $activeId = $CI->session->userdata('menu_active_id');

        if (!empty($activeId)) {
            foreach ($activeId as $v_activeId) {
                if ($id == $v_activeId) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    public function user_company()
    {
        $CI = &get_instance();
        $company_info = $CI->db->get_where('companies', array('id' => $CI->ion_auth->user()->row()->company))->row();
        if (!empty($company_info)) {
            return $company_info;
        } else {
            array();
        }
    }
}
