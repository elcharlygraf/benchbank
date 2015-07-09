@extends('layouts.webmaster')
@section('jscss')
	@parent
@stop
@section('header')
	@parent
@stop
	
@section('cuerpo')
	<section class="cabecera_deposito">
		<div class="leftbox">
					<figure class="icondeposito"></figure>
					<span class="titulo_deposito">
					Resultados para tí
					</span>
		</div>	
				
		<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
							<li><a href="{{ URL::route('productos') }}">Producto</a> &#187; </li>
                            <li><a href="{{ URL::route('depositos') }}">Depósitos</a> &#187; </li>
							<li> {{$producto}}</li>
						</ul>
					</nav>
		</div>
	</section>
	<hr>
	<div class="listaTransicion">
				<ul id="numeric_transition">
					<li>
						<a href="#" class="active_transition">1</a> 
						
					</li>
						<span class="lineclass"> </span>
					<li>
						<a href="#" class="active_transition">2</a>

					</li>
						<span class="lineclass"> </span>
					<li><a href="#" class="active_transition">3</a></li>
				</ul>
	</div>
	<section class="contentCalculoResponse">
			<div class="boxopcionesCalculo">
				<div class="bloqueleft">
					<p><span class="lettersRed">Producto:</span> {{$producto}}</p>
					@if($v_IMPORTE_BIEN)
					<p><span class="lettersRed">Saldo Promedio:</span> {{$v_IMPORTE_BIEN}} soles</p>
					@endif
				</div>
				<div class="bloqueright">
					@if($v_PLAZO)
					<p><span class="lettersRed">Plazo del Prestamo:</span>  {{$v_PLAZO}} días</p>
					@endif
				</div>			
			</div>

				
	<!--BLOQUE -->
	<a href="javascript:void(0)"><div id="mostrarCalculo" name="mostrarCalculo">Nuevo cálculo</div></a>
	<div id="divocultamuestra" style="display:none">
			@if($v_CODIGO_SUBPRODUCTO==4)
				<div class="boxcalculoForm_mini">
				{{Form::open(['route' => array('SearchAhorro', '4'), 'id' => 'calculoForm', 'method' => 'POST', 'role' => 'form', 'class' => 'formCalculo']) }}
                        <div class="boxopciones30">
                            <div class="firtCal">
                                <p class="fonttitleForm">Tu nombre completo</p>
                                {{ Form::text('nombre', null, ['id' => 'nombre','class' => 'formCalculo_input', 'placeholder' => 'Tu nombre completo']) }}
                                {{ $errors->first('nombre','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
                            <div class="firtCal">
                                <p class="fonttitleForm">Tu correo electrónico</p>
                                {{ Form::text('email', null, ['id' => 'email' ,'class' => 'formCalculo_input', 'placeholder' => 'Tu correo electrónico']) }}
                                {{ $errors->first('email','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
                            <div>
                                <p class="fonttitleForm">Tu número de celular</p>
                                {{ Form::text('telefono', null, ['id' => 'telefono','class' => 'formCalculo_input', 'placeholder' => 'Tu número de celular']) }}
                                {{ $errors->first('telefono','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Tipo de Moneda</p>
								<select name="typeMoneda" id="typeMoneda" class="selectCalculo">
								<option value="1">(S/.) Soles</option>
								<option value="2">($/.) Dolar</option>
							</select>
							{{ $errors->first('typeMoneda','<p class="error_message">:message</p>') }}
							</div>
						</div>

						<div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Seleccionar Departamento </p>
								<select name="departamento" id="departamento" class="selectCalculo">
									@foreach($departamentos as $departamento)
										<option value="{{$departamento->Codigo_Departamento}}">{{$departamento->Departamento}}</option>
									@endforeach	
								</select>
								{{ $errors->first('departamento','<p class="error_message">:message</p>') }}
							</div>
						</div>

						<div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Saldo Promedio</p>
								{{ Form::number('valor', null, ['class' => 'formCalculo_input', 'id' => 'valor', 'placeholder' => 'Saldo promedio']) }}
								{{ $errors->first('valor','<p class="error_message">:message</p>') }}
							</div>
							<div class="firtCal">
								<div class="bloqueFormCalculo">
									<input type="hidden" name="producto" value="Consumo">
									<input type="submit" class="submitCalcular" value="Calcular  >">
								</div>
							</div>
						</div>
				{{ Form::close()}}
				</div>

			@elseif($v_CODIGO_SUBPRODUCTO==5)
				<div class="boxcalculoForm_row2" id="NewCalculo">
				{{Form::open(['route' => array('SearchCts', '5'), 'id' => 'calculoForm' ,'method' => 'POST', 'role' => 'form', 'class' => 'formCalculo']) }}
                        <div class="boxopciones30">
                            <div class="firtCal">
                                <p class="fonttitleForm">Tu nombre completo</p>
                                {{ Form::text('nombre', null, ['class' => 'formCalculo_input', 'placeholder' => 'Tu nombre completo']) }}
                                {{ $errors->first('nombre','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
                            <div class="firtCal">
                                <p class="fonttitleForm">Tu correo electrónico</p>
                                {{ Form::text('email', null, ['class' => 'formCalculo_input', 'placeholder' => 'Tu correo electrónico']) }}
                                {{ $errors->first('email','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
                            <div>
                                <p class="fonttitleForm">Tu número de celular</p>
                                {{ Form::text('telefono', null, ['class' => 'formCalculo_input', 'placeholder' => 'Tu número de celular']) }}
                                {{ $errors->first('telefono','<p class="error_message">:message</p>') }}
                            </div>
                        </div>

                        <div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Tipo de Moneda</p>
							<select name="typeMoneda" id="typeMoneda" class="selectCalculo">
								<option value="1">(S/.) Soles</option>
								<option value="2">($/.) Dolar</option>
							</select>
							{{ $errors->first('typeMoneda','<p class="error_message">:message</p>') }}
							</div>
						</div>

						<div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Seleccionar Departamento </p>
								<select name="departamento" id="departamento" class="selectCalculo">
									@foreach($departamentos as $departamento)
										<option value="{{$departamento->Codigo_Departamento}}">{{$departamento->Departamento}}</option>
									@endforeach	
								</select>
								{{ $errors->first('departamento','<p class="error_message">:message</p>') }}
							</div>
						</div>

						<div class="boxopciones30">
							<div class="firtCal">
								<p class="fonttitleForm">Saldo Promedio</p>
								{{ Form::number('valor', null, ['class' => 'formCalculo_input', 'id' => 'valor', 'placeholder' => 'Saldo promedio']) }}
								{{ $errors->first('valor','<p class="error_message">:message</p>') }}
							</div>
							<div class="firtCal">
								<div class="bloqueFormCalculo">
									<input type="hidden" name="producto" value="Consumo">
									<input type="submit" class="submitCalcular" value="Calcular  >">
								</div>
							</div>
						</div>
				{{ Form::close()}}
				</div>
			@endif
	</div>
	<!--fin bloque-->
			<div class="blockrespuestas">
				<span class="infotable_left">{{count($cuota)}} resultados para ti</span> 
				<span class="infotable_right">Información en tiempo real</span>
			</div>
			@foreach($cuota as $data)
				<div class="resultadosTable">

					<div class="bloqueTr">
						<div class="bloquetd with120_left"><img src="{{$data->Link}}" width="120px" height="98px" alt=""></div>

						<div class="bloquetd">
							<div class="titulotd">{{$data->Entidades}}</div>
							<div class="separadortd_3col">
								Tea
								<span class="numbertd">{{round($data->Tasa_Rendimiento ,2)}}</span>
							</div>
							<div class="separadortd_3col">
								Rendimiento Mensual
								<span class="numbertd">{{round($data->Rendimiento,2)}}</span>
							</div>
							<div class="separadortd_3col">
								Importe Total
								<span class="numbertd">{{round($data->Importe_Final,2)}}</span>
							</div>
						</div>
					</div>
				</div>
			@endforeach
	</section>
	<div class="respuestasCalculo">		
	</div>
@stop

@section('footer')
	@parent
@stop

@section('script')
	<script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/app.js')}}"></script>

	<script type='text/javascript' src="{{asset('assets/js/validate/jquery.validate.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/additional-methods.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/personalizable.js')}}"></script>
	@if($v_CODIGO_SUBPRODUCTO==4)
	<script>
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "#calculoForm" ).validate({
		  rules: {
		    valor: {
		      required: true,
		      min: 100,
		      max: 200000
		    },
		    email: {
		    	required: false,
		    	email: true
		    },
		    telefono: {
		    	required: false,
		    	digits: true,
		    	minlength: 9,
		    	maxlength: 12,
		    },
		    nombre: {
		    	required: false,
		    	lettersonly: true
		    },
		    departamento: {
		    	required: true,
		    	min: 1
		    }
		  },
		  messages: 
		    {
		    	email:"Ingrese un email valido",
		    	nombre: {
		    		lettersonly: "Ingrese solo letras"
		    	},
		    	valor:{
		    		required: "Ingrese el saldo promedio",
		    		min: "El saldo minimo es de: 100",
		    		max: "El saldo máximo es de 200 000"
		    	},
		    	departamento: "Por favor, seleccione un departamento"
		    },
		  submitHandler: function(form) {
	            form.submit();
	        }  
		});
	</script>
	@elseif($v_CODIGO_SUBPRODUCTO==5)
	<script>
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "#calculoForm" ).validate({
		  rules: {
		    valor: {
		      required: true,
		      min: 100,
		      max: 200000
		    },
		    email: {
		    	required: false,
		    	email: true
		    },
		    telefono: {
		    	required: false,
		    	digits: true,
		    	minlength: 9,
		    	maxlength: 12,
		    },
		    nombre: {
		    	required: false,
		    	lettersonly: true
		    },
		    departamento: {
		    	required: true,
		    	min: 1
		    }
		  },
		  messages: 
		    {
		    	email:"Ingrese un email valido",
		    	nombre: {
		    		lettersonly: "Ingrese solo letras"
		    	},
		    	valor:{
		    		required: "Ingrese el saldo promedio",
		    		min: "El saldo minimo es de: 100",
		    		max: "El saldo máximo es de 200 000"
		    	},
		    	departamento: "Por favor, seleccione un departamento"
		    },
		  submitHandler: function(form) {
	            form.submit();
	        }  
		});
	</script>
	@endif
@stop	