<div class="button-ad-wrap">
    <div class="alert-title">
        <h2>Configuraciones de prestamo</h2>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dato</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->get('configuracion');
            $c=0;
            foreach ($query->result() as $row){
                $c++;
                echo "<tr>
                        <th scope='row'>$c</th>
                        <td>$row->nombre</td>
                        <form action='".base_url()."Config/update' method='post'>
                            <td> <input type='number' name='dato' style='width: 100px' class='form-control' value='$row->dato'><input type='number' name='id'  hidden value='$row->idconfiguracion'></td>
                            <td><input type='submit'></td>                 
                        </form>
                    </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
