<?php
use BechBank\Procedures\DepartamentoProcedure;
use BechBank\Procedures\CalculoCuotaProcedure;
class PrestamosController extends BaseController {

    protected $DepartamentoProcedure;
    protected $CalculoCuotaProcedure;

    public function __construct(DepartamentoProcedure $DepartamentoProcedure, CalculoCuotaProcedure $CalculoCuotaProcedure)
    {
        $this->DepartamentoProcedure = $DepartamentoProcedure;
        $this->CalculoCuotaProcedure = $CalculoCuotaProcedure;
    }
    
//PADRE
    public function Prestamos()
	{
        return View::make('web.prestamos');
    }

//HIJOS VIEWS   
    public function Consumo()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        return View::make('web.prestamos.prestamos_consumo', compact('departamentos'));
    }
    public function Vehicular()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        return View::make('web.prestamos.prestamos_vehicular', compact('departamentos'));
    }
    public function Hipotecario()
	{
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        return View::make('web.prestamos.prestamos_hipotecario', compact('departamentos'));
    }

//BUSQUEDAS CONSUMO
    public function SearchConsumo($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $data = Input::only(['valor','typeMoneda', 'plazos', 'departamento','producto','checkregister']);
        //VALIDAMOS
        $rules = [
            'valor'=> 'required|numeric|min:100',
            'typeMoneda'  => 'required|not_in:0',
            'plazos'     => 'required|numeric|min:1',
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
                //NUMERO DE PLAZOS (CAMBIANDO A MESES)
                if(Input::get('typeplazos')==0){
                    $v_PLAZO = 12*Input::get('plazos');
                }
                else{
                    $v_PLAZO=Input::get('plazos');
                }
                
                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('plazos', $v_PLAZO);
                    Session::put('cuota', $v_CUOTA_INICIAL);

                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    return View::make('web.registro');
                }
                else{
                //LLAMAR AL PROCEDURE
                    $producto = 'Consumo';
                    $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                    return View::make('web.resultados', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos'));
                }
            }
            else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }
    }
//FIN

//BUSQUEDA VEHICULAR    
    public function SearchVehicular($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $data = Input::only(['valor','typeMoneda', 'plazos', 'departamento','cuota_inicial','producto','checkregister']);
        //VALIDAMOS
        $rules = [
            'valor'=> 'required|numeric|min:100',
            'typeMoneda'  => 'required|not_in:0',
            'plazos'     => 'required|numeric|min:1',
            'departamento'=> 'required|not_in:0',
            'cuota_inicial'=> 'required'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
             {
            //VARIABLES
                $v_CODIGO_MONEDA=Input::get('typeMoneda');
                $v_CODIGO_SUBPRODUCTO=$id;
                $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
                $v_IMPORTE_BIEN=Input::get('valor');
                $v_CORREO=Input::get('email');
                $v_TELEFONO=Input::get('telefono');
                $v_NOMBRE=Input::get('nombre');

            //TYPO DE CUENTA
                if(Input::get('typecuota')==0){
                    $v_CUOTA_INICIAL= (Input::get('cuota_inicial')/100) * Input::get('valor');
                }
                else{
                    $v_CUOTA_INICIAL=Input::get('cuota_inicial');
                }

            //NUMERO DE PLAZOS (CAMBIANDO A MESES)
                if(Input::get('typeplazos')==0){
                    $v_PLAZO = 12*Input::get('plazos');
                }
                else{
                    $v_PLAZO=Input::get('plazos');
                }


                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('plazo', $v_PLAZO);
                    Session::put('cuota', $v_CUOTA_INICIAL);

                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    return View::make('web.registro');
                }
                else{
                //LLAMAR AL PROCEDURE
                    $producto = 'Vehicular';
                    $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                return View::make('web.resultados', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos'));
                }    
             }
             else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }
    }
//FIN

//BUSQUEDA HIPOTECARIO    
    public function SearchHipotecario($id)
    {
        $departamentos = $this->DepartamentoProcedure->getDepartamento();
        $data = Input::only(['valor','typeMoneda', 'plazos', 'departamento','cuota_inicial','checkregister']);
        //VALIDAMOS
        $rules = [
            'valor'=> 'required|numeric|min:100',
            'typeMoneda'  => 'required|not_in:0',
            'plazos'     => 'required|numeric|min:1',
            'departamento'=> 'required|not_in:0',
            'cuota_inicial'=> 'required|numeric'
            ];

            $validation = \Validator::make($data, $rules);
            if($validation->passes())
             {
            //VARIABLES
                $v_CODIGO_MONEDA=Input::get('typeMoneda');
                $v_CODIGO_SUBPRODUCTO=$id;
                $v_CODIGO_DEPARTAMENTO=Input::get('departamento');
                $v_IMPORTE_BIEN=Input::get('valor');
                $v_CORREO=Input::get('email');
                $v_TELEFONO=Input::get('telefono');
                $v_NOMBRE=Input::get('nombre');

            //TYPO DE CUENTA
                if(Input::get('typecuota')==0){
                    $v_CUOTA_INICIAL= (Input::get('cuota_inicial')/100) * Input::get('valor');
                }
                else{
                    $v_CUOTA_INICIAL=Input::get('cuota_inicial');
                }

            //NUMERO DE PLAZOS (CAMBIANDO A MESES)
                if(Input::get('typeplazos')==0){
                    $v_PLAZO = 12*Input::get('plazos');
                }
                else{
                    $v_PLAZO=Input::get('plazos');
                }

                //CHECK ACTIVO
                if(Input::has('checkregister')){
                    Session::put('key', $id);
                    Session::put('plazo', $v_PLAZO);
                    Session::put('cuota', $v_CUOTA_INICIAL);

                    Session::put('valor', Input::get('valor'));
                    Session::put('typeMoneda', Input::get('typeMoneda'));
                    Session::put('departamento', Input::get('departamento'));
                    Session::put('producto', Input::get('producto'));
                    return View::make('web.registro');
                }
                else{
                //LLAMAR AL PROCEDURE
                    $producto = 'Hipotecario';
                    $cuota = $this->CalculoCuotaProcedure->getCuota($v_CODIGO_MONEDA, $v_CODIGO_SUBPRODUCTO, $v_CODIGO_DEPARTAMENTO, $v_IMPORTE_BIEN, $v_CUOTA_INICIAL, $v_PLAZO, $v_CORREO, $v_TELEFONO, $v_NOMBRE);
                return View::make('web.resultados', compact('cuota','v_PLAZO','v_CUOTA_INICIAL','v_IMPORTE_BIEN','producto','v_CODIGO_SUBPRODUCTO','departamentos'));
                }  
             }
             else{
                return Redirect::back()->withInput()->withErrors($validation->messages());
            }
    }
//FIN
}