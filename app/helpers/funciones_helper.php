<?php

function show($data)
{
    echo '<pre>';
    echo '<b>Respuesta: </b> </br></br>';
    print_r($data);
    echo '</pre>';
    exit();
}

function test($data)
{
    if ($data){
        echo 'Prueba exitosa! ';
    } else {
        echo 'Prueba fallida!';
    }
    exit();
}

function fecha_con_hora($string)
{
    $dia_sem = date('w', strtotime($string));

    if ($dia_sem == 0) {
        $semana = "Domingo";
    } elseif ($dia_sem == 1) {
        $semana = "Lunes";
    } elseif ($dia_sem == 2) {
        $semana = "Martes";
    } elseif ($dia_sem == 3) {
        $semana = "Miercoles";
    } elseif ($dia_sem == 4) {
        $semana = "Jueves";
    } elseif ($dia_sem == 5) {
        $semana = "Viernes";
    } else {
        $semana = "Sábado";
    }

    $dia = date('d', strtotime($string));

    $mes = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"][date('n', strtotime($string))-1];

    $mes_num = date('M', strtotime($string));

    $ano = date('Y', strtotime($string));
    
    $hora = date('g:i a', strtotime($string));

    return $semana. ' ' . $dia . '/' . $mes . '/' . $ano . ' ' . $hora;
}