<section class="mainContent full-width clearfix">
  <div class="container">
    <div class="panel panel-default formPanel contentBox-1">
      <div class="panel-heading bg-color-primary text-center" data-toggle="collapse" data-target="#filtros_busqueda" style="cursor: pointer">
        <h3 class="panel-title">
          Nuevo proveedor
        </h3>
      </div>

      <form id="form_certificaciones" name="form_certificaciones" action="<?= base_url('Ventas/store') ?>" method="post" onkeydown="return event.key != 'Enter';">
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
              <label for="id_cliente" class="control-label no-margin">Cliente</label>
              <select id="id_cliente" name="id_cliente" class="form-control no-margin">
                <option value=""> Seleccionar </option>
                <?php foreach ($clientes as $key => $value){ ?>
                  <option value="<?= $value['id'] ?>"><?= $value['CUIT'] ?></option>
                <?php }?>
              </select>
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="id_producto" class="control-label no-margin">Producto</label>
              <select id="id_producto" name="id_producto" class="form-control no-margin">
                <option value=""> Seleccionar </option>
                <?php foreach ($productos as $key => $value){ ?>
                  <option value="<?= $value['id'] ?>"><?= $value['producto'] ?></option>
                <?php }?>
              </select>
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="numero">Número de ventas</label>
              <input id="numero" name="numero" type="number" class="form-control" min="1" value="1">
            </div>

          </div><!-- row -->


        </div><!-- row -->


        <div class="panel-footer">
          <button id ="btn_nuevo_certificado_grabar" type="submit"  class="btn btn-primary">Grabar</button>
        </div> <!--  .panel-footer -->


      </form><!-- form -->

    </div><!-- .panel-body -->


  </div>

</section>
