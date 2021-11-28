<div class="container-fluid px-4 ">
    <section class="bg-light rounded ">
        <div class="container-lg">
            <div class="text-center">
                <h2>Elige las materias que vas a impartir </h2>
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
    </section>
</div>

<div id="Vertareas" class="table-responsive container"></div>

<div  id="nueva_materia"  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-primary">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title " id="staticBackdropLabel">Nueva Materia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body ">
                <form action="#" method="POST"  onsubmit="guardamateria(); return false" >


                    <div class="mb-3">
                        <label for="recipient-name" disabled class="col-form-label">¿Quieres Agregar Esta Nueva Materia?:</label>
                        <input type="text" disabled class="form-control" value="" id="nombremateria">
                    </div>

                    <button type="submit" class="btn btn-primary" name="UpdatePerfil">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>