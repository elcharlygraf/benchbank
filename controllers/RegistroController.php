<?php
use BechBank\Procedures\DepartamentoProcedure;
use BechBank\Procedures\CalculoCuotaProcedure;
use BechBank\Procedures\MuestraPlazoProcedure;

class RegistroController extends BaseController {

    protected $DepartamentoProcedure;
    protected $CalculoCuotaProcedure;
    protected $MuestraPlazoProcedure;

    public function __construct(MuestraPlazoProcedure $MuestraPlazoProcedure, DepartamentoProcedure $DepartamentoProcedure, CalculoCuotaProcedure $CalculoCuotaProcedure)
    {
        $this->CalculoCuotaProcedure = $CalculoCuotaProcedure;
        $this->DepartamentoProcedure = $DepartamentoProcedure;
        $this->MuestraPlazoProcedure = $MuestraPlazoProcedure;
    }

    public function getRegistro()
	{
        return View::make('web.registro');
    }

    public function setRegistro()
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
                //TODO ES CORRECTO
                if( Session::get('key'))
                {
                  $departamentos = $this->DepartamentoProcedure->getDepartamento();
                  $plazos        = $this->MuestraPlazoProcedure->getMuestraPlazo();

                    $v_CODIGO_MONEDA       = Session::get('typeMoneda'); //
                    $v_CODIGO_SUBPRODUCTO  = Session::get('key');
                    $v_IMPORTE_BIEN        = Session::get('valor');
                    $v_CODIGO_DEPARTAMENTO = Session::get('departamento'); //
                    $v_CUOTA_INICIAL       = Session::get('cuota');
                    $v_PLAZO               = Session::get('plazos');
                    $producto              = Session::get('producto');
                    $v_NOMBRE              = Input::get('nombre');
                    $v_CORREO              = Input::get('email');
                    $v_TELEFONO            = Input::get('telefono');
                    
                    $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                    
                    //CONDICIONES PARA LA VISTA
                        if($producto =='Fondos Mutuos')
                        {
                        return View::make('web.resultadosdepositoplazo', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos','plazos'));
                        }
                            
                        if ($v_CODIGO_SUBPRODUCTO == 6)
                        {
                        return View::make('web.resultadosdepositoplazo', compact('cuota', 'v_PLAZO', 'v_CUOTA_INICIAL', 'v_IMPORTE_BIEN', 'producto', 'v_CODIGO_SUBPRODUCTO', 'departamentos'));
                        }

                        elseif ($v_CODIGO_SUBPRODUCTO == 1 or $v_CODIGO_SUBPRODUCTO == 2 or $v_CODIGO_SUBPRODUCTO == 3)
                        {
                        return View::make('web.resultados', compact('cuota', 'v_PLAZO', 'v_CUOTA_INICIAL', 'v_IMPORTE_BIEN', 'producto', 'v_CODIGO_SUBPRODUCTO', 'departamentos'));
                        }

                        else
                        {
                        return View::make('web.resultadosdeposito', compact('cuota', 'v_PLAZO', 'v_CUOTA_INICIAL', 'v_IMPORTE_BIEN', 'producto', 'v_CODIGO_SUBPRODUCTO', 'departamentos'));
                        }
                    //FIN
                }
    }
}