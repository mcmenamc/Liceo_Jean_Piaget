<div class=" align-items-center">
    <h2 class="fs-2 font-monospace m-0 text-center mb-3 ">Inicio</h2>
</div>
<div class="row container-fluid justify-content-md-center">
    <div class="col-12  col-sm-auto">
        <div class="form-group">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Escolaridad</label>
                <select class="form-select" id="inputGroupSelect01">
                    <option value="0" selected>Selecione escolaridad</option>
                    <option value="1" selected>Preescolar</option>
                    <option value="2">Primaria</option>
                    <option value="3">Secundaria</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-auto">
        <div class="form-group">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect02">Grado</label>
                <div id="inputGroupSelect0444"></div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div id="btn1"></div>

    <div class="table-responsive" id="tabla_alumnos"></div>

    <div id="respuesta"></div>
</div>
<div class="modal fade" id="updateAlumno" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" onsubmit="UpdateAlumno();return false">

                    <div class="mb-3 p-1">
                        <label for="recipient-name" class="col-form-label fs-4">Matrícula:</label>
                        <input type="text" disabled name="Matricula" class="form-control" value="" id="matricula">

                    </div>
                    <div class="mb-3 p-1">
                        <label for="recipient-name" class="col-form-label">Nombre:</label>
                        <input type="text" name="Nombre" class="form-control" value="" id="nombre">
                    </div>
                    <div class="mb-3 p-1">
                        <label for="recipient-name" class="col-form-label">Apellido Paterno:</label>
                        <input type="text" name="Paterno" class="form-control" value="" id="paterno">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Apellido Materno:</label>
                        <input type="text" name="Materno" class="form-control" value="" id="materno">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox1">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cambiar Correo
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Correo:</label>
                        <input type="email" name="Correo" class="form-control" value="" id="correo">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Contraseña:</label>
                        <input type="text" name="password" class="form-control" value="" id="pass">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="checkbox2" value="false">
                        <label class="form-check-label" for="flexCheckDefault">
                            Cambiar Escolaridad y grado
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Escolaridad:</label>
                        <select class="form-select" id="escobar1">
                            <option id="escolaridad" value=""></option>
                        </select>
                        <!-- <input type="text" disabled name="escolaridad" class="form-control" value="" id="escolaridad"> -->
                        <select class="form-select" id="inputGroupSelect02">
                            <option value="0" selected>Selecione escolaridad</option>
                            <option value="1" selected>Preescolar</option>
                            <option value="2">Primaria</option>
                            <option value="3">Secundaria</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Grado:</label>
                        <select class="form-select" id="escobar2">
                            <option id="grado" value=""></option>
                        </select>
                        <!-- <input type="text" disabled name="grado" class="form-control" value="" id="grado"> -->
                        <div id="inputGroupSelect04445"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>