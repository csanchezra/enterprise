<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ventas extends CI_Controller
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
      $this->load->view('templates/header');
      $this->load->view('ventas/index');
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


    $query = $this->cliente_model->get_ventas();


    // var_dump($ventas);die();

    $data = [];


    foreach ($query->result() as $r) {
      $data[] = array(
        $r->cliente,
        $r->producto,
        $r->fecha,
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
      $query = $this->db->get("clientes");

      $data['clientes'] = $query->result_array();

      $query = $this->db->get("productos");

      $data['productos'] = $query->result_array();

      // var_dump($data);
      // die();
      $this->load->view('templates/header');
      $this->load->view('ventas/new',$data);

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

        $inserciones = $request['numero'];
        unset($request['numero']);

        for ($i=0; $i < $inserciones; $i++) {
          $this->db->insert('ventas', $request);
        }


        redirect('ventas/index');
      }
      else
      {
        $array_errors = $this->form_validation->error_array();
        $array_errors = array_values($array_errors);
        $str_errores = "";

        foreach ($array_errors as $key => $value) { /* Recorre array de errores si existe y crea sus correspondientes errores*/
          $str_errores .= ($key == 0) ? $value : "<br>" . $value;
          // echo $value;
        }
        $this->session->set_flashdata('error', $str_errores);

        // var_dump($this->session->flashdata());
        // die();

        redirect('ventas/create');

      }

    }
    else {
      redirect("/", "refresh");
    }

  }


  private function validate()
  {
    $this->form_validation->set_rules('id_cliente', 'Cliente', 'required');
    $this->form_validation->set_rules('id_producto', 'Producto', 'required');
    $this->form_validation->set_rules('numero', 'Número de ventas', 'required');

    $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
    $this->form_validation->set_message('max_length', 'El campo {field} debe contener menos de {param} caracteres.');


    return $this->form_validation->run();
  }


}
