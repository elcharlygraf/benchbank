<?php
//RUTAS DIRECTAS
Route::get('/', function()	
{ 
	return View::make('web.index'); 
});
//PRODUCTO
Route::get('productos', array('as' => 'productos', function()
{
	return View::make('web.producto'); 
}));

Route::post('contacto',  ['as' => 'SendMail', 'uses' => 'SendMailController@Mail']);
Route::get ('registro',  ['as' => 'getRegistro', 'uses' => 'RegistroController@getRegistro']);
Route::post('resultado/registro',  ['as' => 'registro', 	 'uses' => 'RegistroController@setRegistro']);

//CALCULO CAMPAÑA
Route::get('procedure',  ['as' => 'procedure', 'uses' => 'CalculoCampaniaController@Campania']);
Route::get('resultados', ['as' => 'resultados', 'uses' => 'ResultadoCalculoController@Resultado']);

//PRESTAMOS
Route::group(array('prefix'=>'prestamos'), function() {

	Route::get('/', 	    		['as' => 'prestamos', 		 'uses' => 'PrestamosController@Prestamos']);
	Route::get('consumo',   		['as' => 'consumo', 	   	 'uses' => 'PrestamosController@Consumo']);
	Route::post('consumo/{id}', 	['as' => 'SearchConsumo', 	 'uses' => 'PrestamosController@SearchConsumo'])->where('id', '[0-9]+');

	Route::get('vehicular', 		['as' => 'vehicular',   	 'uses' => 'PrestamosController@Vehicular']);
	Route::post('vehicular/{id}',   ['as' => 'SearchVehicular',  'uses' => 'PrestamosController@SearchVehicular'])->where('id', '[0-9]+');

	Route::get('hipotecario',		['as' => 'hipotecario', 	 'uses' => 'PrestamosController@Hipotecario']);
	Route::post('hipotecario/{id}', ['as' => 'SearchHipotecario','uses' => 'PrestamosController@SearchHipotecario'])->where('id', '[0-9]+');
});

//DEPOSITOS
Route::group(array('prefix'=>'depositos'), function() {

	Route::get('/', 				   ['as' => 'depositos', 'uses' => 'DepositosController@Depositos']);
	Route::get('fondosmutuos',  	   ['as' => 'fondosmutuos',   		'uses' => 'DepositosController@FondosMutuos']);
	Route::post('fondosmutuos',        ['as' => 'SearchFondosmutuos',   'uses' => 'DepositosController@SearchFondosmutuos'])->where('id', '[0-9]+');

	Route::get('ahorro', 	     	   ['as' => 'ahorro', 				'uses' => 'DepositosController@Ahorro']);
	Route::post('ahorro/{id}', 		   ['as' => 'SearchAhorro',   		'uses' => 'DepositosController@SearchAhorro'])->where('id', '[0-9]+');

	Route::get('cts', 		     	   ['as' => 'cts',            		'uses' => 'DepositosController@Cts']);
	Route::post('cts/{id}', 		   ['as' => 'SearchCts',   			'uses' => 'DepositosController@SearchCts'])->where('id', '[0-9]+');

	Route::get('depositosplazo', 	   ['as' => 'depositosplazo', 		'uses' => 'DepositosController@DepositosPlazo']);
	Route::post('depositosplazo/{id}', ['as' => 'SearchDepositosplazo', 'uses' => 'DepositosController@SearchPlazo'])->where('id', '[0-9]+');

});

//ADMIN
Route::group(array('prefix'=>'admin'), function() {

	Route::get('/', 	['as' => 'inicioAdmin', 'uses' => 'PanelAdminController@getInicio']);
});
//COMPOS DEPENDIENTES - FONDOS MUTUOS
Route::get('Producto', function(){
    return BechBank\Entities\Producto::where('Codigo_Producto','>=',7)->get();
});
Route::POST('SubProducto', function(){
    return BechBank\Entities\SubProducto::where('Codigo_Producto','=', Input::get('idproducto'))->get();
});