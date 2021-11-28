<div class="container-fluid px-4 ">
    <section class="bg-light rounded ">
        <div class="container-lg">
            <div class="text-center">
                <h2>Pase de asistencia</h2>
                <p class="lead text-muted">Selecciona una escolaridad</p>
            </div>
        </div>
        <div class="row my-5 align-items-center justify-content-center">
            <h6 class="card-title text-center">ESCOLARIDADES: </h6>
            <?php foreach ($Escolaridad as $es) { ?>
                <button class="col-8 m-4 col-sm-3" id="btn<?php echo $es["idescolaridad"]; ?>" type="submit" onclick="Escolaridad(this.value,this.innerText)" value="<?php echo $es["idescolaridad"]; ?>"><?php echo $es["escolaridad"]; ?></button>
            <?php }  ?>
        </div>

        <div id="grados" class="row my-5 align-items-center justify-content-center"></div>
        <div id="materias" class="row my-5 align-items-center justify-content-center"></div>
        <div class="row my-5 align-items-center justify-content-center container-fluid">
            <div id="Asistencia" class="table-responsive"></div>
        </div>
        <div id="asistencia"></div>
    </section>
</div>