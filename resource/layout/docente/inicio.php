</nav>
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Nueva_Materia") ?>" class="d_newMate">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded mateAsig">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Mate_A["num"]; ?></h3>
                        <p class="fs-5">Materias Asignadas</p>
                    </div>
                    <i class="fas fa-book fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Asignar_Tarea") ?>" class="d_asigTare">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded tarePub">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Tareas_P["num"]; ?></h3>
                        <p class="fs-5">Tareas Publicadas</p>
                    </div>
                    <i class="fas fa-spell-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Revisar_Tarea") ?>" class="d_review">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded tareCal">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Tareas_C["num"]; ?></h3>
                        <p class="fs-5">Tareas Calificadas </p>
                    </div>
                    <i class="fas fa-tasks fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a  href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Revisar_Tarea") ?>" class="d_tareaNotCalif">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded tareNotCal">
                    <div>
                        <h3 class="fs-2">Total: 00</h3>
                        <p class="fs-5">Tareas No Calificadas</p>
                    </div>
                    <i class="far fa-times-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>