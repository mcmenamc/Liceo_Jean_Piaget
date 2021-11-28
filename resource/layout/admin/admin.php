<div class=" align-items-center">
    <h2 class="fs-2 font-monospace m-0 text-center mb-3 ">Administradores</h2>
</div>
<div class="container-fluid">
    <button id="tablaAdmin" class="fas fa-redo-alt btn btn-outline-dark"></button>

    <div class="table-responsive" id="tabla_admins"></div>
    <div id="respuesta"></div>

</div>

<!-- Modal -->
<div class="modal fade" id="udpateAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" onsubmit="UpdateA();return false">

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
                        <input class="form-check-input"  type="checkbox"   id="checkbox1">
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
                    <button type="submit" class="btn btn-primary">Actualizar</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>