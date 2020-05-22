<?php
function control(){

    $fecha = intval(date(Hi));
    $hora1 = intval(date(0600));
    $hora2 = intval(date(1559));
    $hora3 = intval(date(1600));
    $hora4 = intval(date(2000));
    
    $entrada=1;
    $salida =2;

    if ($fecha >= $hora1 && $fecha <=$hora2) {
        return $entrada;    
    } else {
        return $salida;
    }
}