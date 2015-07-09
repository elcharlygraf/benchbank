<?php
namespace BechBank\Procedures;
class DepartamentoProcedure {

    public function getDepartamento()
    {
        return \DB::select('CALL USP_MUESTRA_DEPARTAMENTO');
    }
}
