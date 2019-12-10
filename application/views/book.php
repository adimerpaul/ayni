<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-book"></i> Registrar libro
    </button>
    <!-- Modal -->
    <style>
        .modal-lg{
            min-width: 98%;
        }
    </style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar libro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  method="post" action="<?=base_url()?>Book/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2" >Colegio</label>
                            <div class="col-sm-4">
                                <?php if ($colegio=='AYNI'):?>
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
                            <div class="col-sm-3">
                                <input type="number" name="nroserie" class="form-control"  placeholder="Nro Serie">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="nroalcaldia" class="form-control"  placeholder="Nro alcaldia">
                            </div>
                            <label class="col-sm-2" >Autor</label>
                            <div class="col-sm-4">
<!--                                <input type="text" name="autor" class="form-control" placeholder="Apellido nombres">-->
                                <input list="autor" name="autor" class="form-control"placeholder="Autor" required>
                                <datalist id="autor" style='margin: 0px;padding: 0px;border: 0px'>
                                    <?php
                                    $query=$this->db->query("SELECT autor FROM libro GROUP BY autor ORDER BY autor");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->autor' style='margin: 0px;padding: 0px;border: 0px'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-2" >Titulo</label>
                            <div class="col-sm-4">
                                <input list="titulos" name="titulo" class="form-control"placeholder="Titulo" required>
                                <datalist id="titulos">
                                    <?php
                                    $query=$this->db->query("SELECT titulo FROM libro GROUP BY titulo");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->titulo'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-2" >Original</label>
                            <div class="col-sm-4">
                                <select name="original" class="form-control" id="" required>
                                    <option value="">Selecionar..</option>
                                    <option value="ORIGINAL">ORIGINAL</option>
                                    <option value="FOTOCOPIA">FOTOCOPIA</option>
                                </select>
                            </div>

                            <label class="col-sm-2" >Incremento</label>
                            <div class="col-sm-4">
                                <?php
//                                $incremento=$this->db->query("SELECT *  FROM libro WHERE colegio='$colegio'")->row()->incremento;
                                $query=$this->db->query("SELECT *  FROM libro WHERE colegio='$colegio'");
                                if ($query->num_rows()>0){
                                    $incremento=$query->row()->incremento;
                                }else{
                                    $incremento='';
                                }
                                ?>
                                <?php if ($colegio=='AYNI'):?>
                                    <input type="number" name="incremento" id="incremento" class="form-control" value="<?=$incremento?>" required placeholder="Incremento">
                                <?php else:?>
                                    <input type="number" hidden name="incremento" id="incremento" class="form-control" value="<?=$incremento?>" required placeholder="Incremento">
                                    <?=$incremento?>
                                <?php endif;?>


                            </div>
                            <label class="col-sm-2" >Editorial</label>
                            <div class="col-sm-4">
                                <input type="text" name="editorial" class="form-control"  placeholder="editorial">
                            </div>
                            <label class="col-sm-2" >Año edicion</label>
                            <div class="col-sm-4">
                                <input type="number" name="anioedicion" class="form-control"  placeholder="Año Edicion">
                            </div>
                            <label class="col-sm-2" >Procedencia</label>
                            <div class="col-sm-4">
                                <input type="text" name="procedencia" class="form-control"  placeholder="Pais">
                            </div>
                            <label class="col-sm-2" >Estado</label>
                            <div class="col-sm-4">
                                <select name="estado" class="form-control" id="" required>
                                    <option value="">Selecionar..</option>
                                    <option value="Nuevo">Nuevo</option>
                                    <option value="Bueno">Bueno</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                </select>
                            </div>
                            <label class="col-sm-2">Area</label>

                            <?php if ($colegio=='AYNI'):?>
                            <div class="col-sm-2">
                                <input list="areas" type="text" name="area" class="form-control" id="area" required>
                                <datalist id="areas">
                                    <?php
                                    $query=$this->db->query("SELECT codarea,area FROM libro GROUP BY area ORDER BY codarea");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->codarea.$row->area'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="col-sm-2">
                                <input type="text" id="codarea" name="codarea" class="form-control">
                            </div>
                            <?php else:?>
                                    <div class="col-sm-4">
                                    <select name="area" class="form-control" required id="area">
                                        <option value="">Selecionar..</option>
                                        <?php
                                        $query=$this->db->query("SELECT codarea,area FROM libro GROUP BY area ORDER BY codarea");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->codarea.$row->area'>$row->codarea.$row->area</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                <?php endif;?>


                            <label class="col-sm-2">Tematica</label>

                            <?php if ($colegio=='AYNI'):?>
                                <div class="col-sm-2">
                                    <input list="tematicas" type="text" name="tematica" class="form-control" id="tematica" required>
                                    <datalist id="tematicas">
                                        <?php
                                        $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica ORDER BY tematica");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->tematica'>";
                                        }
                                        ?>
                                    </datalist>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" id="codtematica" name="codtematica" class="form-control">
                                </div>
                            <?php else:?>
                            <div class="col-sm-4">
                                    <select name="tematica" class="form-control" required id="tematica">
                                        <option value="">Selecionar..</option>
                                        <?php
                                        $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->tematica'>$row->tematica</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php endif;?>


                            <label class="col-sm-2" >Idioma</label>
                            <div class="col-sm-4">
                                <input list="idioma" name="idioma" class="form-control" placeholder="Idioma">
                                <datalist id="idioma">
                                    <?php
                                    $query=$this->db->query("SELECT idioma FROM libro GROUP BY idioma");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->idioma'>";
                                    }
                                    ?>
                                </datalist>

                            </div>
                            <label class="col-sm-2">Grado</label>
                            <div class="col-sm-4">
                                <select name="nivel" id="nivel"  class="form-control" required>
