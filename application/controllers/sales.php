<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (! $this->user) {
            redirect('login');
        }
        $this->register = $this->session->userdata('register') ? $this->session->userdata('register') : FALSE;
    }

    public function index()
    {
      $this->view_data['register'] = $this->register;
      $this->content_view = 'sale';
    }
}
