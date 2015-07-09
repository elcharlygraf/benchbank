<?php
namespace BechBank\Procedures;
class MuestraTipoFondoProcedure {

    public function getTipoFondo()
    {
        return \DB::select('CALL USP_MUESTRA_TIPO_FONDO');
    }
}
