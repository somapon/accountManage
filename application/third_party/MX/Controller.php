<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__) . '/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link    http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright    Copyright (c) 2015 Wiredesignz
 * @version    5.5
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller
{
    public $autoload = array();
    public $data;

    public function __construct()
    {

        $this->template->write('title', 'CMPDS', TRUE);
        //default meta description
        $this->template->add_meta('description', 'An example of a page description.');
        //it is better to include header and footer here because these will be used by every page
        $this->template->write_view('header', 'templates/snippets/header');
        $this->template->write_view('sidebar', 'templates/snippets/sidebar');
        $this->template->write_view('footer', 'templates/snippets/footer');


        $class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
        log_message('debug', $class . " MX_Controller Initialized");
        Modules::$registry[strtolower($class)] = $this;

        /* copy a loader instance and initialize */
        $this->load = clone load_class('Loader');
        $this->load->initialize($this);

        /* autoload module items */
        $this->load->_autoloader($this->autoload);
    }

    public function __get($class)
    {
        return CI::$APP->$class;
    }

    /*************************************  Start Pagination ***********************************/
    function paginate($total_rows,$id)
    {
        if (!empty($id)) {
            $config['base_url'] = site_url() . '/' .  $this->router->class . '/' . $this->router->method . '/' . $id . '/';
        } else {
            $config['base_url'] = site_url() . '/' . $this->router->class . '/' . $this->router->method . '/';
        }

        $config['total_rows'] = $total_rows;
        $config['per_page'] = "10";
        if (!empty($id)) {
            $config["uri_segment"] = 4;
        } else {
            $config["uri_segment"] = 3;
        }
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;
        $config['first_link'] = true;
        $config['first_link'] = 'First';
        $config['last_link'] = true;
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        if ($id)
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        else
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $links = $this->pagination->create_links();

        return array(
            'link'=>$links,
            'per_page'=>$config['per_page'],
            'page'=>$page
        );
    }
    /*************************************  End Pagination ***********************************/

}