<?php
namespace BechBank\Procedures;
class CalculoCuotaProcedure {

    public function getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE)
    {
        return \DB::select('CALL USP_CALCULO_CUOTA_WEB(?,?,?,?,?,?,?,?,?)', array($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE ));
    }
}
