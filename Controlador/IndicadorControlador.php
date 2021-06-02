<?php

class IndicadorControlador {

    static public function ctrYears(){
        return IndicadorModelo::mdlYears();
    }
    static public function ctrYearsAlquiler(){
        return IndicadorModelo::mdlYearsAlquiler();
    }

    static public function ctrSumatoriaCompras($data) {
        return IndicadorModelo::mdlSumatoriaCompras($data);
    }

    static public function ctrSumatoriaVentas($data) {
        return IndicadorModelo::mdlSumatoriaVentas($data);
    }
    static public function ctrFechasAlquiler($data) {
        return IndicadorModelo::mdlFechasAlquiler($data);
    }
}
