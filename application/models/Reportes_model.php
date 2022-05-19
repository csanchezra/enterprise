<?php
class reportes_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  function best_ventas_zona()
  {


    $str_query = "SELECT
    t.*
    FROM
    c_zona z INNER JOIN
    (
      SELECT COUNT(v.id) ventas, z.nombre AS zona ,p.`producto`,z.id AS idzona FROM ventas v
      INNER JOIN clientes c ON c.id = v.id_cliente
      INNER JOIN c_zona z ON z.id = c.`id_zona`
      INNER JOIN productos p ON p.id = v.`id_producto`
      GROUP BY id_producto, z.id
    ) AS t  ON t.idzona = z.id
    GROUP BY z.id";

    return $this->db->query($str_query)->result_array();
  } // login_validacion()

  function low_ventas_zona()
  {


    $str_query = "SELECT
    MIN(t.ventas) AS ventas,t.zona,t.producto,t.idzona
    FROM
    c_zona z INNER JOIN
    (
      SELECT COUNT(v.id) ventas, z.nombre AS zona ,p.`producto`,z.id AS idzona FROM ventas v
      INNER JOIN clientes c ON c.id = v.id_cliente
      INNER JOIN c_zona z ON z.id = c.`id_zona`
      INNER JOIN productos p ON p.id = v.`id_producto`
      GROUP BY id_producto, z.id
    ) AS t  ON t.idzona = z.id
    GROUP BY z.id";

    return $this->db->query($str_query)->result_array();
  } // login_validacion()


  function get_ventas_cliente($cliente, $fecha_ini, $fecha_fin)
  {


    $str_query = "SELECT COUNT(v.id) ventas, z.nombre AS zona ,p.`producto`,z.id AS idzona,c.`CUIT`
      FROM ventas v
      INNER JOIN clientes c ON c.id = v.id_cliente
      INNER JOIN c_zona z ON z.id = c.`id_zona`
      INNER JOIN productos p ON p.id = v.`id_producto`
      WHERE v.`id_cliente` = ?
      AND (v.fecha BETWEEN ? AND  ?)
     GROUP BY p.producto";

    return $this->db->query($str_query,[$cliente, $fecha_ini, $fecha_fin])->result_array();
  } // login_validacion()




}// class
