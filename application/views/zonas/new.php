<section class="mainContent full-width clearfix">
  <div class="container">
    <div class="panel panel-default formPanel contentBox-1">
      <div class="panel-heading bg-color-primary text-center" data-toggle="collapse" data-target="#filtros_busqueda" style="cursor: pointer">
        <h3 class="panel-title">
          Nueva zona
        </h3>
      </div>

      <form id="form_certificaciones" name="form_certificaciones" action="<?= base_url('Zonas/store') ?>" method="post" onkeydown="return event.key != 'Enter';">
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

            <div class="col-xs-12 col-sm-4 col-lg-3">
              <label for="nombre">Nombre de zona</label>
              <input id="nombre" name="nombre" type="text" class="form-control" min="50">
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
