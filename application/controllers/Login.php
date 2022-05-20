<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    } // __construct()


    public function index()
    {
      if (!$this->session->userdata('logged_in'))
      {
        $this->load->view('users/login');
      }
      else
      {
          redirect('Home/index');
      }
    }


    public function validar()
    {
        if ($this->validate()) {

            $data = $this->input->post();
            $data['contrasenia'] = md5($data['contrasenia']);

            $existe = $this->login_model->login_validacion($data);

            if ($existe == 1) {
                $newdata = array(
                    'username'  => $data['username'],
//                     'nombre'  => $data['nombre'],
                    'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);

            redirect('Home');
            }
            else
            {
                $this->session->set_flashdata('error', "Verifique su nombre de usuario y contraseña");
                redirect("/", "refresh");
            }
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

            redirect("/", "refresh");

        }
    }

    private function validate()
    {
        $this->form_validation->set_rules('username', 'Usuario', 'required|max_length[20]');
        $this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|max_length[20]');


        $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
        $this->form_validation->set_message('max_length', 'El campo {field} debe contener menos de {param} caracteres.');


        return $this->form_validation->run();
    }


    function logout()
    {
      $this->session->unset_userdata(['username','logged_in']);

      $this->session->sess_destroy();
        redirect("/", "refresh");
    }


    public function create()
    {
      $this->load->view('users/new');
    }


    public function store()
    {

        if ($this->validate_new()) {
          $request = $this->input->post();

          $request['contrasenia'] = md5($request['contrasenia']);

          $this->db->insert('usuarios', $request);

          redirect('Login/index');
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

          redirect('Login/create');

        }

    }


    private function validate_new()
    {
      $this->form_validation->set_rules('nombre', 'Nombre', 'required|max_length[20]');
      $this->form_validation->set_rules('username', 'Usuario', 'required|max_length[20]');
      $this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|max_length[20]');

      $this->form_validation->set_message('required', 'El campo {field} es obligatorio');
      $this->form_validation->set_message('max_length', 'El campo {field} debe contener menos de {param} caracteres.');


      return $this->form_validation->run();
    }

}
