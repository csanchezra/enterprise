<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
    } // __construct()


    public function index()
    {
      if ($this->session->userdata('logged_in'))
      {

        $query = $this->db->get("clientes");

        $data['clientes'] = $query->result_array();

        $this->load->view('templates/header');
        $this->load->view('home/index',$data);
      }
      else {
        redirect("/", "refresh");
      }
    }




}
