<?php
namespace BechBank\Procedures;
class MuestraPlazoProcedure {

    public function getMuestraPlazo()
    {
        return \DB::select('CALL USP_MUESTRA_PLAZO_DEPOSITO');
    }
}
