<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1 mb-2" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-user"></i> Registrar Profesor
    </button>

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
                            <label class="col-sm-2" >Colegio</label>
                            <div class="col-sm-4">
                                <?php
                                if ($colegio=='AYNI'):
                                    ?>
                                    <input list="colegios" type="text" name="colegio" class="form-control" id="colegio" required>
                                    <datalist id="colegios">
                                        <?php
                                        $query=$this->db->query("SELECT colegio FROM libro GROUP BY colegio");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->colegio'>";
                                        }
                                        ?>
                                    </datalist>
                                <?php else:?>
                                    <input type="text" name="colegio" id="colegio" value="<?=$colegio?>" hidden>
                                    <label ><?=$colegio?></label>
                                <?php endif;?>
                            </div>
                            <label class="col-sm-2" >Telefono unidad</label>

                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text"  name="celular" id="celular" class="form-control" placeholder="celular">
                                </div>
                            <?php else:?>
                                <?php
                                $celular=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'")->row()->celular;
                                ?>
                                <div class="col-sm-4">
                                    <input type="text" name="celular" id="celular" value="<?=$celular?>" >

                                </div>
                            <?php endif;?>
                            <label class="col-sm-2" >Nombre Completo</label>
                            <div class="col-sm-4">
                                <input type="text" required name="nombre" id="nombre" class="form-control" placeholder="Nombres apellidos">
                            </div>
                            <label class="col-sm-2" >Usuario</label>
                            <div class="col-sm-4">
                                <input type="text" required name="usuario" id="usuario" class="form-control" placeholder="usuario">
                            </div>
                            <label class="col-sm-2">Cargo</label>
                            <div class="col-sm-4">
                                <input list="profesiones" type="text" name="profesion" class="form-control" id="profesion" required>
                                <datalist id="profesiones">
                                    <?php
                                    $query=$this->db->query("SELECT profesion FROM profesor WHERE profesion<>'AYNI' GROUP BY profesion");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->profesion'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-2" >Prefijo</label>
                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text" name="pre" id="pre" class="form-control" >
                                </div>
                            <?php else:?>
                                <?php
                                $pre=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'")->row()->pre;
                                ?>
                                <div class="col-sm-4">
                                    <input type="text" name="pre" id="pre" value="<?=$pre?>" hidden>
                                    <label ><?=$pre?></label>
                                </div>
                            <?php endif;?>
                            <label class="col-sm-2" >Su cogido sera</label>
