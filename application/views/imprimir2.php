<?php
$colegio=$_SESSION['colegio'];
?>
<div class="button-ad-wrap" style="width: 100%">
    <div class="row">
        <div class="col-12">
            <h4>Libros</h4>
            <form class="form-inline"  method="post" action="<?=base_url()?>Imprimir/librosprint" target="_blank">
                <div class="form-group">
                    <label >Colegio</label>
                    <?php if ($colegio=='AYNI'):?>
                        <select name="colegio" class="form-control" required>
                            <option value="">Selecionar..</option>
                            <?php
                            $query=$this->db->query("SELECT colegio FROM estudiante GROUP  BY colegio");
                            foreach ($query->result() as $row){
                                echo "<option value='$row->colegio'>$row->colegio</option>";
                            }
                            ?>
                        </select>
                    <?php else:?>
                        <input type="text" name="colegio" id="colegio" value="<?=$colegio?>" hidden>
                        <b> <?=$colegio?> </b>
                    <?php endif;?>
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
