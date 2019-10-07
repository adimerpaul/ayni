<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1 mb-2" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-user"></i> Registrar Profesor
    </button>

    <!-- Modal -->
    <style>
        .modal-lg{
            min-width: 99%;
        }
    </style>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="<?=base_url()?>Profesores/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Colegio</label>
                            <div class="col-sm-3">
                                <select name="colegio" class="form-control" id="colegio" required>
                                    <option value="">Selecionar..</option>
                                    <option value="JUANA AZURDUY DE PADILLA">JUANA AZURDUY DE PADILLA</option>
                                    <option value="GUIDO VILLAGOMEZ">GUIDO VILLAGOMEZ</option>
                                </select>
                            </div>
                            <label class="col-sm-1" >Nombre Completo</label>
                            <div class="col-sm-3">
                                <input type="text" required name="nombre" id="nombre" class="form-control" placeholder="Nombres apellidos">
                            </div>
                            <label class="col-sm-1" >Celular</label>
                            <div class="col-sm-3">
                                <input type="text" required name="celular" class="form-control" placeholder="celular">
                            </div>
                            <label class="col-sm-1" >Su cogido sera</label>
                            <div class="col-sm-3">
                                <input type="text" name="id" id="codigo" class="form-control" >
                            </div>
                            <label class="col-sm-1" >Usuario</label>
                            <div class="col-sm-3">
                                <input type="text" required name="usuario" id="usuario" class="form-control" placeholder="usuario">
                            </div>
                            <label class="col-sm-1">Profesion</label>
                            <div class="col-sm-3">
                            <select name="profesion" id="profesion" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <?php
                                $query=$this->db->query("SELECT profesion FROM  profesor GROUP  BY profesion");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->profesion'>$row->profesion</option>";
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Fotografia</label>
                            <div class="col-sm-3">
                                <input type="file" required name="foto" class="form-control" placeholder="Apellido nombres">
                            </div>
                            <div class="col-sm-8"><span class="alert alert-warning">La foto deve ser en PNG y un tamaño de 77x93 Y se guardara con el nombre de su codigo</span></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Colegio</th>
            <th>Profesion</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query=$this->db->query("SELECT * FROM profesor WHERE nombre!='AYNI'");
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->id</td>
                    <td>$row->nombre</td>
                    <td>$row->colegio</td>
                    <td>$row->profesion </td>
                    <td>$row->fecha</td>
                    <td>
                        <a href='".base_url()."Profesores/target/$row->idprofesor' target='_blank' class='btn btn-warning p-1'> <i class='fa fa-camera-retro'></i> Credencial</a>
                        <button class='btn btn-info p-1' data-codigo='$row->idprofesor' data-toggle='modal' data-target='#modificar'> <i class='fa fa-pencil-square-o'></i> Modificar</button>                       
                    </td>
                </tr>";
        }
        ?>

        </tbody>
    </table>
</div>

<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post" action="<?=base_url()?>Profesores/update" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-1" >Colegio</label>
                        <div class="col-sm-3">
                            <input type="text" id="idprofesor2" hidden name="idprofesor">
                            <select name="colegio" class="form-control" id="colegio2" required>
                                <option value="">Selecionar..</option>
                                <option value="JUANA AZURDUY DE PADILLA">JUANA AZURDUY DE PADILLA</option>
                                <option value="GUIDO VILLAGOMEZ">GUIDO VILLAGOMEZ</option>
                            </select>
                        </div>
                        <label class="col-sm-1" >Nombre Completo</label>
                        <div class="col-sm-3">
                            <input type="text" required name="nombre" id="nombre2" class="form-control" placeholder="Nombres apellidos">
                        </div>
                        <label class="col-sm-1" >Celular</label>
                        <div class="col-sm-3">
                            <input type="text" required name="celular" id="celular2" class="form-control" placeholder="celular">
                        </div>
                        <label class="col-sm-1" >Su cogido sera</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="codigo2"  class="form-control" >
                        </div>
                        <label class="col-sm-1" >Usuario</label>
                        <div class="col-sm-3">
                            <input type="text" required name="usuario" id="usuario2" class="form-control" placeholder="usuario">
                        </div>
                        <label class="col-sm-1">Profesion</label>
                        <div class="col-sm-3">
                            <select name="profesion" id="profesion2" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <?php
                                $query=$this->db->query("SELECT profesion FROM  profesor GROUP  BY profesion");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->profesion'>$row->profesion</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-1" >Fotografia</label>
                        <div class="col-sm-3">
                            <input type="file" name="foto" class="form-control" placeholder="Apellido nombres">
                        </div>
                        <div class="col-sm-8"><span class="alert alert-warning">La foto deve ser en PNG y un tamaño de 77x93 Y se guardara con el nombre de su codigo</span></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script !src="">
    window.onload=function (e) {
        $('#modificar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var codigo = button.data('codigo') // Extract info from data-* attributes
            $.ajax({
                url: 'Profesores/datos/'+codigo,
                success:function (e) {
                    var datos=JSON.parse(e)[0];
                    console.log(datos);
                    $('#colegio2').val(datos.colegio);
                    $('#nombre2').val(datos.nombre);
                    $('#celular2').val(datos.celular);
                    $('#codigo2').val(datos.id);
                    $('#usuario2').val(datos.usuario);
                    $('#profesion2').val(datos.profesion);
                    $('#idprofesor2').val(datos.idprofesor);
                }
            });
        })
        $('#colegio').change(function (e) {

            $.ajax({
                url:'Profesores/consulta/'+$(this).val(),
                success:function (e) {
                    $('#codigo').val(pre+e);
                }
            })
            e.preventDefault();
        });
        $('#nombre').keyup(function (e) {
            if ($(this).val().indexOf(" ")!=-1){
                $('#usuario').val($(this).val().substring(0,$(this).val().indexOf(" ")));
            }else {
                $('#usuario').val('');
            }
            e.preventDefault();
        });
        $('#example').DataTable({
            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

    }
</script>
