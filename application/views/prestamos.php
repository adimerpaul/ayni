<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1 mb-2" id="insert" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-book"></i> Registrar Prestamos de libro
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
                    <h5 class="modal-title" id="exampleModalLabel">Registro de prestamo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="<?=base_url()?>Prestamos/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Tipo</label>
                            <div class="col-sm-3">
                                <input  type="radio" required checked name="tipo"  id="estudiante" value="ESTUDIANTE" >ESTUDIANTE
                                <input  type="radio" required name="tipo"  id="profesor" value="PROFESOR" > PROFESOR
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Libro</label>
                            <div class="col-sm-3">
                                <input  type="text" required autofocus name="libro" class="form-control" id="libro" >
                            </div>
                            <div class="col-sm-8" id="datoslibro">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Persona</label>
                            <div class="col-sm-3">
                                <input  type="text" required name="codigo" class="form-control" id="codigo" >
                            </div>
                            <div class="col-sm-8" id="datospersona">

                            </div>
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
                <th>Fecha</th>
                <th>Libro</th>
                <th>Persona</th>
                <th>Estado</th>
                <th>Fecha devuelto</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT p.fecha,l.titulo, p.id,p.estado,p.fechadevo,p.tipo,idprestamo
FROM prestamo p 
INNER JOIN libro l ON p.idlibro=l.idlibro");
            foreach ($query->result() as $row){
                if ($row->tipo=='ESTUDIANTE'){
                    $row2=$this->db->query("SELECT * FROM estudiante WHERE idestudiante='$row->id'")->row();
                    $nombre=$row2->nombre;
                }else{
                    $row2=$this->db->query("SELECT * FROM profesor WHERE idprofesor='$row->id'")->row();
                    $nombre=$row2->nombre;
                }
            if ($row->estado=='PRESTADO'){

            }else{

            }

                $tipo=substr($row->tipo,0,1);
                echo "<tr>
                    <td>$row->fecha</td>
                    <td>$row->titulo</td>
                    <td>$nombre -$tipo</td>
                    <td>$row->estado</td>
                    <td>$row->fechadevo</td>
                    <td>
                        <a href='".base_url()."Prestamos/boleta/$row->idprestamo' target='_blank' class='btn btn-info p-1'> <i class='fa fa-print'></i>Boleta </a>
                        <a href='".base_url()."Prestamos/devolver/$row->idprestamo' class=' devolver btn btn-success p-1'> <i class='fa fa-desktop'></i>Devolver </a>
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
                                <?php
                                $query=$this->db->query("SELECT colegio FROM estudiante GROUP  BY colegio");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->colegio'>$row->colegio</option>";
                                }
                                ?>
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
        $('.devolver').click(function (e) {
            if (!confirm("Seguro de devolver?")){
                e.preventDefault();
            }
        });
        $('#libro').keyup(function (e) {
            $.ajax({
               url:'Prestamos/datlibro/'+$(this).val().trim(),
                success:function (e) {
                   if (e.length>2){
                       var datos=JSON.parse(e)[0];
                       $('#datoslibro').html("<b>Titulo=</b>"+datos.titulo+" <b>Autor=</b>"+datos.autor+" <b>Area=</b>"+datos.area+"");
                       $('#codigo').focus();
                   }else{
                       $('#datoslibro').html('');
                   }
                }
            });
            e.preventDefault();
        });
        $('#codigo').keyup(function (e) {
            // console.log( $('#estudiante').is(':checked'));
            if ($('#estudiante').is(':checked')){
                var tipo="ESTUDIANTE";
            }else {
                var tipo="PROFESOR";
            }
            $.ajax({
                url:'Prestamos/datestudiante/'+$(this).val().trim()+'/'+tipo,
                success:function (e) {
                    // console.log(e);
                    if (e.length>2){
                        var datos=JSON.parse(e)[0];
                        $('#datospersona').html("<b>Nombre=</b>"+datos.nombre);
                    }else{
                        $('#datospersona').html('');
                    }
                }
            });
            e.preventDefault();
        });
        // $('#insert').click(function (e) {
        //     $('#exampleModal').modal('show');
        //     $('#libro').val('asd');
        //     $('#libro').focus();
        //     e.preventDefault();
        // });
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#libro').focus();
        });

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
        $('#pre').keyup(function (e) {
            $('#codigo').val($('#pre').val()+''+num);
        });
        var num;
        $('#colegio').keyup(function (e) {
            $(this).val($(this).val().toUpperCase());
            $.ajax({
                url:'Students/prefijo/'+$(this).val().trim(),
                success:function (e) {
                    // console.log(e);
                    $('#pre').val(e);
                    var pre=e;
                    $.ajax({
                        url:'Students/consulta/'+$('#colegio').val().trim(),
                        success:function (e) {
                            num=e;
                            $('#codigo').val(pre+num);
                            // console.log('a');
                            $.ajax({
                                url:'Students/telefono/'+$('#colegio').val().trim(),
                                success:function (e) {

                                    $('#telefono').val(e);
                                    // console.log('a');
                                }
                            })
                        }
                    })
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
            },
            "order": [[ 0, "desc" ]]
        });

    }
</script>
