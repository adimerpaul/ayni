<div class="button-ad-wrap" style="width: 100%">
    <div class="row">
        <div class="col-12">
            <h4>Libros</h4>
            <form class="form-inline"  method="post" action="<?=base_url()?>Imprimir/librosprint" target="_blank">
                <div class="form-group">
                    <label >Colegio</label>
                    <select name="colegio" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <option value="JA">JUANA AZURDUY DE PADILLA</option>
                        <option value="GV">GUIDO VILLAGOMEZ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Area</label>
                    <select name="area" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <?php
                        $query=$this->db->query("SELECT area FROM libro GROUP BY area");
                        foreach ($query->result() as $row){
                            echo "<option value='$row->area'>$row->area</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary "> <i class="fa fa-print"></i> Consultar</button>
            </form>
        </div>
    </div>


</div>