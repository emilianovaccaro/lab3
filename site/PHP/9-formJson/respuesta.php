<?php
    sleep(3);
    if(isset($_POST["nombre"]))
    {
        $personaForm = new stdClass;

        $personaForm->nombre = $_POST["nombre"];
        $personaForm->apellido = $_POST["apellido"];
        $personaForm->edad = $_POST["edad"];
        $personaForm->sexo = $_POST["sexo"];

        $objetoJson = json_encode($personaForm);
        echo $objetoJson;
    }
?>