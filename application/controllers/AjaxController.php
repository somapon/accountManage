<?php
/*
 * Developed by @Tanjina Jannat Tithy
 * */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AjaxController extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('ion_auth_model');
        $this->load->model('Option_model', 'option');
        $this->load->helper(array('form', 'url', 'language'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect('Auth/login', 'refresh');
        }

    }
	
	public function getCaseSubCat()
    {
        $casetype_id = $this->input->post('casetype_id');
        $subcategory = $this->input->post('subcategory');
        $subcats = $this->option->getSubCategory($casetype_id);

        echo '<select name="' . $subcategory . '" id="' . $subcategory . '" class ="form-control", tabindex =5, required ="required">';
        echo '<option value="">Select Category</option>';
        foreach ($subcats as $subcat) {
            echo '<option value="' . $subcat->id . '">' . $subcat->subsubcat_name . '</option>';
        }
        echo '</select>';
    }
	

}