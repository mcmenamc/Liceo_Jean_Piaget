<div class="container-fluid px-4">
    <section class="bg-light rounded">    
        <div class="text-center">
            <h2>Revisa las tareas publicadas</h2>            
            <p class="lead text-muted">Selecciona una escolaridad</p>
        </div>
        <div class="row my-5 align-items-center justify-content-center">
            <h6 class="card-title text-center">ESCOLARIDADES: </h6>
                <?php foreach ($Escolaridad as $es) { ?>
                <button class="col-8 m-4 col-sm-3" id="btn<?php echo $es["idescolaridad"]; ?>" type="submit"   onclick="Escolaridad(this.value,this.innerText)" value="<?php echo $es["idescolaridad"]; ?>"><?php echo $es["escolaridad"]; ?></button>
            <?php }  ?>            
        </div>
        <div id="grados" class="row my-5 align-items-center justify-content-center"></div>      
        <div id="materias" class="row my-5 align-items-center justify-content-center"></div>        

        <div id="AJAXtarea" class="row my-5 align-items-center justify-content-center"></div>
        <div class="container">
            <div id="Tareas" class=" table-responsive "></div>
        </div>
        <div class="row my-5 align-items-center justify-content-center">
            <div id="Vertareas" class="table-responsive "></div>
        </div>
        <div id="nombremateria"></div>
    </section>
</div>