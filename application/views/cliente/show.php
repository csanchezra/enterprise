<section class="mainContent full-width clearfix">
	<div class="container">

		<div class="panel panel-default formPanel contentBox-1">
			<div class="panel-heading bg-color-primary text-center">
				<h3 class="panel-title">Datos del cliente</h3>
			</div><!-- .panel-heading -->
			<div class="panel-body">

				<div class="row">
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label for="cct" class="control-label">Empresa</label>
							<input type="text" class="form-control text-uppercase" id="cct" name="cct" readonly value="<?= $empresa ?>">
						</div><!-- .form-group -->
					</div><!-- .col -->
					<div class="col-xs-12 col-md-8">
						<div class="form-group">
							<label for="nombre" class="control-label">CUIT</label>
							<input id="nombre" name="nombre" type="text" class="form-control text-uppercase" readonly value="<?= $CUIT?>">
						</div><!-- .form-group -->
					</div><!-- .col -->
					<div class="col-xs-12 col-md-8">
						<div class="form-group">
							<label for="email" class="control-label">email</label>
							<input id="email" name="email" type="text" class="form-control text-uppercase" readonly value="<?= $mail?>">
						</div><!-- .form-group -->
					</div><!-- .col -->
					<div class="col-xs-12 col-md-2">
						<div class="form-group">
							<label for="zona" class="control-label">Zona</label>
							<input id="zona" name="zona" type="text" class="form-control text-uppercase" readonly value="<?= $id_zona ?>">
						</div><!-- .form-group -->
					</div><!-- .col -->
				</div><!-- .row -->



			</div><!-- .panel-body -->
		</div><!-- .panel -->

	</div><!-- .container -->
</section>
