<?php
class Cliente_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }


    public function get_ventas()
    {


      $this->db->select('v.fecha,c.empresa as cliente, p.producto', FALSE);
      $this->db->from('ventas AS v', FALSE);
      $this->db->join('clientes AS c', 'c.id = v.id_cliente', FALSE);
      $this->db->join('productos AS p', 'p.id = v.id_producto', FALSE);


      $query = $this->db->get();

      return $query;


    }//get_certs




}// class
