


<div class="container-fluid px-4 ">
    
    <div class="row ">
        <div class="col-12 col-md-4">
            <h1>Asistencia</h1>
        </div>

        <div class="col-12 col-md-4">
            <form method="POST">
                <select class="btn btn-secondary " onchange="tabla(this.value)" aria-label="Default select example">
                    <option selected>Selecione una Materia</option>
                    <?php foreach ($Materias as $M) { ?>
                        <option value="<?php echo $M["idmaterias"] ?>"><?php echo $M["materias"] ?></option>
                    <?php  } ?>
                </select>
            </form>
        </div>


    </div>


    <div class="row">
        <div class="table-responsive" id="tabla"></div>

    </div>
</div>
