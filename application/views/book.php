<div class="button-ad-wrap" style="width: 100%">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success p-1" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-book"></i> Registrar libro
    </button>
    <!-- Modal -->
    <style>
        .modal-lg{
            min-width: 99%;
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
                    <form  method="post" action="<?=base_url()?>Students/insert" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-1" >Colegio</label>
                            <div class="col-sm-3">
                                <input list="colegios" type="text" name="colegio" class="form-control" id="colegio" required>
                                <datalist id="colegios">
                                    <?php
                                    $query=$this->db->query("SELECT colegio FROM estudiante GROUP BY colegio");
                                    foreach ($query->result() as $row){
                                        echo "<option value='$row->colegio'>";
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <label class="col-sm-1" >Numero Alcaldia</label>
                            <div class="col-sm-3">
                                <input type="number" name="nroalcaldia" class="form-control" required placeholder="Nro alcaldia">
                            </div>
                            <label class="col-sm-1" >Autor</label>
                            <div class="col-sm-3">
<!--                                <input type="text" name="autor" class="form-control" placeholder="Apellido nombres">-->
                                <input list="autor" name="autor" class="form-control"placeholder="Autor">
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
                                <input list="titulos" name="titulo" class="form-control"placeholder="Titulor">
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
                            <div class="col-sm-3">
                                <select name="original" class="form-control" id="" required>
                                    <option value="">Selecionar..</option>
                                    <option value="ORIGINAL">ORIGINAL</option>
                                    <option value="FOTOCOPIA">FOTOCOPIA</option>
                                </select>
                            </div>
                            <label class="col-sm-1" >Año Edicion</label>
                            <div class="col-sm-3">
                                <input type="number" name="aniedicion" class="form-control" required placeholder="Edicion">
                            </div>
                            <label class="col-sm-1" >editorial</label>
                            <div class="col-sm-3">
                                <input type="text" name="editorial" class="form-control" required placeholder="editorial">
                            </div>
                            <label class="col-sm-1" >procedencia</label>
                            <div class="col-sm-3">
                                <input type="text" name="procedencia" class="form-control" required placeholder="procedencia">
                            </div>
                            <label class="col-sm-1" >estado</label>

                            <div class="col-sm-3">
                                <select name="estado" class="form-control" id="" required>
                                    <option value="">Selecionar..</option>
                                    <option value="NUEVO">NUEVO</option>
                                    <option value="REGULAR">REGULAR</option>
                                    <option value="MALO">MALO</option>
                                </select>
                            </div>

                            <label class="col-sm-1" >idioma</label>

                            <div class="col-sm-3">
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
                            <label class="col-sm-1">Nivel</label>
                            <div class="col-sm-3">
                                <select name="nivel" id="nivel"  class="form-control" required>
                                    <option value="">Selecionar..</option>
                                    <option value="1">Primero</option>
                                    <option value="2">Segundo</option>
                                    <option value="3">Tercero</option>
                                    <option value="4">Cuarto</option>
                                    <option value="5">Quinto</option>
                                    <option value="6">Sexto</option>
                                </select>
                            </div>
                            <label class="col-sm-1">Area</label>
                            <div class="col-sm-3">
                            <select name="area" class="form-control" required id="area">
                                <option value="">Selecionar..</option>
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

                            <label class="col-sm-1" >codigo</label>
                            <div class="col-sm-3">
                                <input type="text" name="codigo" class="form-control" required placeholder="codigo">
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
            <th>Codigo</th>
            <th>Area</th>
            <th>Tematica</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query=$this->db->query("SELECT * FROM libro");
        foreach ($query->result() as $row){
            echo "<tr>
                    <td>$row->codigo</td>
                    <td>$row->titulo</td>
                    <td>$row->area</td>
                    <td>$row->tematica</td>
                    <td>$row->fecha</td>
                    <td>
                        <a href='".base_url()."Book/target/$row->idlibro' target='_blank' class='btn btn-warning p-1'> <i class='fa fa-camera-retro'></i> Codigo</a>
                    </td>
                </tr>";
        }
        ?>

        </tbody>
    </table>
</div>
<script !src="">
    window.onload=function (e) {
        $('#area').change(function (e) {
            console.log($(this).val());
            $.ajax({
                data:'area='+$(this).val(),
                type:'POST',
                url:'Book/datos',
                success:function (e) {
                    // console.log(e);
                    var datos= JSON.parse(e);
                    $('#tematica').html('');
                    datos.forEach(function (e) {
                        $('#tematica').append('<option value="'+e.tematica+'">'+e.tematica+'</option>');
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
            }
        });

    }
</script>
