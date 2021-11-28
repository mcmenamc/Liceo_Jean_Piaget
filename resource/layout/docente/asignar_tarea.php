<div class="container-fluid px-4 ">
        <section class="bg-light rounded ">
            <div class="container-lg">
                <div class="text-center">
                    <h2>Publica la tarea de cualquier materia</h2>                    
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
            <div id="AJAXtarea"></div> 
        </section>
    </div> 
    <div class="modal fade" id="nueva_tarea" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg text-success">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title fs-3" id="staticBackdropLabel">Nueva Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="#" method="POST" onsubmit="Tarea();return false">

                        <div class="mb-3 p-1">
                            <input type="hidden" id="iddocente" value="<?php echo ($Datos["iddocente"]); ?>">
                            <label for="recipient-name" class="col-form-label fs-4">Tema:</label>
                            <input type="text" required id="tema" required class="form-control border border-primary" id="recipient-name">
                        </div>
                        <div class="mb-3 p-1">
                            <label for="recipient-name" class="col-form-label fs-4">Titulo De la Tarea:</label>
                            <input type="text" id="titulo" required class="form-control border border-primary" value="" id="recipient-name">
                        </div>
                        <div class="mb-3 p-1">
                            <label for="recipient-name" class="col-form-label fs-4">Descripcion:</label>
                            <textarea id="descripcion" required class="form-control border border-primary"></textarea>
                        </div>
                        <div class="mb-3 p-1">
                            <label for="recipient-name" id="entrega" class="col-form-label fs-4">Dia De Entrega:</label>
                            <input class="form-control border border-primary" required type="datetime-local">
                        </div>
                        <button type="submit" class="btn btn-primary">Publicar Tarea</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>