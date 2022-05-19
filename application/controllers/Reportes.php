<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('reportes_model');
    $this->load->library('My_dompdf');
  } // __construct()


  public function top_ventas($tipo_reporte = NULL)
  {
    if ($this->session->userdata('logged_in'))
    {
      $pdf = new My_dompdf();

      $data = [];

      if($tipo_reporte == 1){
      $data['array_datos'] = $this->reportes_model->best_ventas_zona();
      $titulo = 'Menores ventas por zona';
      $data['titulo'] = $titulo;
      }

      else
      {
        $data['array_datos'] = $this->reportes_model->low_ventas_zona();
        $titulo = 'Mayores ventas por zona';
        $data['titulo'] = $titulo;
      }

      $vista = $this->load->view('reportes/zona',$data,TRUE);

      $pdf->generate($vista, $titulo, TRUE, "A4", "portrait", TRUE);

    }
    else {
      redirect("/", "refresh");
    }

  }


  public function by_fecha($cliente, $fecha_ini, $fecha_fin)
  {
    if ($this->session->userdata('logged_in'))
    {
      $pdf = new My_dompdf();

      $data['array_datos'] = $this->reportes_model->get_ventas_cliente($cliente, $fecha_ini, $fecha_fin);

      $vista = $this->load->view('reportes/cliente',$data,TRUE);

      $pdf->generate($vista, $titulo, TRUE, "A4", "portrait", TRUE);

    }
    else {
      redirect("/", "refresh");
    }

  }




}
