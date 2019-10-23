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
                    <form  method="post" id="formulario" action="<?=base_url()?>Prestamos/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Personas</label>
                            <div class="col-sm-3">
                                <input  type="radio" required checked name="tipo"  id="estudiante" value="ESTUDIANTE" >ESTUDIANTE
                                <input  type="radio" required name="tipo"  id="profesor" value="PROFESOR" > PROFESOR
                            </div>
                            <label class="col-sm-1" >Tipo</label>
                            <div class="col-sm-3">
                                <input  type="radio" required checked name="presta" id="sala"  value="SALA" >SALA
                                <input  type="radio" required name="presta" id="domicilio"  value="DOMICILIO" > DOMICILIO
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Libro</label>
                            <div class="col-sm-3">
                                <input  type="text" required autofocus name="libro" class="form-control" id="libro" >
                            </div>
                            <div class="col-sm-8" id="datoslibro"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Persona</label>
                            <div class="col-sm-3">
                                <input  type="text" required name="codigo" class="form-control" id="codigo" >
                            </div>
                            <div class="col-sm-8" id="datospersona"></div>
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
                <th>id</th>
                <th>Fecha</th>
                <th>Cod. libro</th>
                <th>Libro</th>
                <th>Persona</th>
                <th>Estado</th>
                <th>Dias Pres</th>
                <th>Fecha devuelto</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT p.fecha,l.titulo, p.id,p.estado,p.fechadevo,p.tipo,idprestamo,l.codigo
FROM prestamo p 
INNER JOIN libro l ON p.idlibro=l.idlibro
WHERE date(p.fecha)=date(now()) OR p.estado='PRESTADO'");
            foreach ($query->result() as $row){
                if ($row->tipo=='ESTUDIANTE'){
                    $row2=$this->db->query("SELECT * FROM estudiante WHERE idestudiante='$row->id'")->row();
                    $nombre=$row2->nombre;
                }else{
                    $row2=$this->db->query("SELECT * FROM profesor WHERE idprofesor='$row->id'")->row();
                    $nombre=$row2->nombre;
                }
            if ($row->estado=='PRESTADO'){
                $p="<p class='alert alert-warning p-1' role='alert'>$row->estado</p>";
                $bo="<a href='".base_url()."Prestamos/boleta/$row->idprestamo' target='_blank' class='btn btn-info p-1'> <i class='fa fa-print'></i>Boleta </a>
                        <a href='".base_url()."Prestamos/devolver/$row->idprestamo' class=' devolver btn btn-success p-1'> <i class='fa fa-desktop'></i>Devolver </a>";
            }else{
                $p="<p class='alert alert-success p-1' role='alert'>$row->estado</p>";
                $bo="";
            }

                $tipo=substr($row->tipo,0,1);
                if ($row->fechadevo=="0000-00-00 00:00:00"){
                    $fv="";
                    $date2 = new DateTime(date('Y-m-d'));
                }else{
                    $fv=$row->fechadevo;
                    $date2 = new DateTime($row->fechadevo);
                }
                $date1 = new DateTime($row->fecha);

                $diff = $date1->diff($date2);
                echo "<tr>
                    <td>$row->idprestamo</td>
                    <td>$row->fecha</td>
                    <td>$row->codigo</td>
                    <td>$row->titulo</td>
                    <td>$nombre -$tipo</td>
                    <td>$p</td>
                    <td>".($diff->days + 1)."</td>
                    <td>$fv</td>
                    <td>
                     $bo   
                    </td>
                </tr>";
            }
            ?>

            </tbody>
        </table>
</div>


<script !src="">
    window.onload=function (e) {
        $('.devolver').click(function (e) {
            if (!confirm("Seguro de devolver?")){
                e.preventDefault();
            }
        });
        $('#estudiante,#profesor,#sala,#domicilio').click(function (e) {
            $('#libro').val('');
            $('#codigo').val('');
            $('#datospersona').html('');
            $('#datoslibro').html('');
        });
        $('#formulario').submit(function (e) {
            if ($('#datospersona').html()=="" || $('#datoslibro').html()==""){
                alert('Datos no encontrados');
                return false;
            }
            // e.preventDefault();
            // console.log($('#datospersona').html()=="");
            // return false;
        });
        $('#libro2').keyup(function (e) {
            console.log(e.which);
            e.preventDefault();
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
        });
        $('#libro').keydown(function (e) {
            // console.log($(this).val());
            if( e.keyCode == 13 || e.keyCode == 17 || e.keyCode == 74 || e.keyCode == 32 ){
                e.preventDefault();
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
            }else{
                $('#datoslibro').html('');
            }
            // console.log(e.which);
            // e.preventDefault();

            // e.preventDefault();
        });
        // $('#codigo2').keyup(function (e) {
        //     console.log(e.which);
        //     e.preventDefault();
        //     if ($('#estudiante').is(':checked')){
        //         var tipo="ESTUDIANTE";
        //     }else {
        //         var tipo="PROFESOR";
        //     }
        //     $.ajax({
        //         url:'Prestamos/datestudiante/'+$(this).val().trim()+'/'+tipo,
        //         success:function (e) {
        //             // console.log(e);
        //             if (e.length>2){
        //                 var datos=JSON.parse(e)[0];
        //                 $('#datospersona').html("<b>Nombre=</b>"+datos.nombre);
        //             }else{
        //                 $('#datospersona').html('');
        //             }
        //         }
        //     });
        // });
        $('#codigo').keydown(function (e) {
            if( e.keyCode == 13 || e.keyCode == 17 || e.keyCode == 74 || e.keyCode == 32 ){
                e.preventDefault();
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
            }else{
                // console.log(e.which);
                $('#datospersona').html('');
            }

            // e.preventDefault();
        });
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
