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
}