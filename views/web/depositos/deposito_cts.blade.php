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
					Depósitos de CTS
					</span>
				</div>	
				
				<div class="rightbox">
					<nav class="recorrido">
						<ul id="recorrido_nav">
							<li><a href="/">Inicio</a> &#187; </li>
                            <li><a href="{{ URL::route('productos') }}">Productos</a> &#187; </li>
                            <li><a href="{{ URL::route('depositos') }}">Depósitos</a> &#187; </li>
							<li>Cts</li>
						</ul>
					</nav>
				</div>
			</section>
			<aside class="banner_deposito"></aside>	
			
			<div class="transition_deposito">
				<span class="first_subtitulo_deposito">Datos precisos.</span>
				<span class="second_subtitulo_deposito">Resultados precisos.</span>
				<br><br>
			</div>

			<section class="calculobox">
				<div class="imagenCalculo_depositoCts"></div>


				<div class="content_calculo">
					{{Form::open(['route' => array('SearchCts', '5'), 'id' => 'calculoForm', 'method' => 'POST', 'role' => 'form', 'class' => 'formCalculo']) }}

						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Seleccione su moneda</p>
							<select name="typeMoneda" id="" class="selectCalculo">
								<option value="1">(S/.) Soles</option>
								<option value="2">($/.) Dolar</option>
							</select>
							{{ $errors->first('typeMoneda','<p class="error_message">:message</p>') }}
						</div>
						
						<div class="bloqueFormCalculo">
							<p class="fonttitleForm">Saldo Promedio</p>
							{{ Form::number('valor', null, ['id' =>'valor', 'class' => 'formCalculo_input', 'placeholder' => 'Saldo promedio', 'required' ]) }}
							{{ $errors->first('valor','<p class="error_message">:message</p>') }}
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
							<input type="hidden" name="producto" value="Cts">
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
@section('script')
	<script type='text/javascript' src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type='text/javascript' src="{{asset('assets/js/app.js')}}"></script>

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
		      min: 100
		    },
		    departamento: {
		    	required: true,
		    	min: 1
		    }
		  },
		  messages: 
		    {
		    	valor:{
		    		required: "Ingrese el saldo promedio",
		    		min: "El saldo minimo es de: 100"
		    	},
		    	departamento: "Por favor, seleccione un departamento"
		    },
		  submitHandler: function(form) {
	            form.submit();
	        }  
		});
	</script>
@stop
@stop