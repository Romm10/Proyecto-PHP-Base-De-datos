<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Realizar Conexion a BD
// Realizar consulta SQL
class visitas {

    public $matricula;
    public $nombre;
    public $sexo;

    public function __construct($matricula, $nombre, $sexo) {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->sexo = $sexo;
    }

    public static function consultar() {
        include ('conexion.php');
        $consulta = "select * from alumnos";
        echo ('<br>');
        // echo ($consulta);
        $resultado = mysqli_query($mysqli, $consulta);
        if (!$resultado) {
            echo 'No pudo Realizar la consulta a la base de datos';
            exit;
        }
        $lalumnos = [];
        while ($visitas = mysqli_fetch_array($resultado)) {
            $lalumnos[] = new visitas($visitas['matricula'], $visitas['nombre'], $visitas['sexo']);
        }
        return $lalumnos;
    }

}

?>
