<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1 mb-2" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-user-secret"></i> Registrar Estudiante
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
                    <form  method="post" action="<?=base_url()?>Students/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Colegio</label>
                            <div class="col-sm-3">
                                <select name="colegio" class="form-control" id="colegio" required>
                                    <option value="">Selecionar..</option>
                                    <option value="JUANA AZURDUY DE PADILLA">JUANA AZURDUY DE PADILLA</option>
                                    <option value="GUIDO VILLAGOMEZ">GUIDO VILLAGOMEZ</option>
                                </select>
                            </div>
                            <label class="col-sm-1" >Categoria</label>
                            <div class="col-sm-3">
                            <select name="categoria" id="categoria" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="SECUNDARIA">SECUNDARIA</option>
                            </select>
                            </div>
                            <label class="col-sm-1">Nivel</label>
                            <div class="col-sm-3">
                            <select name="nivel" id="nivel"  class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="Primero">Primero</option>
                                <option value="Segundo">Segundo</option>
                                <option value="Tercero">Tercero</option>
                                <option value="Cuarto">Cuarto</option>
                                <option value="Quinto">Quinto</option>
                                <option value="Sexto">Sexto</option>
                            </select>
                            </div>
                            <label class="col-sm-1" >Paralelo</label>
                            <div class="col-sm-3">
                            <select name="paralelo" id="paralelo" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select>
                            </div>
                            <label class="col-sm-1" >Nombre Completo</label>
                            <div class="col-sm-3">
                                <input type="text" name="nombre" class="form-control" placeholder="Apellido nombres">
                            </div>
                            <label class="col-sm-1" >Su cogido sera</label>
                            <div class="col-sm-3">
                                <input type="text" name="id" id="codigo" class="form-control" >
                            </div>
                            <label class="col-sm-1" >Telefono</label>
                            <div class="col-sm-3">
                                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="telefono">
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
            <th>Curso</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query=$this->db->query("SELECT * FROM estudiante");
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->id</td>
                    <td>$row->nombre</td>
                    <td>$row->colegio</td>
                    <td>$row->categoria $row->nivel $row->paralelo </td>
                    <td>$row->fecha</td>
                    <td>
                        <a href='".base_url()."Students/target/$row->idestudiante' target='_blank' class='btn btn-warning p-1'> <i class='fa fa-camera-retro'></i> Credencial</a>
                        <button class='btn btn-info p-1' data-codigo='$row->idestudiante' data-toggle='modal' data-target='#modificar'> <i class='fa fa-pencil-square-o'></i> Modificar</button>                       
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
                <form  method="post" action="<?=base_url()?>Students/update" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-1" >Colegio</label>
                        <div class="col-sm-3">
                            <input type="text" name="idestudiante" id="idestudiante2" hidden>
                            <select name="colegio" class="form-control" id="colegio2" required>
                                <option value="">Selecionar..</option>
                                <option value="JUANA AZURDUY DE PADILLA">JUANA AZURDUY DE PADILLA</option>
                                <option value="GUIDO VILLAGOMEZ">GUIDO VILLAGOMEZ</option>
                            </select>
                        </div>
                        <label class="col-sm-1" >Categoria</label>
                        <div class="col-sm-3">
                            <select name="categoria" id="categoria2" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="SECUNDARIA">SECUNDARIA</option>
                            </select>
                        </div>
                        <label class="col-sm-1">Nivel</label>
                        <div class="col-sm-3">
                            <select name="nivel" id="nivel2"  class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="Primero">Primero</option>
                                <option value="Segundo">Segundo</option>
                                <option value="Tercero">Tercero</option>
                                <option value="Cuarto">Cuarto</option>
                                <option value="Quinto">Quinto</option>
                                <option value="Sexto">Sexto</option>
                            </select>
                        </div>
                        <label class="col-sm-1" >Paralelo</label>
                        <div class="col-sm-3">
                            <select name="paralelo" id="paralelo2" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select>
                        </div>
                        <label class="col-sm-1" >Nombre Completo</label>
                        <div class="col-sm-3">
                            <input type="text" name="nombre" id="nombre2" class="form-control" placeholder="Apellido nombres">
                        </div>
                        <label class="col-sm-1" >Su cogido sera</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="codigo2" class="form-control" >
                        </div>
                        <label class="col-sm-1" >Telefono</label>
                        <div class="col-sm-3">
                            <input type="text" id="telefono2" name="telefono" class="form-control" placeholder="telefono">
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
                        <button type="submit" class="btn btn-warning">Modificar</button>
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
                url: 'Students/datos/'+codigo,
                success:function (e) {
                    var datos=JSON.parse(e)[0];
                    console.log(datos);
                    $('#idestudiante2').val(datos.idestudiante);
                    $('#categoria2').val(datos.categoria);
                    $('#colegio2').val(datos.colegio);
                    $('#codigo2').val(datos.id);
                    $('#nivel2').val(datos.nivel);
                    $('#categoria2').val(datos.categoria);
                    $('#paralelo2').val(datos.paralelo);
                    $('#nombre2').val(datos.nombre);
                    $('#telefono2').val(datos.telefono);
                }
            });
        })
        $('#colegio').change(function (e) {
            if ($(this).val()=="JUANA AZURDUY DE PADILLA"){
                pre='JA';
                $('#telefono').val('52-52147');
            }else{
                pre='GV';
                $('#telefono').val('52-123456')
            }
            $.ajax({
                url:'Students/consulta/'+$(this).val(),
                success:function (e) {
                    $('#codigo').val(pre+e);
                }
            })
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
