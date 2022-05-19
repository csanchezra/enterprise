<section class="mainContent full-width clearfix">
  <div class="container">
    <div class="panel panel-default formPanel contentBox-1">
      <div class="panel-heading bg-color-primary text-center" data-toggle="collapse" data-target="#filtros_busqueda" style="cursor: pointer">
        <h3 class="panel-title">
          Nuevo producto
        </h3>
      </div>

      <form id="form_certificaciones" name="form_certificaciones" action="<?= base_url('Producto/store') ?>" method="post" onkeydown="return event.key != 'Enter';">
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
              <label for="producto">Producto</label>
              <input id="producto" name="producto" type="text" class="form-control"  maxlength="50">
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="precio">Precio</label>
              <input id="precio" name="precio" type="text" class="form-control"  maxlength="20">
            </div>

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="id_proveedor" class="control-label no-margin">Proveedor</label>
              <select id="id_proveedor" name="id_proveedor" class="form-control no-margin">
                <option value=""> Seleccionar </option>
                <?php foreach ($proveedor as $key => $value){ ?>
                  <option value="<?= $value['id'] ?>"><?= $value['empresa'] ?></option>
                <?php }?>
              </select>
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
