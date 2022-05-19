<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
  	var base_url = "<?= base_url() ?>";
</script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Home/index') ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Producto/index') ?>">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Proveedores/index') ?>">Proveedores</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Cliente/index') ?>">Clientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Ventas/index') ?>">Ventas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Zonas/index') ?>">Zonas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Login/logout') ?>">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
