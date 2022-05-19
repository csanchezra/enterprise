<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // $this->load->model('cliente_model');
  } // __construct()


  public function index()
  {
    if ($this->session->userdata('logged_in'))
    {
      $this->load->view('templates/header');
      $this->load->view('producto/index');

    }
    else {
      redirect("/", "refresh");
    }
  }

  public function get_items()
  {
    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));


    $query = $this->db->get("productos");


    $data = [];


    foreach ($query->result() as $r) {
      $data[] = array(
        $r->producto,
        $r->precio,
        $r->id_proveedor,
      );
    }


    $result = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );


    echo json_encode($result);
    exit();
  }


  public function create()
  {
    if ($this->session->userdata('logged_in'))
    {
      $query = $this->db->get("proveedores");

      $data['proveedor'] = $query->result_array();

      // var_dump($data);
      // die();
      $this->load->view('templates/header');
      $this->load->view('producto/new',$data);

    }
    else {
      redirect("/", "refresh");
    }

  }

  public function store()
  {
    if ($this->session->userdata('logged_in'))
    {

      if ($this->validate()) {
        $request = $this->input->post();


        $this->db->insert('productos', $request);

        redirect('Home/index');
      }
      else
      {
        $array_errors = $this->form_validation->error_array();
        $array_errors = array_values($array_errors);
        $str_errores = "";

        foreach ($array_errors as $key => $value) { /* Recorre array de errores si existe y crea sus correspondientes errores*/
          $str_errores .= ($key == 0) ? $value : "<br>" . $value;
        }
        $this->session->set_flashdata('error', $str_errores);

        redirect('producto/create');

      }

    }
    else {
      redirect("/", "refresh");
    }

  }


  private function validate()
  {
    $this->form_validation->set_rules('producto', 'Producto', 'required|max_length[50]');
    $this->form_validation->set_rules('precio', 'Precio', 'required|max_length[20]');
    $this->form_validation->set_rules('id_proveedor', 'Proveedor', 'required');

    $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
    $this->form_validation->set_message('max_length', 'El campo {field} debe contener menos de {param} caracteres.');


    return $this->form_validation->run();
  }


}