<!--                            <div class="col-sm-4">-->
<!--                                <input type="text" name="id" id="codigo" class="form-control" >-->
<!--                            </div>-->
                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text" name="id" id="codigo" class="form-control" >
                                </div>
                            <?php else:?>
                                <?php
                                $cantidad=$this->db->query("SELECT * FROM profesor WHERE colegio='$colegio'")->num_rows();
                                $codigo=$pre.($cantidad+1001)."P";
                                ?>
                                <div class="col-sm-4">
                                    <input type="text" name="id" id="codigo" value="<?=$codigo?>" hidden>
                                    <label ><?=$codigo?></label>
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-1" >Fotografia</label>
                            <div class="col-sm-5">
                                <input type="file" id="foto" required name="foto" class="form-control" placeholder="Apellido nombres">
                            </div>
                            <div class="col-sm-1"><img src="<?=base_url()?>fotos/person.png" id="fotografia" ></div>
                            <div class="col-sm-5"><span class="alert alert-danger">FORMATO PNG;TAMAÑO 77x93</span></div>
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
    <form action="<?=base_url()?>Profesores/Kardex" method="post" target="_blank">
        <?php if ($_SESSION['profesion']=="Directora" || $_SESSION['profesion']=="Director" || $_SESSION['profesion']=="AYNI"):?>
            <button type="submit" class="btn btn-info p-1" >
                <i class="fa fa-camera"></i> Imprimir codigos
            </button>
        <?php endif;?>
        <select name="orden" >
            <option value="fecha">fecha</option>
            <option value="nombre">nombre</option>
        </select>

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th><input type="checkbox" id="selectall"/>ALL</th>
            <th>Fecha</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Colegio</th>
            <th>Profesion</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM profesor WHERE nombre!='AYNI'");
        }else{
            $query=$this->db->query("SELECT * FROM profesor WHERE nombre!='AYNI' AND colegio='$colegio'");
//            $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio'");
        }

        foreach ($query->result() as $row){
            if ($row->estado=="INACTIVO"){
                $in="";
                $ba="<a href='".base_url()."Profesores/alta/$row->idprofesor'  class='btn btn-warning p-1'> <i class='fa fa-upload'></i> Dar Alta</a>";
            }else{
                $in="<input type='checkbox' name='c$row->id' class='case'>";
                $ba="<button type='button' class='btn btn-info p-1' data-codigo='$row->idprofesor' data-toggle='modal' data-target='#modificar'> <i class='fa fa-pencil-square-o'></i> Modificar</button>
<a href='".base_url()."Profesores/baja/$row->idprofesor'  class='confirmar btn btn-danger p-1'> <i class='fa fa-close'></i> Dar Baja</a>";
            }
            echo "<tr>
                    <td>$in</td>
                    <td>$row->fecha</td>
                    <td>$row->id</td>
                    <td>$row->nombre</td>
                    <td>$row->colegio</td>
                    <td>$row->profesion </td>
                    <td>
                    $ba                       
                    </td>
                </tr>";
        }
        ?>

        </tbody>
    </table>
    </form>
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
                                <?php
                                $query=$this->db->query("SELECT colegio FROM profesor GROUP  BY colegio");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->colegio'>$row->colegio</option>";
                                }
                                ?>
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
                            <input type="text" name="id" id="codigo2" class="form-control" >
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
                        <div class="col-sm-5">
                            <input type="file" id="foto2"  name="foto" class="form-control" placeholder="Apellido nombres">
                        </div>
                        <div class="col-sm-1"><img src="<?=base_url()?>fotos/person.png" id="fotografia2" ></div>
                        <div class="col-sm-5">
                            <span class="alert alert-danger p-0">FORMATO PNG;TAMAÑO 77x93
                            </span><br>
                            <span class="alert alert-danger p-0" id="archivo">
                            </span>
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

<script !src="">
    window.onload=function (e) {
        $("#selectall").on("click", function() {
            $(".case").attr("checked", this.checked);
            console.log(this.checked);
        });
        $('#foto').change(function (e) {
            $("#fotografia").attr("src", 'fotos/person.png');
            var formData = new FormData();
            var files = $('#foto')[0].files[0];
            formData.append('file',files);
            $.ajax({
                url: 'Students/subir',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response != 0) {
                        $("#fotografia").attr("src", response);
                    } else {
                        alert('Formato de imagen incorrecto.');
                    }
                }
            });
            e.preventDefault();
        });


        $('.confirmar').click(function (e) {
            if (!confirm("Seguro de dar de baja?")){
                e.preventDefault();
            }
        });

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
                    $('#archivo').html('fotos/'+datos.id+'.png');
                    $("#fotografia2").attr("src", 'fotos/profesores/'+datos.id+'.png');
                }
            });
        })
        $('#pre').keyup(function (e) {
            $('#codigo').val($('#pre').val()+''+num);
        });
        $('#nombre,#nombre2,#usuario,#usuario2').keyup(function (e) {
            // console.log($(this).val());
            $(this).val($(this).val().toUpperCase());
        });
        $('#pre').keyup(function (e) {
            $('#codigo').val($('#pre').val()+''+num);
        });
        var num;
        $('#colegio').keyup(function (e) {
            $(this).val($(this).val().toUpperCase());
            $.ajax({
                url:'Profesores/prefijo/'+$(this).val().trim(),
                success:function (e) {
                    // console.log(e);
                    $('#pre').val(e);
                    var pre=e;
                    $.ajax({
                        url:'Profesores/consulta/'+$('#colegio').val().trim(),
                        success:function (e) {
                            num=e;
                            $('#codigo').val(pre+num+'P');
                            // console.log('a');
                            $.ajax({
                                url:'Profesores/telefono/'+$('#colegio').val().trim(),
                                success:function (e) {

                                    $('#celular').val(e);
                                    // console.log('a');
                                }
                            })
                        }
                    })
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
            "order":[[1,"desc"]],
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
