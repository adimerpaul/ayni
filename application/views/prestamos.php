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
                            <label class="col-sm-1" >Tipo</label>
                            <div class="col-sm-3">
                                <input  type="radio" required  name="presta" id="sala"  value="SALA" >SALA
                                <input  type="radio" required checked name="presta" id="domicilio"  value="DOMICILIO" > DOMICILIO
                            </div>
                            <div class="col-sm-8">
                                <b>Cantidad sala disp</b> <span id="cantidadsala">0</span>
                                <b>Cantidad domici disp</b> <span id="cantidaddomicilio">0</span>
                                <b>Cantidad selecc.</b> <span id="seleccionadas">0</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Persona</label>
                            <div class="col-sm-3">
                                <input  type="text" required autofocus name="codigo" class="form-control" id="codigo" >
                            </div>
                            <div class="col-sm-8" id="datospersona"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Libro</label>
                            <div class="col-sm-3">
                                <input  type="text"   name="libro" class="form-control" id="libro" >
                            </div>
                            <div class="col-sm-8" id="datoslibro"></div>
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
                <th width="25%">Libro</th>
                <th>Persona</th>
                <th>Estado</th>
                <th>Dias Pres</th>
                <th>Fecha devuelto</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("
      SELECT lote,persona,fecha,persona,fechadevo,estado,tipo,count(*)  as cantidad FROM `prestamo`            
WHERE date(fecha)=date(now()) OR estado='PRESTADO'
GROUP BY persona,fecha,persona,estado,fechadevo,estado,tipo");
            foreach ($query->result() as $row){
            if ($row->estado=='PRESTADO'){
                $p="<p class='alert alert-warning p-1' role='alert'>$row->estado</p>";
                $bo="<a href='".base_url()."Prestamos/boleta/$row->lote' target='_blank' class='btn btn-info p-1'> <i class='fa fa-print'></i>Boleta </a>
                        <a href='".base_url()."Prestamos/devolver/$row->lote' class=' devolver btn btn-success p-1'> <i class='fa fa-desktop'></i>Devolver </a>";
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
                $query2=$this->db->query("SELECT * FROM prestamo WHERE lote='$row->lote' ORDER BY idprestamo");
                $codigos="";
                $libros="";
                foreach ($query2->result() as $row2){
                    $codigos=$codigos.$row2->codigolibro.'<br>';
                    $libros=$libros.$row2->titulo.'<br>';
                }

                echo "<tr>
                    <td>$row->lote</td>
                    <td>$row->fecha</td>
                    <td><div style='border: 0px;margin: 0px;padding: 0px;font-size: 10px'>$codigos</div></td>
                    <td><div style='border: 0px;margin: 0px;padding: 0px;font-size: 10px'>$libros</div></td>
                    <td>$row->persona</td>
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
        // $('#libro2').keyup(function (e) {
        //     console.log(e.which);
        //     e.preventDefault();
        //     $.ajax({
        //         url:'Prestamos/datlibro/'+$(this).val().trim(),
        //         success:function (e) {
        //             if (e.length>2){
        //                 var datos=JSON.parse(e)[0];
        //                 $('#datoslibro').html("<b>Titulo=</b>"+datos.titulo+" <b>Autor=</b>"+datos.autor+" <b>Area=</b>"+datos.area+"");
        //                 $('#codigo').focus();
        //             }else{
        //                 $('#datoslibro').html('');
        //             }
        //         }
        //     });
        // });
        var cont=0;

        $("#datoslibro").on("click",".elilibro", function(){
                // console.log('a');
                cont=cont-1;
                $('#seleccionadas').html(cont);
                $(this).remove();
                return false;
                e.preventDefault();
        });

        $('#libro').keydown(function (e) {
            // console.log($(this).val());
            if(  e.keyCode == 13 || e.keyCode == 17 ){
                e.preventDefault();
            }else if (e.keyCode == 74 || e.keyCode == 32 ){
                e.preventDefault();
                $.ajax({
                    url:'Prestamos/datlibro/'+$(this).val().trim(),
                    success:function (e) {
                        if (e.length>2){

                            var datos=JSON.parse(e)[0];
                                if ($('#sala').is(':checked')){
                                   var cantidaddis=cantidadsala-cont;
                                }else {
                                   var cantidaddis=cantidaddomicilio-cont;
                                }
                            // console.log(datos);

                            if (cantidaddis<=0){
                                alert('No se pude prestar mas libros');
                            }else{
                                cont++;
                                $('#datoslibro').append("<div class='elilibro' style='padding: 0px;margin: 0px;border:0px;font-size: 13px'><b>Titulo=</b>"+datos.titulo+" <b>Codigo=</b>"+datos.codigo+" <b>Area=</b>"+datos.area+" <input value='"+datos.idlibro+"' name='l"+datos.idlibro+"' hidden > <i class='fa fa-trash'></i></div>");
                                $('#libro').val("");
                                $('#seleccionadas').html(cont);
                                $(this).focus();
                            }

                        }else{
                            // $('#datoslibro').html('');
                        }
                            // $('.elilibro').click(function (e) {
                            //     console.log('a');
                            //     cont=cont-1;
                            //     $('#seleccionadas').html(cont);
                            //     $(this).remove();
                            //     return false;
                            //     e.preventDefault();
                            // });
                            //


                    }
                });
            }else{
                // $('#datoslibro').html('');
                // console.log($(this).val());

            }
            // console.log(e.which);
            // // e.preventDefault();
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
        var cantidadsala;
        var cantidaddomicilio;
        $('#codigo').keydown(function (e) {
            if( e.keyCode == 13 || e.keyCode == 17   ){
                e.preventDefault();
                // $.ajax({
                //     url:'Prestamos/datestudiante/'+$(this).val().trim(),
                //     success:function (e) {
                //         // console.log(e);
                //         if (e.length>2){
                //             var datos=JSON.parse(e)[0];
                //             $('#datospersona').html("<b>Nombre=</b>"+datos.nombre);
                //         }else{
                //             $('#datospersona').html('');
                //         }
                //     }
                // });
            }else if( e.keyCode == 74 || e.keyCode == 32) {
                if ($(this).val().length<=4){
                }else{
                    e.preventDefault();
                    $.ajax({
                        url:'Prestamos/datestudiante/'+$(this).val().trim(),
                        success:function (e) {
                            // console.log(e);
                            var datos=JSON.parse(e)[0];
                            var tipo=JSON.parse(e)['tipo'];
                            cantidadsala=JSON.parse(e)['cantidadsala'];
                            cantidaddomicilio=JSON.parse(e)['cantidaddomicilio'];
                            $('#cantidadsala').html(cantidadsala);
                            $('#cantidaddomicilio').html(cantidaddomicilio);
                            cont=0;
                            // console.log(e);
                            if (e.length>2){
                                // var datos=JSON.parse(e)[0];
                                $('#datospersona').html("<b>Nombre=</b>"+datos.nombre+'  <b>'+tipo+'</b>');
                                $('#libro').focus();
                            }else{
                                $('#datospersona').html('');
                            }
                        }
                    });
                }
            }else{
                // console.log(e.which);
                $('#datospersona').html('');
            }

            // e.preventDefault();
        });
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#codigo').focus();
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