<!--                                    <option value="">Selecionar..</option>-->
                                    <option value="1">Primero</option>
                                    <option value="2">Segundo</option>
                                    <option value="3">Tercero</option>
                                    <option value="4">Cuarto</option>
                                    <option value="5">Quinto</option>
                                    <option value="6">Sexto</option>
                                    <option value="7">Septimo</option>
                                    <option value="8">Octavo</option>
                                    <option value="9">Noveno</option>
                                    <option value="10">Decimo</option>
                                    <option value="11">Undecimo</option>
                                    <option value="12">Duodecimo</option>
                                    <option value="13">Profesores</option>
                                </select>
                            </div>


                            <label class="col-sm-2" >codigo</label>
                            <div class="col-sm-4">
                                <input type="text" name="codigo" class="form-control" id="codigo" required placeholder="codigo">
                                <span class=""></span>
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
    <form action="<?=base_url()?>Book/Kardex" method="post" target="_blank">
        <?php if ($_SESSION['profesion']=="Directora" || $_SESSION['profesion']=="Director" || $_SESSION['profesion']=="AYNI"):?>
        <button type="submit" class="btn btn-info p-1" >
            <i class="fa fa-camera"></i> Imprimir codigos
        </button>
            <select name="orden" id="orden">
                <option value="fecha">fecha</option>
                <option value="titulo">titulo</option>
                <option value="autor">autor</option>
                <option value="codigo">codigo</option>
                <option value="area">area</option>
                <option value="tematica">tematica</option>
                <option value="idioma">idioma</option>
                <option value="nivel">curso</option>
                <option value="colegio">colegio</option>
            </select>
        <?php endif;?>

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th></th>
            <th>Fecha</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Tema</th>
            <th>Subtema</th>
            <th>Idioma</th>
            <th>Codigo</th>
            <th>Curso</th>
            <th>Colegio</th>
            <th>En prestamo?</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($colegio=='AYNI'){
            $query=$this->db->query("SELECT * FROM libro ORDER  BY codarea,codsubarea");
        }else{
            $query=$this->db->query("SELECT * FROM libro WHERE colegio='$colegio' ORDER  BY codarea,codsubarea");
        }
        foreach ($query->result() as $row){
            if ($row->estado=="Malo"){
                $in="";
                $ba="<a href='".base_url()."Book/alta/$row->idlibro'  class='btn btn-warning p-1'> <i class='fa fa-upload'></i> Dar Alta</a>";
            }else{
                $in="<input type='checkbox' class='case' name='c$row->idlibro'>";
                $ba="<button type='button' class='btn btn-info p-1' data-codigo='$row->idlibro' data-toggle='modal' data-target='#modificar'> <i class='fa fa-pencil-square-o'></i> Modificar</button>
                <a href='".base_url()."Book/baja/$row->idlibro'  class='confirmar btn btn-danger p-1'> <i class='fa fa-close'></i> Dar Baja</a>";
            }
            echo "<tr>
                    <td>$in</td>
                    <td>$row->fecha</td>
                    <td>$row->titulo</td>
                    <td>$row->autor</td>
                    <td>$row->area</td>
                    <td>$row->tematica</td>
                    <td>$row->idioma</td>
                    <td>$row->codigo</td>
                    <td>$row->nivel</td>
                    <td>$row->colegio</td>
                    <td>$row->status</td>
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
                <form  method="post" action="<?=base_url()?>Book/update" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-1" >Colegio</label>

                        <div class="col-sm-3">
                            <?php
                            $colegio=$_SESSION['colegio'];
                            if ($colegio=='AYNI'):
                                ?>
                                <input list="colegios" type="text" name="colegio" class="form-control" id="colegio2" required>
                                <datalist id="colegios">
                                    <?php
                                    $query=$this->db->query("SELECT colegio FROM libro GROUP BY colegio");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->colegio'>";
                                    }
                                    ?>
                                </datalist>
                            <?php else:?>
                                <input type="text" name="colegio" id="colegio2" value="<?=$colegio?>" hidden>
                                <label ><?=$colegio?></label>
                            <?php endif;?>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="nroserie" id="nroserie2" class="form-control" required placeholder="Nro Serie">
                            <input type="number" name="idlibro" id="idlibro2"  required hidden >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="nroalcaldia" id="nroalcaldia2" class="form-control" required placeholder="Nro alcaldia">
                        </div>
                        <label class="col-sm-1" >Autor</label>
                        <div class="col-sm-3">
                            <!--                                <input type="text" name="autor" class="form-control" placeholder="Apellido nombres">-->
                            <input list="autor" name="autor" id="autor2" class="form-control"placeholder="Autor">
                            <datalist id="autor">
                                <?php
                                $query=$this->db->query("SELECT autor FROM libro GROUP BY autor");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->autor'>";
                                }
                                ?>
                            </datalist>
                        </div>
                        <label class="col-sm-1" >Titulo</label>
                        <div class="col-sm-3">
                            <input list="titulos" name="titulo" id="titulo2" class="form-control"placeholder="Titulor">
                            <datalist id="titulos">
                                <?php
                                $query=$this->db->query("SELECT titulo FROM libro GROUP BY titulo");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->titulo'>";
                                }
                                ?>
                            </datalist>
                        </div>
                        <label class="col-sm-1" >Original</label>
                        <div class="col-sm-1">
                            <select name="original" class="form-control" id="original2" required>
                                <option value="">Selecionar..</option>
                                <option value="ORIGINAL">ORIGINAL</option>
                                <option value="FOTOCOPIA">FOTOCOPIA</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="number" name="anioedicion" id="anioedicion2" class="form-control" required placeholder="Año Edicion">
                        </div>

                        <label class="col-sm-1" >Incremento</label>
                        <div class="col-sm-3">
                            <?php
                            $query=$this->db->query("SELECT *  FROM libro WHERE colegio='$colegio'");
                            if($query->num_rows()>0){
                                $incremento=$query->row()->incremento;
                            }else{
                                $incremento=0;
                            }

                            ?>
                            <input type="number" name="incremento" id="incremento2" class="form-control" value="<?=$incremento?>" required placeholder="Incremento">
                        </div>
                        <label class="col-sm-1" >editorial</label>
                        <div class="col-sm-3">
                            <input type="text" name="editorial" id="editorial2" class="form-control" required placeholder="editorial">
                        </div>
                        <label class="col-sm-1" >procedencia</label>
                        <div class="col-sm-3">
                            <input type="text" name="pais" id="procedencia2" class="form-control" required placeholder="procedencia">
                        </div>
                        <label class="col-sm-1" >estado</label>
                        <div class="col-sm-3">
                            <select name="estado" class="form-control" id="estado2" required>
                                <option value="">Selecionar..</option>
                                <option value="Nuevo">Nuevo</option>
                                <option value="Bueno">Bueno</option>
                                <option value="Regular">Regular</option>
                                <option value="Malo">Malo</option>
                            </select>
                        </div>

                        <label class="col-sm-1" >idioma</label>

                        <div class="col-sm-3">
                            <input list="idioma" name="idioma" id="idioma2" class="form-control" placeholder="Idioma">
                            <datalist id="idioma">
                                <?php
                                $query=$this->db->query("SELECT idioma FROM libro GROUP BY idioma");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->idioma'>";
                                }
                                ?>
                            </datalist>

                        </div>
                        <label class="col-sm-1">Grado</label>
                        <div class="col-sm-3">
                            <select name="nivel" id="nivel2"  class="form-control" required>
                                <!--                                    <option value="">Selecionar..</option>-->
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="4">Cuarto</option>
                                <option value="5">Quinto</option>
                                <option value="6">Sexto</option>
                                <option value="7">Septimo</option>
                                <option value="8">Octavo</option>
                                <option value="9">Noveno</option>
                                <option value="10">Decimo</option>
                                <option value="11">Undecimo</option>
                                <option value="12">Duodecimo</option>
                                <option value="13">Profesores</option>
                            </select>
                        </div>
                        <label class="col-sm-1">Area</label>
                        <div class="col-sm-3">
                            <select name="area" class="form-control" required id="area2">
                                <!--                                <option value="">Selecionar..</option>-->
                                <?php
                                $query=$this->db->query("SELECT area FROM libro GROUP BY area");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->area'>$row->area</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-sm-1">Tematica</label>
                        <div class="col-sm-3">
                            <select name="tematica" class="form-control" required id="tematica2">
                                <!--                                    <option value="">Selecionar..</option>-->
                                <?php
                                $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->tematica'>$row->tematica</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <label class="col-sm-1" >codigo</label>
                        <div class="col-sm-3">
                            <input type="text" name="codigo" class="form-control" id="codigo2" required placeholder="codigo">
                            <span class=""></span>
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
        $('#area').change(function (e) {
            // console.log($('#colegio').val());
            if ($('#colegio').val()==''){
                alert('primero selecionar colegio');
                $('#area').val('');
                return false;
            }
            var division = $(this).val().split('.');
            var area=(division[1]);
            $.ajax({
                data:'area='+area,
                type:'POST',
                url:'Book/datos',
                success:function (e) {
                    var datos= JSON.parse(e);
                    console.log(datos);

                    $('#tematicas').html('');
                    <?php if ($colegio=='AYNI'): ?>
                    datos.forEach(function (e) {
                        $('#tematica').val('');
                        $('#tematicas').append('<option value="'+e.codsubarea+'.'+e.tematica+'">');
                    });
                        <?php else:?>
                    $('#tematica').html('<option value="">Selecionar..</option>');
                    datos.forEach(function (e) {
                        $('#tematica').append('<option value="'+e.codsubarea+'.'+e.tematica+'">'+e.codsubarea+'.'+e.tematica+'</option>');
                    });
                    <?php endif;?>

                    $.ajax({
                        data:'area='+area,
                        type:'POST',
                        url:'Book/codarea',
                        success:function (e) {
                            $('#codarea').val(e);
                        }
                    });
                }
            })
            e.preventDefault();
        });
        $('#tematica').change(function (e) {
            e.preventDefault();
            // console.log($('#tematica').val());
            var division = $('#tematica').val().split('.');
            var tematica=(division[1]);
            // console.log(tematica);
            $.ajax({
                data:'tematica='+tematica,
                type:'POST',
                url:'Book/codtematica',
                success:function (e) {
                    // console.log(e);
                    $('#codtematica').val(e);
                    /////////////////////////////////////////////////////////////////////////////////
                    if ($('#colegio').val()==''){
                        alert('primero selecionar colegio');
                        return false;
                    }
                    if ($('#nivel').val()=='' || $('#area').val()=='' || $('#tematica').val()==''){
                        alert('debe llenar los campos de nivel area y tematica');
                    }else{
                        var division = $('#tematica').val().split('.');
                        var tematica=(division[1]);
                        // console.log(tematica);
                        <?php if ($colegio=='AYNI'): ?>
                        var datos={
                            nivel:$('#nivel').val(),
                            tematica:'a',
                            colegio:$('#colegio').val(),
                            incremento:$('#incremento').val(),
                            codtematica:$('#codtematica').val()
                        }
                        <?php else:?>
                        var datos={
                            nivel:$('#nivel').val(),
                            tematica:tematica,
                            colegio:$('#colegio').val(),
                            incremento:$('#incremento').val(),
                            codtematica:division[0]
                        }
                        <?php endif;?>

                        $.ajax({
                            url:'Book/codigo',
                            type:'POST',
                            data:datos,
                            success:function (e) {
                                console.log(e);
                                if (e.length)
                                    $('#codigo').val(e);
                            }
                        })
                    }
                    // e.preventDefault();
                    ///////////////////////////
                }
            });
        });
        $('#nivel').change(function (e) {
            if ($('#colegio').val()==''){
                alert('primero selecionar colegio');
                return false;
            }
            if ($('#nivel').val()=='' || $('#area').val()=='' || $('#tematica').val()==''){
                alert('debe llenar los campos de nivel area y tematica');
            }else{
                var division = $('#tematica').val().split('.');
                var tematica=(division[1]);
                // console.log(tematica);
            <?php if ($colegio=='AYNI'): ?>
                var datos={
                    nivel:$('#nivel').val(),
                    tematica:'a',
                    colegio:$('#colegio').val(),
                    incremento:$('#incremento').val(),
                    codtematica:$('#codtematica').val()
                }
                <?php else:?>
                var datos={
                    nivel:$('#nivel').val(),
                    tematica:tematica,
                    colegio:$('#colegio').val(),
                    incremento:$('#incremento').val(),
                    codtematica:division[0]
                }
                <?php endif;?>

                $.ajax({
                    url:'Book/codigo',
                    type:'POST',
                    data:datos,
                    success:function (e) {
                        console.log(e);
                        if (e.length)
                        $('#codigo').val(e);
                    }
                })
            }
           e.preventDefault();
        });
        $('#codtematica').keyup(function (e) {
            e.preventDefault();
            $('#codigo').val($('#nivel').val()+'.'+$('#codtematica').val()+'.'+ parseInt( parseInt( $('#incremento').val())+1)).toString();
        });
        // Setup - add a text input to each footer cell
        $('#example thead tr').clone(true).appendTo( '#example thead' );
        $('#example thead tr:eq(1) th').each( function (i) {
            // console.log(i);
            if (i==0){
                $(this).html( '<input type="checkbox" id="selectall"/>ALL' );
                $("#selectall").on("click", function() {
                    $(".case").attr("checked", this.checked);
                    console.log(this.checked);
                });
            }else if (i==10){

            }else if (i==4){
                $(this).html( '<select style="width:100px" >' +
                    '<option value="">Seleccionar..</option>' +
                    <?php
                        $query=$this->db->query("SELECT area FROM libro GROUP BY area");
                        foreach ($query->result() as $row){
                            echo "'<option value=\"$row->area\">$row->area</option>' +";
                        }
                    ?>
                    '</select>' );
                $( 'select', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }else if (i==5){
                $(this).html( '<select style="width:100px" >' +
                    '<option value="">Seleccionar..</option>' +
                    <?php
                    $query=$this->db->query("SELECT tematica FROM libro GROUP BY tematica");
                    foreach ($query->result() as $row){
                        echo "'<option value=\"$row->tematica\">$row->tematica</option>' +";
                    }
                    ?>
                    '</select>' );
                $( 'select', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
            else if (i==6){
                $(this).html( '<select style="width:100px" >' +
                    '<option value="">Seleccionar..</option>' +
                    <?php
                    $query=$this->db->query("SELECT idioma FROM libro GROUP BY idioma");
                    foreach ($query->result() as $row){
                        echo "'<option value=\"$row->idioma\">$row->idioma</option>' +";
                    }
                    ?>
                    '</select>' );
                $( 'select', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
            else if (i==8){
                $(this).html( '<select style="width:100px" >' +
                    '<option value="">Seleccionar..</option>' +
                    '<option value="Primero">Primero</option>' +
                    '<option value="Segundo">Segundo</option>' +
                    '<option value="Tercero">Tercero</option>' +
                    '<option value="Cuarto">Cuarto</option>' +
                    '<option value="Quinto">Quinto</option>' +
                    '<option value="Sexto">Sexto</option>' +
                    '<option value="Septimo">Septimo</option>' +
                    '<option value="Octavo">Octavo</option>' +
                    '<option value="Noveno">Noveno</option>' +
                    '<option value="Decimo">Decimo</option>' +
                    '<option value="Undecimo">Undecimo</option>' +
                    '<option value="Duodecimo">Duodecimo</option>' +
                    '</select>' );
                $( 'select', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
            else if (i==9){
                $(this).html( '<select style="width:100px" >' +
                    '<option value="">Seleccionar..</option>' +
                    <?php
                    $query=$this->db->query("SELECT colegio FROM libro GROUP BY colegio");
                    foreach ($query->result() as $row){
                        echo "'<option value=\"$row->colegio\">$row->colegio</option>' +";
                    }
                    ?>
                    '</select>' );
                $( 'select', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
            else{
                var title = $(this).text();
                $(this).html( '<input type="text" style="width: 100px;" placeholder="Buscar '+title+'" />' );
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            }
        } );

        // var table = $('#example').DataTable( {
        //     orderCellsTop: true,
        //     fixedHeader: true
        // } );
        $('#colegio').change(function (e) {
            // console.log($(this).val().trim());
            $.ajax({
               url:'Book/incremento/'+$(this).val().trim(),
               success:function (e) {
                   $('#incremento').val(e);
               }
            });
            e.preventDefault();
        });

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            order:[[1,"desc"]],
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
        $('#modificar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var codigo = button.data('codigo') // Extract info from data-* attributes
            $.ajax({
                url: 'Book/datoslibro/'+codigo,
                success:function (e) {
                    var datos=JSON.parse(e)[0];
                    console.log(datos);
                    $('#nroserie2').val(datos.nroserie);
                    $('#idlibro2').val(datos.idlibro);
                    $('#nroalcaldia2').val(datos.nroalcaldia);
                    $('#colegio2').val(datos.colegio);
                    $('#titulo2').val(datos.titulo);
                    $('#autor2').val(datos.autor);
                    $('#original2').val(datos.original);
                    $('#anioedicion2').val(datos.anioedicion);
                    $('#pre2').val(datos.pre);
                    $('#incremento2').val(datos.incremento);
                    $('#procedencia2').val(datos.procedencia);
                    $('#estado2').val(datos.estado);
                    $('#idioma2').val(datos.idioma);
                    $('#nivel2').val(datos.nivelno);
                    $('#area2').val(datos.area);
                    $('#tematica2').val(datos.tematica);
                    $('#editorial2').val(datos.editorial);
                    $('#codigo2').val(datos.codigo);
                }
            });
        })
    }
</script>
