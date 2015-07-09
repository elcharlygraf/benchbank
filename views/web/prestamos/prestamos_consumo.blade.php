@extends('layouts.webinterno')
	@section('titulo')
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
					Préstamos
					</span>
				</div>	
				
				<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
                            <li><a href="{{ URL::route('productos') }}">Productos</a> &#187; </li>
							<li><a href="{{ URL::route('prestamos') }}">Préstamos</a> &#187; </li>
							<li>Consumo</li>
						</ul>
					</nav>
				</div>
			</section>
			<aside class="banner_deposito"></aside>	
			
			<div class="transition_deposito">
				<span class="first_subtitulo_deposito">Datos precisos.</span>
				<span class="second_subtitulo_deposito">Resultados precisos.</span>
				
				<ul id="numeric_transition">
					<li>
						<a href="#" class="active_transition">1</a> 
						
					</li>
						<span class="lineclass"> </span>
					<li>
						<a href="#" class="active_transition">2</a>

					</li>
						<span class="lineclass"> </span>
					<li><a href="#">3</a></li>
				</ul>
				<br><br><br><br><br>
			</div>

			<section class="calculobox">
				<div class="imagenCalculo_PrestamoConsumo"></div>


				<div class="content_calculo">
				{{Form::open(['route' => array('SearchConsumo', '1'),  'id' => 'calculoForm', 'method' => 'POST', 'role' => 'form', 'class' => 'formCalculo']) }}
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccione su moneda</p>
							<select name="typeMoneda" id="typeMoneda" class="selectCalculo">
								<option value="1">(S/.) Soles</option>
								<option value="2">($/.) Dolar</option>
							</select>
							{{ $errors->first('typeMoneda','<p class="error_message">:message</p>') }}
						</div>
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Importe del Préstamo</p>
							<input id="ex6" type="number" data-slider-min="20000" data-slider-max="100000" data-slider-step="1000" data-slider-value="100000">

							<div class="rangos">
								<span class="block30porc_left">20,000</span>
								<span class="block30porc_center">60,000</span>
								<span class="block30porc_rigth">100,000</span>
							</div><br><br>
								<span id="ex6CurrentSliderValLabel">
								{{ Form::number('valor', null, ['class' => 'formCalculo_input', 'id' => 'valor' ,'placeholder' => 'Importe del Préstamo', 'required']) }}
						        {{ $errors->first('valor','<p class="error_message">:message</p>') }}
								</span>
						</div>
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Plazos</p>
						<div style="display:block">
							<div class="inputblock">
							<label>
								<input type="radio" name="typeplazos" id="typeplazos" value="0" /> Años
							</label>		
							</div>
							<div class="inputblock">
							<label>
									<input type="radio" name="typeplazos" id="typeplazos" value="1" checked /> Meses
							</label>		
							</div>
						</div>

							{{ Form::number('plazos', null, ['class' =>'formCalculo_input', 'placeholder' => 'Cantidad los plazos', 'required' ]) }}
							{{ $errors->first('plazos','<p class="error_message">:message</p>') }}
						</div>
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccionar Departamento</p>
							<select name="departamento" id="departamento" class="selectCalculo">
							@foreach($departamentos as $departamento)
								<option value="{{$departamento->Codigo_Departamento}}">{{$departamento->Departamento}}</option>
							@endforeach	
							</select>
							{{ $errors->first('departamento','<p class="error_message">:message</p>') }}
						</div>
						
						<div class="bloqueFormCalculo">
							<span class="fonttitleForm">¿Deseas registrarte?</span>
							{{Form::checkbox('checkregister', '1', true)}}
						</div>

						<div class="bloqueFormCalculo">
							<input type="hidden" name="producto" value="Consumo">
							<input type="submit" class="submitCalcular" value="Calcular  >">
						</div>

					{{ Form::close()}}
					<div style="clear:both"></div>
				</section>


			</div>
@stop

@section('footer')
	@parent
@stop

@section('script')
<script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script type='text/javascript' src="{{asset('assets/js/bootstrap-slider.js')}}"></script>
    <script type='text/javascript'>
    	$(document).ready(function() {
			$("#ex6").slider();
			$("#ex6").on('slide', function(slideEvt) {
				$("#valor").val(slideEvt.value);
			});

			$('input[type=checkbox]').live('click', function(){
	        var parent = $(this).parent().attr('id');
	        $('#'+parent+' input[type=checkbox]').removeAttr('checked');
	        $(this).attr('checked', 'checked');
	    	});
    });
    </script>
	<script type='text/javascript' src="{{asset('assets/js/validate/jquery.validate.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/additional-methods.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('assets/js/validate/personalizable.js')}}"></script>
	<script>
		jQuery.validator.setDefaults({
		  debug: true,
		  success: "valid"
		});
		$( "#calculoForm" ).validate({
		  rules: {
		    valor: {
		      required: true,
		      min: 300
		    },
		    departamento: {
		    	required: true,
		    	min: 1
		    },
		    plazos: {
		    	required: true,
		    	max: 
		    	function() 
		    	{
                	if($('[name="typeplazos"]:checked').length == '0') {
                		return 5;
				    }
				    else{
				    	return 300;
				    }
            	},
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
		    		required: "Ingrese el importe del prestamo",
		    		min: "El saldo minimo es de: 300"
		    	},
		    	departamento: "Por favor, seleccione un departamento"
		    },
		  submitHandler: function(form) {
	            form.submit();
	        }  
		});
	</script>
@stop