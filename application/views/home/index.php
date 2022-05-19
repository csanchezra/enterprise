<section class="mainContent full-width clearfix">
	<div class="container">

		<div class="panel panel-default formPanel contentBox-1">
			<div class="panel-heading bg-color-primary text-center">
				<h3 class="panel-title">Reportes</h3>
			</div><!-- .panel-heading -->
			<div class="panel-body">

				<div class="row">

          <div class="d-grid gap-2">
          <a class="btn btn-primary" type="button" href="<?= base_url('Reportes/top_ventas/1') ?>" target="_blank">Maximas ventas</a>
          <a class="btn btn-primary" type="button" href="<?= base_url('Reportes/top_ventas/2') ?>" target="_blank">Menores ventas</a>
          <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ventas a un cliente</a>
        </div>

				</div><!-- .row -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-lg-6">
                  <label for="id_cliente" class="control-label no-margin">Cliente</label>
                  <select id="id_cliente" name="id_cliente" class="form-control no-margin">
                    <option value=""> Seleccionar </option>
                    <?php foreach ($clientes as $key => $value){ ?>
                      <option value="<?= $value['id'] ?>"><?= $value['CUIT'] ?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-8">
                  <label for="fecha_ini" class="control-label no-margin">Inicio</label>
                  <input type="date" id="fecha_ini" name="fecha_ini" value="" class="form-control no-margin">

                </div>
                <div class="col-xs-12 col-sm-12 col-lg-8">
                  <label for="fecha_fin" class="control-label no-margin">Fin</label>
                  <input type="date" name="fecha_fin" id="fecha_fin" value="" class="form-control no-margin">

                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="generar_reporte">Generar</button>
              </div>
            </div>
          </div>
        </div>

			</div><!-- .panel-body -->

		</div><!-- .panel -->

	</div><!-- .container -->



</section>


<script type="text/javascript">

document.getElementById("generar_reporte").onclick  = function(){//do something}
  // console.info("aca");

let cliente = $("#id_cliente").val();

let inicio = $("#fecha_ini").val();

let fin = $("#fecha_fin").val();


if(cliente == '' || inicio == '' || fin  == '')
{
  alert("Seleccione todos los filtros");
}

else
{
  // window.location.href = base_url + "Reportes/by_fecha/" + cliente + "/" + inicio + "/" + fin + "/" ;

  window.open(base_url + "Reportes/by_fecha/" + cliente + "/" + inicio + "/" + fin + "/", '_blank');

}

}

</script>
