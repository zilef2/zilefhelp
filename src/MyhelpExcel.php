<?php
namespace MyNamespace;
class MyhelpExcel
{

    public static function getFechaExcel($lafecha){
        //the date fix
        if (is_numeric($lafecha)) { //toproof
            $unixDate = ($lafecha - 25568) * 86400;
            // $unixDate = ($lafecha - 25569) * 86400;
            $readableDate = date('Y/m/d', $unixDate);
            $fechaResult = DateTime::createFromFormat('Y/m/d', $readableDate);

            if ($fechaResult === false) {
                $fechaResult = DateTime::createFromFormat('Y/m/d', $lafecha);
                if ($fechaResult === false) {
                    $fechaResult = DateTime::createFromFormat('d/m/Y', $lafecha);
                    if ($fechaResult === false) {
                        throw new \Exception('Fecha inválida 1');
    //                        return null;
                    }
                }
            }
        } else {
            $fechaResult = DateTime::createFromFormat('Y/m/d', $lafecha);
            if ($fechaResult === false) {
                $fechaResult = DateTime::createFromFormat('d/m/Y', $lafecha);
                if ($fechaResult === false) {
                    throw new \Exception('Fecha inválida 2' . $lafecha);
                }
            }
        }
        return $fechaResult;
    }
}