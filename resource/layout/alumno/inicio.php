</nav>
<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Tareas") ?>" class="a_tarea">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded tareaTerm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Checa tus tareas completadas">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Tareas_CO["num"];  ?> </h3>
                        <p class="fs-5">Tareas Completadas</p>
                    </div>
                    <i class="fas fa-check-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Tareas") ?>" class="b_tarea">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded tarea" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Checa tus tareas por realizar">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Tareas_Pe["num"];  ?> </h3>
                        <p class="fs-5">Tareas Pendientes</p>
                    </div>
                    <i class="fas fa-times-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="<?php echo ("?matricula=" . $_SESSION['matricula'] . "&tools=Asistencias") ?>" class="c_asis">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded falta" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Checa tus faltas">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Faltas_Acom["num"];  ?></h3>
                        <p class="fs-5">Faltas Acomuladas</p>
                    </div>
                    <i class="fas fa-user-clock fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded imprimirPDF" id="imprimirPDF" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Imprime tu boleta">
                <input type="hidden" id="idalumno" value="<?php echo $Datos["idgrado"]  ?>">
                <div>
                    <!-- Promedio momental -->
                    <h3 class="fs-2">Total: <span id="promedio" class="Prom">10</span></h3>
                    <p class="fs-5">Promedio Acomulado</p>
                </div>
                <i class="fas fs-1 primary-text border rounded-full secondary-bg p-3" id="cara"></i>
            </div>
        </div>
    </div>
</div>
</div>

