<div class="container-fluid px-4">
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Administradores") ?>" class="a_admin">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded admin">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Admins["num"];  ?></h3>
                        <p class="fs-5">Administradores</p>
                    </div>
                    <i class="fas fa-user-ninja fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>


        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Docentes") ?>"  class="a_doce">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded docent">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Docentes["num"];  ?></h3>
                        <p class="fs-5">Docentes</p>
                    </div>
                    <i class="fas fa-user-tie fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a  href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Alumnos") ?>" class="a_alum">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded alumn">
                    <div>
                        <h3 class="fs-2">Total: <?php echo $Num_Alumnos["num"];  ?></h3>
                        <p class="fs-5">Alumnos</p>
                    </div>
                    <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="<?php echo("?matricula=".$_SESSION['matricula']."&tools=Database") ?>" class="a_data">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded base">
                    <div>
                        <h3 class="fs-2"><?php echo $Mb_Database["Tamaño"];  ?> MB</h3>
                        <p class="fs-5">Base de Datos</p>
                    </div>
                    <i class="fas fa-compact-disc fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
</div>