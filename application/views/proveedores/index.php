<head>
    <title>Proveedores</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>



    <div class="container">
        <h2>Proveedores</h2>


        <table id="item-list" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>CUIT</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>

        <div class="panel-footer">
          <a href="<?= base_url('Proveedores/create') ?>" type="button" name="button" class="btn btn-warning" id="btn_nuevo">Nuevo proveedor</a>
        </div>

    </div>




<script type="text/javascript">
    $(document).ready(function() {
        $('#item-list').DataTable({
            "ajax": {
                url: "get_items",
                type: 'GET'
            },

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
            },
        });
    });

</script>



</html>
