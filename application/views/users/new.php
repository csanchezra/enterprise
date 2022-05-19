<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>

<section class="mainContent full-width clearfix">
  <div class="container">
    <div class="panel panel-default formPanel contentBox-1">
      <div class="panel-heading bg-color-primary text-center" data-toggle="collapse" data-target="#filtros_busqueda" style="cursor: pointer">
        <h3 class="panel-title">
          Crear usuario
        </h3>
      </div>

      <form id="form_certificaciones" name="form_certificaciones" action="<?= base_url('Login/store') ?>" method="post" onkeydown="return event.key != 'Enter';">
        <div class="panel-body">
          <?php if(isset($this->session->flashdata()['error'])) {?>
            <div class="row">
              <div class="col-12">
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="danger" onclick="this.parentElement.style.display='none';">&times;</button>
                  <strong><?= $this->session->flashdata()['error']?></strong>
                </div><!-- .alert alert-warning alert-dismissable -->
              </div><!-- .col-md-12 -->
            </div><!-- .row -->
          <?php } ?>



          <div class="row">

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="nombre">Nombre</label>
              <input id="nombre" name="nombre" type="text" class="form-control"  maxlength="20">
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="username">Usuario</label>
              <input id="username" name="username" type="text" class="form-control"  maxlength="20">
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="contrasenia">Contraseña</label>
              <input id="contrasenia" name="contrasenia" type="text" class="form-control"  maxlength="20">
            </div>

          </div><!-- row -->


        </div><!-- row -->


        <div class="panel-footer">
          <button  type="submit"  class="btn btn-primary">Grabar</button>
        </div> <!--  .panel-footer -->


      </form><!-- form -->

    </div><!-- .panel-body -->


  </div>

</section>
