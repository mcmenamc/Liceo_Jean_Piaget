<?php
//en el archivo se creara la conexion para eso ocupamos una class Conexion que depsues llamaremos
class Conexion
{

    public $con; // en esta variable se creara la conexion 
    public  function Conectar()
    {
        
        $this->con = mysqli_connect("localhost", "root", "", "liceo_jean_piaget");
    }
}
?>