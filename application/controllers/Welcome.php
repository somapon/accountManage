<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->render('home/homepage_view');
  }

}