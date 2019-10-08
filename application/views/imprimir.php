<div class="button-ad-wrap" style="width: 100%">
    <div class="row">
        <div class="col-12">
            <h4>Alumnos</h4>
            <form class="form-inline" method="post" action="<?=base_url()?>Imprimir/consulta" target="_blank">
                <div class="form-group">
                    <label >Colegio</label>
                    <!--            <input type="text"   id="colegio" placeholder="">-->
                    <select name="colegio" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <?php
                        $query=$this->db->query("SELECT colegio FROM estudiante GROUP  BY colegio");
                        foreach ($query->result() as $row){
                            echo "<option value='$row->colegio'>$row->colegio</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label >Categoria</label>
                    <select name="categoria" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <option value="PRIMARIA">PRIMARIA</option>
                        <option value="SECUNDARIA">SECUNDARIA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Nivel</label>
                    <select name="nivel" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <option value="Primero">Primero</option>
                        <option value="Segundo">Segundo</option>
                        <option value="Tercero">Tercero</option>
                        <option value="Cuarto">Cuarto</option>
                        <option value="Quinto">Quinto</option>
                        <option value="Sexto">Sexto</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Paralelo</label>
                    <select name="paralelo" class="form-control" required>
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
                <button type="submit" class="btn btn-primary "> <i class="fa fa-print"></i> Consultar</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Contra portada</h4>
            <form class="form-inline"  method="post" action="<?=base_url()?>Imprimir/contrapordata" target="_blank">
                <div class="form-group">
                    <label >Colegio</label>
                    <!--            <input type="text"   id="colegio" placeholder="">-->
                    <select name="colegio" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <?php
                        $query=$this->db->query("SELECT colegio FROM estudiante GROUP  BY colegio");
                        foreach ($query->result() as $row){
                            echo "<option value='$row->colegio'>$row->colegio</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary "> <i class="fa fa-print"></i> Consultar</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h4>Profesores</h4>
            <form class="form-inline"  method="post" action="<?=base_url()?>Imprimir/profesores" target="_blank">
                <div class="form-group">
                    <label >Colegio</label>
                    <!--            <input type="text"   id="colegio" placeholder="">-->
                    <select name="colegio" class="form-control" required>
                        <option value="">Selecionar..</option>
                        <?php
                        $query=$this->db->query("SELECT colegio FROM profesor WHERE colegio<>'AYNI' GROUP  BY colegio");
                        foreach ($query->result() as $row){
                            echo "<option value='$row->colegio'>$row->colegio</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary "> <i class="fa fa-print"></i> Consultar</button>
            </form>
        </div>
    </div>

</div>