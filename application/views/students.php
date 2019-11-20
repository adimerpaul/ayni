<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1 mb-2" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-user-secret"></i> Registrar Estudiante
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
                    <form  method="post" action="<?=base_url()?>Students/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2" >Colegio</label>
                            <div class="col-sm-4">
                                <?php if ($colegio=='AYNI'): ?>
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

                            <label class="col-sm-2" >Categoria</label>
                            <div class="col-sm-4">
                            <select name="categoria" id="categoria" class="form-control" required>
                                <option value="">Selecionar..</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="SECUNDARIA">SECUNDARIA</option>
                            </select>
                            </div>
                            <label class="col-sm-2">Nivel</label>
                            <div class="col-sm-4">
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
                            <label class="col-sm-2" >Paralelo</label>
                            <div class="col-sm-4">
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
                            <label class="col-sm-2" >Nombre Completo</label>
                            <div class="col-sm-4">
                                <input type="text"  name="nombre" id="nombre" class="form-control" placeholder="Apellido nombres">
                                <small class="alert alert-success p-0">Cantidad libres de carateres <span id="cantidad">40</span></small>
                            </div>
                            <label class="col-sm-2" >Prefijo</label>

                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text" name="pre" id="pre" class="form-control" >
                                </div>
                            <?php else:?>
                            <?php
                             $pre=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio'")->row()->pre;
                             ?>
                            <div class="col-sm-4">
                                <input type="text" name="pre" id="pre" value="<?=$pre?>" hidden>
                                <label ><?=$pre?></label>
                            </div>
                            <?php endif;?>

                            <label class="col-sm-2" >Codigo</label>
                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text" name="id" id="codigo" class="form-control" >
                                    <span id="veri" class="alert alert-danger p-0"></span>
                                </div>
                            <?php else:?>
                                <?php
                                $cantidad=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio'")->num_rows();
                                $codigo=$pre.($cantidad+1001)."E";
                                ?>
                                <div class="col-sm-4">
                                    <input type="text" name="id" id="codigo" value="<?=$codigo?>" hidden>
                                    <label ><?=$codigo?></label>
                                </div>
                            <?php endif;?>

                            <label class="col-sm-2" >Telefono</label>

                            <?php if ($colegio=='AYNI'): ?>
                                <div class="col-sm-4">
                                    <input type="text" id="telefono" name="telefono" class="form-control" placeholder="52-11111">
                                </div>
                            <?php else:?>
                                <?php
                                $telefono=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio'")->row()->telefono;
                                ?>
                                <div class="col-sm-4">
                                    <input type="text" name="telefono" id="telefono" value="<?=$telefono?>" hidden>
                                    <label ><?=$telefono?></label>
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
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <form action="<?=base_url()?>Students/Kardex" method="post" target="_blank">
        <?php if ($_SESSION['profesion']=="Directora" || $_SESSION['profesion']=="Director" || $_SESSION['profesion']=="AYNI"):?>
            <button type="submit" class="btn btn-info p-1" >
                <i class="fa fa-camera"></i> Imprimir codigos
            </button>
        <?php endif;?>
        orden:
        <select name="orden" >
            <option value="fecha">fecha</option>
            <option value="nombre">nombre</option>
            <option value="nivel">curso</option>
        </select>
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <td><input type="checkbox" id="selectall"/>ALL</td>
            <th>Fecha</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Colegio</th>
            <th>Curso</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM estudiante");
        }else{
            $query=$this->db->query("SELECT * FROM estudiante WHERE colegio='$colegio'");
        }
        foreach ($query->result() as $row){
            if ($row->estado=="INACTIVO"){
                $in="";
                $ba="<a href='".base_url()."Students/alta/$row->idestudiante'  class='btn btn-warning p-1'> <i class='fa fa-upload'></i> Dar Alta</a>";
            }else{
                $in="<input type='checkbox' name='c$row->id' class='case'>";
                $ba="<button type='button' class='btn btn-info p-1' data-codigo='$row->idestudiante' data-toggle='modal' data-target='#modificar'> <i class='fa fa-pencil-square-o'></i> Modificar</button>
<a href='".base_url()."Students/baja/$row->idestudiante'  class='confirmar btn btn-danger p-1'> <i class='fa fa-close'></i> Dar Baja</a>";
            }
            echo "<tr>
                    <td>$in</td>
                    <td>$row->fecha</td>
                    <td>$row->id</td>
                    <td>$row->nombre</td>
                    <td>$row->colegio</td>
                    <td>$row->categoria $row->nivel $row->paralelo </td>
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
                        <label class="col-sm-1" >Codigo</label>
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
                        <button type="submit" class="btn btn-warning">Modificar</button>
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
        $('#foto2').change(function (e) {
            $("#fotografia2").attr("src", 'fotos/person.png');
            var formData = new FormData();
            var files = $('#foto2')[0].files[0];
            formData.append('file',files);
            $.ajax({
                url: 'Students/subir',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // console.log(response);
                    if (response != 0) {
                        $("#fotografia2").attr("src", response);
                    } else {
                        alert('Formato de imagen incorrecto.');
                    }
                }
            });
            e.preventDefault();
        });
        $('#nombre').keyup(function (e) {
            $('#cantidad').html(40-parseInt($(this).val().length));
            $(this).val($(this).val().toUpperCase());
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
                url: 'Students/datos/'+codigo,
                success:function (e) {
                    var datos=JSON.parse(e)[0];
                    // console.log(datos);
                    $('#idestudiante2').val(datos.idestudiante);
                    $('#categoria2').val(datos.categoria);
                    $('#colegio2').val(datos.colegio);
                    $('#codigo2').val(datos.id);
                    $('#nivel2').val(datos.nivel);
                    $('#categoria2').val(datos.categoria);
                    $('#paralelo2').val(datos.paralelo);
                    $('#nombre2').val(datos.nombre);
                    $('#telefono2').val(datos.telefono);
                    $('#archivo').html('fotos/'+datos.id+'.png');
                    $("#fotografia2").attr("src", 'fotos/'+datos.id+'.png');
                }
            });
        })
        $('#pre').keyup(function (e) {
            $('#codigo').val($('#pre').val()+''+num);
        });
        var num;
        $('#colegio2,#nombre2').keyup(function (e) {
            $(this).val($(this).val().toUpperCase());
        });
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
                            $('#codigo').val(pre+num+'E');
                            // console.log('a');
                            $.ajax({
                                url:'Students/telefono/'+$('#colegio').val().trim(),
                                success:function (e) {
                                    $('#telefono').val(e);
                                    // console.log('a');
                                }
                            })
                            $.ajax({
                                url:'Students/verificar/'+$('#codigo').val().trim(),
                                success:function (e) {
                                    // console.log(e);
                                    $('#veri').html(e);
                                }
                            })
                        }
                    })
                }
            })

            e.preventDefault();
        });
        $('#codigo').keyup(function (e) {
            // console.log($(this).val());
            $.ajax({
                url:'Students/verificar/'+$('#codigo').val().trim(),
                success:function (e) {
                    // console.log(e);
                    $('#veri').html(e);
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
            "order": [[ 1, "desc" ]]
        });

    }
</script>
