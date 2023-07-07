<?php
    sleep(1);
    if(isset($_POST["clave"]))
    {
        $claveEncriptadamd5 = md5($_POST["clave"]);
        $claveEncriptadaSha = sha1($_POST["clave"]);
        echo "Clave sin encriptar: <b>" . $_POST["clave"] . "</b><br>";
        echo "Clave encriptada en md5 (128 bits o 16 pares hexadecimales): <br><b> $claveEncriptadamd5 </b><br>";
        echo "Clave encriptada en sha1 (160 bits o 20 pares hexadecimales): <br><b> $claveEncriptadaSha </b><br>";
    }
?>