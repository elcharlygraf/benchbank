<?php
use BechBank\Procedures\DepartamentoProcedure;
use BechBank\Procedures\MuestraPlazoProcedure;
use BechBank\Procedures\MuestraTipoFondoProcedure;
use BechBank\Procedures\MuestraFondoProcedure;
use BechBank\Procedures\CalculoCuotaProcedure;

class DepositosController extends BaseController {

    protected $DepartamentoProcedure;
    protected $MuestraPlazoProcedure;
    protected $MuestraTipoFondoProcedure;
    protected $MuestraFondoProcedure;
    protected $CalculoCuotaProcedure;

    public function __construct(CalculoCuotaProcedure $CalculoCuotaProcedure, MuestraFondoProcedure $MuestraFondoProcedure, DepartamentoProcedure $DepartamentoProcedure, MuestraPlazoProcedure $MuestraPlazoProcedure, MuestraTipoFondoProcedure $MuestraTipoFondoProcedure)
    {
        $this->DepartamentoProcedure = $DepartamentoProcedure;
        $this->MuestraPlazoProcedure = $MuestraPlazoProcedure;
        $this->MuestraTipoFondoProcedure = $MuestraTipoFondoProcedure;
        $this->MuestraFondoProcedure = $MuestraFondoProcedure;
        $this->CalculoCuotaProcedure = $CalculoCuotaProcedure;
    }

//PADRE
    public function Depositos()
	{
        return View::make('web.depositos');
    }

//HIJOS
    public function FondosMutuos()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $tipofondo     = $this->MuestraTipoFondoProcedure->getTipoFondo();
        $fondo         = $this->MuestraFondoProcedure->getMuestraFondo('2');      
        $plazos        = $this->MuestraPlazoProcedure->getMuestraPlazo();
        return View::make('web.depositos.deposito_mutuos', compact('departamentos','tipofondo','fondo','plazos'));
    }
    public function Ahorro()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        return View::make('web.depositos.deposito_ahorro', compact('departamentos'));
    }
    public function Cts()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        return View::make('web.depositos.deposito_cts', compact('departamentos'));
    }
    public function DepositosPlazo()
	{
        $departamentos  = $this->DepartamentoProcedure->getDepartamento();
        $plazos         = $this->MuestraPlazoProcedure->getMuestraPlazo();
        
        return View::make('web.depositos.deposito_plazos', compact('departamentos','plazos'));
    }

//BUSQUEDAS AHORRO
    public function SearchAhorro($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $data = Input::only(['typeMoneda', 'valor', 'departamento','producto','checkregister']);
        //VALIDAMOS
        $rules = [
            'typeMoneda'=> 'required|not_in:0',
            'valor'  => 'required|numeric|min:100',
            'departamento'=> 'required|not_in:0'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
             {
            //VARIABLES
                $v_CODIGO_MONEDA=Input::get('typeMoneda');
                $v_CODIGO_SUBPRODUCTO=$id;
                $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
                $v_IMPORTE_BIEN=Input::get('valor');
                $v_CUOTA_INICIAL=0;
                $v_CORREO=Input::get('email');
                $v_TELEFONO=Input::get('telefono');
                $v_NOMBRE=Input::get('nombre');
                $v_PLAZO='';  

                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    return View::make('web.registro');
                }
                else{
                //LLAMAR AL PROCEDURE
                $producto = 'Ahorro';    
                $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                return View::make('web.resultadosdeposito', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos'));  
                }
             }
             else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }
    }
//FIN

//BUSQUEDA CTS    
    public function SearchCts($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $data = Input::only(['typeMoneda', 'valor', 'departamento','producto','checkregister']);
        //VALIDAMOS
        $rules = [
            'typeMoneda'=> 'required|not_in:0',
            'valor'  => 'required|numeric|min:100',
            'departamento'=> 'required|not_in:0'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
             {
            //VARIABLES
                $v_CODIGO_MONEDA=Input::get('typeMoneda');
                $v_CODIGO_SUBPRODUCTO=$id;
                $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
                $v_IMPORTE_BIEN=Input::get('valor');
                $v_CUOTA_INICIAL=0;
                $v_CORREO=Input::get('email');
                $v_TELEFONO=Input::get('telefono');
                $v_NOMBRE=Input::get('nombre');
                $v_PLAZO='';  

                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    return View::make('web.registro');
                }
                else{
                //LLAMAR AL PROCEDURE
                $producto = 'Cts'; 
                $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                return View::make('web.resultadosdeposito', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos'));  
                }
             }
             else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }
    }
//FIN

//BUSQUEDA PLAZO    
    public function SearchPlazo($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $plazos         = $this->MuestraPlazoProcedure->getMuestraPlazo();

        $data = Input::only(['typeMoneda', 'valor', 'departamento', 'plazos','producto','checkregister']);

        //REGLAS DE VALIDACION
        $rules = [
            'typeMoneda'=> 'required|not_in:0',
            'valor'  => 'required|numeric|min:100',
            'departamento'=> 'required|not_in:0'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
            {
            //VARIABLES
                $v_CODIGO_MONEDA=Input::get('typeMoneda');
                $v_CODIGO_SUBPRODUCTO=$id;
                $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
                $v_IMPORTE_BIEN=Input::get('valor');
                $v_CUOTA_INICIAL=0;
                $v_CORREO=Input::get('email');
                $v_TELEFONO=Input::get('telefono');
                $v_NOMBRE=Input::get('nombre');
                $v_PLAZO=Input::get('plazos');  

                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    Session::put('plazos', Input::get('plazos'));
                    return View::make('web.registro');
                }

                else{
                //LLAMAR AL PROCEDURE
                    $producto = 'Depósito a Plazos';    
                    $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                    return View::make('web.resultadosdepositoplazo', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos','plazos'));
                }

            }
             else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }        
    }
//FIN

//BUSQUEDA FONDOS MUTUOS    
    public function SearchFondosmutuos()
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $plazos         = $this->MuestraPlazoProcedure->getMuestraPlazo();

        $data = Input::only(['tipofondo', 'subtipofondo', 'typeMoneda', 'plazos', 'valor', 'departamento','checkregister','producto']);
        //REGLAS DE VALIDACION
        $rules = [
            'tipofondo'    => 'required|not_in:0',
            'subtipofondo' => 'required|not_in:0',
            'plazos'       => 'required|not_in:0',
            'departamento' => 'required|not_in:0',
            'typeMoneda'   => 'required|not_in:0',
            'valor'        => 'required|numeric|min:100'
        ];

        $validation = \Validator::make($data, $rules);
        if($validation->passes())
        {
            //VARIABLES
            $v_CODIGO_MONEDA=Input::get('typeMoneda');
            $v_CODIGO_SUBPRODUCTO=Input::get('subtipofondo');
            $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
            $v_IMPORTE_BIEN=Input::get('valor');
            $v_CUOTA_INICIAL=0;
            $v_CORREO=Input::get('email');
            $v_TELEFONO=Input::get('telefono');
            $v_NOMBRE=Input::get('nombre');
            $v_PLAZO=Input::get('plazos');

            //CHECK ACTIVO
            if(Input::has('checkregister')){
                    Session::put('key', $v_CODIGO_SUBPRODUCTO);
                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    Session::put('plazos', Input::get('plazos'));
                    return View::make('web.registro');
            }
            else{
                //LLAMAR AL PROCEDURE
                $producto = 'Fondos Mutuos';
                $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                return View::make('web.resultadosdepositoplazo', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos','plazos'));
            }

        }
        else{
            return Redirect::back()->withInput()->withErrors($validation->messages());
        }
    }
//FIN    
}