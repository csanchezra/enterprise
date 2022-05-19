<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?= $titulo ?></title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
            font-size: 15px;
            width: 17.7cm;
            padding: 0;
            margin: 0;
        }

        .container {
            padding: 0 3mm 0 0;
            margin: 0;
        }

        .head-logo {
            width: 50mm;
            height: auto;
            display: inline;
        }



        .table-border {
            font-family: 'Rubik', sans-serif;
            font-size: 16px;
            font-weight: 500;
            background-color: #eeeeee !important;
            border: none;
            border-radius: 4mm;
            padding: 2mm 5mm 3mm 5mm;
            line-height: 4mm;
            text-align: left;
            color: #2d2d2d;
            text-align: center;
        }


        .table-report {
            font-size: 13px;
            width: 105%;
        }

        .table-report thead,
        .table-report thead tr {
            border-bottom: 0 !important;
        }

        .table-report thead tr th {
            font-size: 12px;
            line-height: 2mm;
            text-align: center;
            vertical-align: middle;
            border-bottom: 0 !important;
            padding-right: 6mm;
        }

        .table-report thead tr th.bg-arrow-1 {
            background-color: #2d2d2d;
            background-image: url("<?= $arrow_1 ?>");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right;
            color: #ffffff;
        }

        .table-report thead tr th.bg-arrow-2 {
            background-color: #2d2d2d;
            color: #ffffff;
        }

        .table-report tbody tr td {
            line-height: 3mm;
            vertical-align: middle;
            padding-top: 3mm;
            padding-bottom: 3mm;
        }


    </style>

</head>

<body>
    <!-- <div id="overlay"> -->
    <div class="container">
      <div class="row">

        <div class="alert alert-info alert-title mb-0" role="alert" style="text-align: center;">
          <?= $titulo ?>
        </div>

        <br>

      <div class="col-xs-12">
          <table class="table table-striped table-report alert alert-info table-border">
              <thead>
                  <tr style="background-color:#414143">
                      <td style="text-align:center" width="33%" height="28px">
                          <font color="white"><b>Zona</b></font>
                      </td>
                      <td style="text-align:center" width="33%" height="28px">
                          <font color="white"><b>Total producto</b></font>
                      </td>
                      <td style="text-align:center" width="33%" height="28px">
                          <font color="white"><b>Producto</b></font>
                      </td>
                      </td>
                  </tr>
              </thead>
              <tbody>
                  <?php $contador = 1;
                  if (!empty($array_datos)) {
                      foreach ($array_datos as $key => $grupos) {
                          // $pdf->SetFont('arial', '', 8);
                          $zona = $grupos['zona'];
                          $ventas = $grupos['ventas'];
                          $producto = $grupos['producto'];


                          if ($contador % 2 == 0) {
                              $color = "#F7F9F9";
                          } else {
                              $color = "#FFFFFF";
                          }
                  ?>

                          <tr bgcolor="<?= $color ?>">
                              <td style="text-align:center" height="18px">&nbsp;<?= $zona ?></td>
                              <td style="text-align:center" height="18px"><?= $ventas ?></td>
                              <td style="text-align:center" height="18px"><?= $producto ?></td>
                          </tr>
                      <?php
                          $contador++;
                      }
                  } else { ?>
                      <tr bgcolor="#FFFFFF">
                          <td style="text-align:center" height="18px" colspan="7">No hay datos para mostrar</td>
                      </tr>
                  <?php  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
