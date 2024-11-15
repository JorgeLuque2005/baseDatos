<?php
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_JUGUETE.php";

ejecutaServicio(function () {
    $lista = select(pdo: Bd::pdo(), from: JUGUETE, orderBy: JUG_NOMBRE);
    
    // Inicia la lista de descripción con clases de Bootstrap
    $render = "<dl class='row'>";
    
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[JUG_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[JUG_NOMBRE]);
        $marca = htmlentities($modelo[JUG_MARCA]);
        $material = htmlentities($modelo[JUG_MATERIAL]);
        
        $render .= "
            <div class='col-12'>
               <dt>
               <a href='modifica.html?id=$id'>$nombre</a>
               <dd><a href='modifica.html?id=$id'>$marca, $material</a></dd>
               </dt>
            </div>
            <button class='btn btn-secondary col-12 my-2' disabled></button>";
    }
    

    
    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});