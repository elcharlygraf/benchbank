<?php
namespace BechBank\Procedures;
class MuestraFondoProcedure {

    public function getMuestraFondo($v_CODIGO_PRODUCTO)
    {
        return \DB::select('CALL USP_MUESTRA_FONDO(?)', array($v_CODIGO_PRODUCTO));
    }
}
